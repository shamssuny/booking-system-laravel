<?php

namespace App\Http\Controllers;

use App\Center;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Client;

use App\Approve;

class RegisterController extends Controller
{
    //show register page
    public function view(){
        return view('register');
    }

    //register a user
    public function store(){
        $this->validate(request(),[
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'u_type' => 'required'
        ]);



            //check if it is user or client
            if(request('u_type') == 'user'){

                $findexistuser = User::where('username',request('username'))->get();
                $findexistphone = User::where('phone',request('phone'))->get();

                if(count($findexistuser) == 0 && count($findexistphone) == 0){


                    $reg = new User();
                    $reg->username = request('username');
                    $reg->password = bcrypt(request('password'));
                    $reg->email = request('email');
                    $reg->phone = request('phone');
                    $reg->active = "no";
                    $reg->status = "ok";
                    $reg->save();

                    //send varification code to user
                    $code = new Approve();
                    $getIdOfTheUser = User::where('username',request('username'))->get();

                    if(count($getIdOfTheUser) == 1){
                        $id = $getIdOfTheUser->first()->id;
                        $randomCode = rand();
                        //need to add sms gateway here to send the code
                        $code->user_id = $id;
                        $code->code = $randomCode;
                        $code->save();

                    }else{

                    }

                }else{
                    return redirect('register')->with('usererror','Username/Phone Exists');
                }

                return redirect('/login')->with('regsuccess','Register Successfull! Login to Continue.');
            }


        //if the type of user is client then,
        if(request('u_type') == 'client'){

            //check if username and phone number is exixts
            $findClientExists = Client::where('username',request('username'))->get();
            $findClientPhone = Client::where('phone',request('phone'))->get();
            if(count($findClientExists) == 0 && count($findClientPhone) == 0){
                //register client to the system
                $cl = new Client();
                $cl->username = request('username');
                $cl->password = bcrypt(request('password'));
                $cl->email = request('email');
                $cl->phone = request('phone');
                $cl->active = "no";
                $cl->save();

                //put client id on center table
                $center = new Center();
                //get client id
                $getClientId = Client::where('username',request('username'))->first()->id;
                $center->client_id = $getClientId;
                $center->active = "no";
                $center->save();

                return redirect('/login')->with('regsuccess','Register Successfull! Login to Continue.');
            }else{
                return redirect('register')->with('usererror','Username/Phone Exists');
            }

        }




    }

}
