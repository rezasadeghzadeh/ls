<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendSmsController extends Controller
{
    function send($mobileNumber)
    {

        try {
            $api = new \Kavenegar\KavenegarApi("4D49595A6F366B582F7537413449506C35524E3554725944395A745651694C47");
            $sender = "10004346";
            $randomNumber = mt_rand(1000, 9999);
            $message = "کد فعال سازی لایتنر حاجی فیروز و آقا رضا :" . $randomNumber;
            $receptor = array($mobileNumber);
            $result = $api->Send($sender, $receptor, $message);
            return response()->json([
                'status' => $result[0]->status == 1
            ]);
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            echo $e->errorMessage();
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            echo $e->errorMessage();
        }

    }
}
