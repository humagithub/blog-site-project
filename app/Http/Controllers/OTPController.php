<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendOtpNotification;

class OTPController extends Controller
{
    public function sendOtp(Request $request)
    {
        $user = Auth::user(); // Or use a test user if not authenticated

        // If not using Auth, use hardcoded user
        // $user = \App\Models\User::find(1);

        $otp = rand(100000, 999999); // Generate 6-digit OTP

        $user->notify(new SendOtpNotification($otp)); // Send notification

        return back()->with('success', 'OTP sent to your email!');
    }
}
