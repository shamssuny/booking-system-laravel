<?php

namespace App\Http\Controllers;

use App\Center;
use App\Client;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ClientHomeController extends Controller
{
    //show client homepage
    public function index(){
        //account status
        $getClient = Client::where('id',Auth::guard('client')->id())->first();
        $accountStatus = $getClient->active;

        //get other centers
        $getOtherCenters = Center::paginate(10);

        return view('client/home',compact('accountStatus','getOtherCenters'));
    }

    //show client center page
    public function centerShow(){
        //get center information
        $getCenterDetails = Center::where('client_id',Auth::guard('client')->id())->first();
        $city = array('dhaka','chittagong','khulna','barishal','mymensing');
        return view('client.centerShow',compact('getCenterDetails','city'));
    }

    //update center information
    public function updateCenter(Request $request){
        $this->validate(request(),[
            'center_name' => 'required|min:5',
            'capacity' => 'required|integer|min:1',
            'price_range' => 'required',
            'center_details' => 'required',
            'picture' => 'image|mimes:jpg,jpeg',
            'facility_details' => 'required',
            'city' => '',
            'sub_city' => '',
            'full_address' => 'required|min:10'
        ]);


        //update center data
        $getClient = Center::where('client_id',Auth::guard('client')->id())->first();
        $getClient->center_name = request('center_name');
        $getClient->capacity = request('capacity');
        $getClient->price_range = request('price_range');
        $getClient->center_details = request('center_details');
        $getClient->picture = Auth::guard('client')->id().'.jpg';
        $getClient->facilities = request('facility_details');
        $getClient->city = request('city');
        $getClient->sub_city = request('sub_city');
        $getClient->full_address = request('full_address');
        $getClient->save();

        //fucking with file -_-
        if($request->hasFile('picture')){
            if(File::exists(Auth::guard('client')->id().'.jpg')){
                File::delete(Auth::guard('client')->id().'.jpg');
            }
            $request->picture->move('uploads',Auth::guard('client')->id().'.jpg');
        }

        return redirect('/client/center')->with('updateSuccess','Profile Updated Successfully!');
    }


    //show update client page
    public function showUpdate(){
        $getClientData = Client::find(Auth::guard('client')->id());
        return view('client.update',compact('getClientData'));
    }

    //update data of client
    public function update(){
        $this->validate(request(),[
            'email' => 'email|required',
            'password' => 'confirmed|min:4'
        ]);

        //init
        $update = Client::find(Auth::guard('client')->id());
        if(!empty(request('password'))){
            $update->email = request('email');
            $update->password = bcrypt(request('password'));
            $update->save();
        }else{
            $update->email = request('email');
            $update->save();
        }

        return redirect()->back()->with('updateSuccess','Update Successfully');
    }


    //Show a center to client
    public function showCenter($id){
        $getTheCenter = Center::find($id);
        return view('client.otherCenter',compact('getTheCenter'));
    }

    //log out the clienr
    public function logout(){
        Auth::guard('client')->logout();
        return redirect('/login');
    }
}
