<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approve extends Model
{

    public static function sendSms($to , $msg)
    {
        //sms gateway
        $token = "761f1237637c22771120387d084a9de1";
        $url = "http://sms.greenweb.com.bd/api.php";


        $data= array(
            'to'=>"$to",
            'message'=>"$msg",
            'token'=>"$token"
        ); // Add parameters in key value
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);

        //sendsms end//
        if($smsresult == true){
            return true;
        }else{
            return false;
        }
    }
}
