<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect('user');
        }

        if(Auth::guard('client')->check()){
            return redirect('client');
        }
        return view('login');
    }

    public function login(){

        $this->validate(request(),[
            'username' => 'required',
            'password' => 'required',
            'u_type' => 'required'
        ]);

        //check if it is user
        if(request('u_type') == 'user'){
            //attempt user to login
            if(Auth::attempt(['username' => request('username') , 'password' => request('password'),'status' => 'ok'])){
                //redirect user to user homepage
                return redirect('/user');
            }
        }

        //check if it is client
        if(request('u_type') == 'client'){
            if(Auth::guard('client')->attempt(['username' => request('username') , 'password' => request('password')])){
                return redirect('/client');
            }
        }

        //if not match back to login page with error
        return redirect('/login')->with('loginError','Credentials Does Not Match!');

    }


    //show reset password page
    public function showReset(){
        return view('resetPassword');
    }

    //reset the password
    public function resetPassword(){
        $this->validate(request(),[
            'phone' => 'required|numeric',
            'u_type' => 'required'
        ]);

        if(request('u_type')=='user'){
            $getUser = User::where('phone',request('phone'))->get()->first();
            if(!$getUser){
                return redirect()->back()->with('resetSuccess','An Error Occur!!');
            }else{
                $getUserMail = $getUser->email;
                $getUserUsername = $getUser->username;
                //make a random password
                $randPass = rand();
                //send email
                mail($getUserMail,"Reset Password | Ayojon","Here are your new login credentials\n"."Username:".$getUserUsername."\n"."Password:".$randPass);
                //$randPass = "2323";
                $getUser->password = bcrypt($randPass);
                $getUser->save();

                return redirect()->back()->with('resetSuccess','A Mail Has Send To Your Email. Please Check.');
            }


        }else if(request('u_type')=='client'){
            $getClient = Client::where('phone',request('phone'))->get()->first();
            if(!$getClient){
                return redirect()->back()->with('resetSuccess','An Error Occur!!');
            }else{
                $getClientMail = $getClient->email;
                $getClientUsername = $getClient->username;
                //make random password
                $randPassClient = rand();
                mail($getClientMail,"Reset Password | Ayojon","Here are your new login credentials\n"."Username:".$getClientUsername."\n"."Password:".$randPassClient);
                $getClient->password = bcrypt($randPassClient);
                $getClient->save();

                return redirect()->back()->with('resetSuccess','A Mail Has Send To Your Email. Please Check.');
            }
        }else{
            return redirect()->back()->with('resetSuccess','An Error Occur!!');
        }

    }

}
