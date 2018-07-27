<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use Log;
class UserDataController extends Controller
{
    function saveOrUpdate(){
        $userCode  =  Input::get("userCode");
        $msisdn = Input::get('msisdn');
        $educationBase =  Input::get('educationBase');
        $educationField = Input::get('educationField');

        try{
            $user  = User::where("msisdn",$msisdn)->first();
            if($user === null){
                $user = new User;
                $user->userCode = $userCode;
                $user->msisdn =  $msisdn;
            }
            $user->educationBase = $educationBase;
            $user->educationField = $educationField;
            $user->save();

            return response()->json([
                'result' =>  true
            ]);
        }catch (\Exception $e){
            Log::error('Something is really going wrong.' . $e);

            return response()->json([
                'result' =>  false
            ]);
        }
    }

}
