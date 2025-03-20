<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $otpCode = rand(100000, 999999);

        // Store OTP in database
        $validator = Validator::make($request->all(),[
            'email' =>  'required|email',

        ]);
        if($validator->passes()){
            
            $otp = new Otp();
            $otp->email = $request->email;
            $otp->otp = $otpCode;
            $otp->created_at = Carbon::now();
            $otp->save();
        }
        // Otp::updateOrCreate(
        //     ['email' => $request->email],
        //     ['otp' => $otpCode, 'created_at' => now()]
        // );

        // Send OTP email
        Mail::raw("Your OTP code is: $otpCode", function ($message) use ($request) {
            $message->to($request->email)->subject('Your OTP Code');
        });

        return response()->json(['message' => 'OTP sent successfully']);
    }

    public function verifyOtp(Request $request)
    {
        $otpRecord = Otp::where('email', $request->email)
                         ->where('otp', $request->otp)
                         ->first();

        if ($otpRecord && Carbon::parse($otpRecord->created_at)->addMinutes(value: 10)->isFuture()) {
            $otpRecord->update(['is_verified' => true]);
            
            return response()->json(['message' => 'OTP verified successfully']);
        }

        return response()->json(['error' => 'Invalid or expired OTP'], 400);
    }
}
