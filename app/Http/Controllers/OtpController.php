<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Otp;

class OtpController extends Controller
{
    function validateOtp($mobileNumber, $otpNumber){
        $result = "";
        $otp = Otp::whereRaw("msisdn=? and otpNumber=?",array($mobileNumber,$otpNumber))->first();
        if($otp === null){
            return response()->json([
                'result' =>  false
            ]);
        }else{
            return response()->json([
                'result' =>  true
            ]);
        }
    }
}
