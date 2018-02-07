<?php

namespace App\Http\Controllers;

use App\Center;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Approve;
use App\User;

class UserHomeController extends Controller
{

    //show user homepage
    public function index(){
        //all the cities name array (defined in blade)
        //$city = array('dhaka','chittagong','khulna','barishal','mymensing');

        //get all the centers data
        $allCenters = Center::Where('active','yes')->get();
        return view('user/home',compact('allCenters'));
    }


    //search centers for user
    public function search()
    {
        $city = request('city');
        $sub_city = request('sub_city');
        $center = request('search_text');
        //search according to the value
        $allSearchCenters = Center::where('city','like','%'.$city.'%')
                                    ->orWhere('sub_city','like','%'.$sub_city.'%')
                                    ->get();
        return view('user/home',compact('allSearchCenters'));

    }


    public function showActivePage(){
        return view('user/active');
    }

    public function activeCode(){
        $getCode = request('active_code');
        $getCodeFromDb = Approve::where('user_id',Auth::id())->first()->code;
        if($getCode == $getCodeFromDb){
            //update active status
            $getUser = User::find(Auth::id());
            $getUser->active = "yes";
            $getUser->save();

            //delete data from approve table
            $getApproveUser = Approve::where('user_id',Auth::id());
            $getApproveUser->delete();

            //redirecting to the user homepage with Message
            return redirect('user')->with('activeSuccess','Account Activate Successfully!');

        }else{
            return redirect('/user/active')->with('codeError','Code Does not Match!');
        }
    }


    //resend the code to phone
    public function resendCode(){
        //get user code send it via sms gateway
        return 'resend code procedure goes here';
    }

    //logout the user
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}
