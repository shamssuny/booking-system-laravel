<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approve extends Model
{

    public static function sendSms($to , $msg)
    {
        //sms gateway
        $token = "1336573d39c09532a91bd5b6407de43e";
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
