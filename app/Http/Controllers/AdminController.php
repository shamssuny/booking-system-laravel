<?php

namespace App\Http\Controllers;

use App\Approve;
use App\Booking;
use App\Center;
use App\Client;
use App\Payment;
use App\Support;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //show admin dashboard
    public function index(){
        return view('admin.dashboard');
    }

    //show login page
    public function showLogin(){
        if(Auth::guard('admin')->check()){
            return redirect(url('auth/admin'));
        }
        return view('admin.login');
    }

    //logged in the admin
    public function login(){
        $this->validate(request(),[
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt(['username' => request('username') , 'password' => request('password')])){
            return redirect(url('auth/admin'));
        }
    }


    //show showClientVerify page
    public function showClientVerify(){
        $inactive = Client::where('active','no')->paginate(10,['*'],'ac_client');
        $active = Client::where('active','yes')->paginate(10);
        return view('admin.clientverify',compact('inactive','active'));
    }


    //active a client
    public function activeClient($id){
        if(!empty($id)){
            $getClientId = Client::find($id);
            $getClientCenter = Center::where('client_id',$id)->first();

            //set active status
            $getClientId->active = 'yes';
            $getClientId->save();

            $getClientCenter->active = 'yes';
            $getClientCenter->save();
        }

        return redirect()->back();
    }



    //inactive a client
    public function inactiveClient($id){
        if(!empty($id)){
            $getClientId = Client::find($id);
            $getClientCenter = Center::where('client_id',$id)->first();

            //set active status
            $getClientId->active = 'no';
            $getClientId->save();

            $getClientCenter->active = 'no';
            $getClientCenter->save();
        }

        return redirect()->back();
    }


    //show showClientManager page
    public function showClientManager(){
        $getAllClient = Client::paginate(10);
        return view('admin.showClientManager',compact('getAllClient'));
    }

    //show client's center
    public function showClientCenter($id){
        $getTheCenter = Center::where('client_id',$id)->get()->first();
        return view('admin.showClientCenter',compact('getTheCenter'));
    }

    public function showSearchClients(){
        $getSearchClient = Client::where('username','like','%'.request('search').'%')->paginate(10);
        return view('admin.showClientManager',compact('getSearchClient'));
    }

    //delete a client
    public function deleteClient($id){
        $getBook = Booking::where('client_id',$id)->get();
        foreach ($getBook as $book){
            Payment::where('booking_id',$book->id)->delete();
        }
        Booking::where('client_id',$id)->delete();
        Center::where('client_id',$id)->delete();
        Client::find($id)->delete();
        File::delete(public_path('uploads/'.$id.'.jpg'));
        return redirect()->back()->with('deleteSuccess','User Deleted Successfully');
    }


    //show bookings
    public function showBooking(){
        $getPendings = Booking::where('status','pending')->orderBy('id','desc')->paginate(10,['*'],'pending_pg');
        $getPaymentPendings = Booking::where('status','payment')->orderBy('id','desc')->paginate(10,['*'],'payment_pg');
        $getPaidCode = Booking::where('status','payment checking')->orderBy('id','desc')->paginate(10,['*'],'paidcode_pg');
        $getBooked = Booking::where('status','booked')->orderBy('id','desc')->paginate(10,['*'],'booked_pg');
        $getComplete = Booking::where('status','complete')->orderBy('id','desc')->paginate(10,['*'],'complete_pg');
        return view('admin.bookingManager',compact('getPendings','getPaymentPendings','getPaidCode','getBooked','getComplete'));
    }

    //change booking status
    public function bookStatus($id){
        //make instance of book model

        $bookStat = Booking::find($id);
        if(request('status') == 'pending'){
            //dd("aisi");
            $bookStat->status = 'pending';
            $bookStat->save();
        }else if(request('status') == 'payment'){
            //if select payment it will check if a payment exists on this booking, if found it will be deleted automatically
            Payment::where('booking_id',$id)->delete();
            $bookStat->status = 'payment';
            $bookStat->save();
        }else if(request('status') == 'payment checking'){
            $bookStat->status = 'payment checking';
            $bookStat->save();
        }else if(request('status') == 'booked'){
            $bookStat->status = 'booked';
            $bookStat->save();
        }else if(request('status') == 'complete'){
            $bookStat->status = 'complete';
            $bookStat->save();
        }else if(request('status') == 'delete'){
            Payment::where('booking_id',$id)->delete();
            Booking::find($id)->delete();
        }

        return redirect()->back()->with('actionSuccess','Action Successful!');
    }


    //showUserManager
    public function showUserManager(){
        $getUsers = User::paginate(10);
        return view('admin.userManager',compact('getUsers'));
    }

    //search user
    public function showSearchUser(){
        $getSearchUsers = User::where('username','like','%'.request('search').'%')->paginate(10);
        return view('admin.userManager',compact('getSearchUsers'));
    }


    //delete a user
    public function deleteUser($id){
        Approve::where('user_id',$id)->delete();
        Payment::where('user_id',$id)->delete();
        Booking::where('user_id',$id)->delete();
        User::find($id)->delete();
        return redirect()->back()->with('deleteSuccess','User Deleted Successfully');
    }


    //show support center
    public function showSupport(){
        $getSupport = Support::orderBy('id','desc')->paginate(20);
        return view('admin.support',compact('getSupport'));
    }


    //supdate status of support center
    public function updateSupport($id){
        $support = Support::find($id);
        $support->status = request('status');
        $support->save();

        return redirect()->back()->with('updated','Updated Successful!');
    }


    //logged out an user
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/auth/login');
    }
}
