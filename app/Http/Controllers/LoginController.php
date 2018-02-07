<?php

namespace App\Http\Controllers;

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
}
