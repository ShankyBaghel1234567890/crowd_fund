<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WithdrawController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $campaigns = Campaign::whereHas('donations', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['donations' => function ($query) use ($user) {
            $query->where('user_id', $user->id);
        }])->get();

        // if(!empty($request->get('keyword'))){
        //     $campaigns = $campaigns->where('name','like','%'.$request->get('keyword').'%');
        // }
        
        foreach ($campaigns as $campaign) {
            $campaign->total_donated = $campaign->donations->sum('amount');
            $campaign->last_updated = $campaign->donations->max('updated_at');
        }

        $withdraws = Withdraw::all();
        $data['campaigns'] = $campaigns;
        $data['withdraws'] = $withdraws;
        
        return view ('user.withdraw.list', $data);
    }

    // public function request(){

    //     $donations = Donation::get()->all();
    //     $data['donations'] =   $donations;
    //     return view ('user.withdraw.request',$data);
    // }

    public function store(Request $request){
        $user = Auth::user();
        $campaignId = $request->input('campaign_id');

        if (!$campaignId) {
            return response()->json(['error' => 'Campaign ID is missing'], 400);
        }
    
        // Retrieve total donation amount for the selected campaign
        $totalAmount = Donation::where('campaign_id', $campaignId)
                                ->where('user_id', $user->id)
                                ->sum('amount');
    
        if ($totalAmount <= 0) {
            return response()->json(['error' => 'No funds available for withdrawal'], 400);
        }
    
        // Create a new withdrawal request
        $withdraw = Withdraw::create([
            'user_id' => $user->id,
            'campaign_id' => $campaignId,
            'amount' => $totalAmount,
            'status' => 'pending',
        ]);
    
        return response()->json(['success' => 'Withdrawal request submitted', 'data' => $withdraw]);
    }
}
