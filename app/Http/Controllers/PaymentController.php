<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Donation;
use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function donate($campaignId)
    {
        $campaign = Campaign::findOrFail($campaignId);
        return view('payment.donate', compact('campaign'));
    }

    public function processPayment(Request $request)
    {
        $api = new Api(env('rzp_test_t6IAkxVPJbUiTG'), env('hq3GZrvUwxZnaaNJoFvy4VB9'));

        $orderData = [
            'receipt' => 'ORD_'.uniqid(),
            'amount' => $request->amount * 100, // Amount in paisa
            'currency' => 'INR',
            'payment_capture' => 1
        ];

        $razorpayOrder = $api->order->create($orderData);

        return response()->json([
            'order_id' => $razorpayOrder['id'],
            'amount' => $orderData['amount'],
            'key' => env('RAZORPAY_KEY_ID')
        ]);
    }

    public function paymentSuccess(Request $request)
    {
        $api = new Api(env('rzp_test_t6IAkxVPJbUiTG'), env('hq3GZrvUwxZnaaNJoFvy4VB9'));

        try {
            $payment = $api->payment->fetch($request->razorpay_payment_id);
            $payment->capture(['amount' => $payment['amount']]);

            Donation::create([
                'campaign_id' => $request->campaign_id,
                'user_id' => Auth::id(),
                'amount' => $payment['amount'] / 100,
                'status' => 'success'
            ]);

            return redirect()->route('dashboard')->with('success', 'Donation successful!');
        } catch (\Exception $e) {
            return redirect()->route('payment.fail')->with('error', 'Payment failed. Please try again.');
        }
    }

    public function paymentFail()
    {
        return view('payment.fail');
    }
}