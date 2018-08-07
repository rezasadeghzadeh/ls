<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packages;
use DB;
use Illuminate\Support\Facades\Input;



class PackageController extends Controller
{
    function packageInfo()
    {
        $userCode = Input::get("userCode");
        $user  =  DB::table('users')->where("userCode",$userCode)->first();
        if($user === null){
            return response()->json([
                'status' => "invalid user"
            ]);
        }
        $packagesList =  DB::table("packages")->get();
        $userPackages  = DB::table("userPackages")->where("userId",$user->id)->get();
        return response()->json([
            'packages' => $packagesList,
            'userPackages' => $userPackages
        ]);
    }

    function packageFlashCards(){
        $userCode = Input::get("userCode");
        $packageId = Input::get("packageId");
        $user  =  DB::table('users')->where("userCode",$userCode)->first();
        if($user === null){
            return response()->json([
                'status' => "invalid user"
            ]);
        }
        $userPackage  = DB::table('userPackages')->where("userId",$user->id)->where("packageId", $packageId)->first();
        if($userPackage === null){
            return response()->json([
                'status' => "invalid package"
            ]);
        }

        $packageWords = DB::table('packageWords')->where("packageId", $packageId)->get();
        return response()->json([
            'flashcards' =>  $packageWords
        ]);
    }

}
