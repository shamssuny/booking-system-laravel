<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Center;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserShowController extends Controller
{
    public function searchView($id)
    {
        $getTheCenter = Center::where('id',$id)->where('active','yes')->first();
        $getBookedCenters = Booking::where('client_id',$getTheCenter->client_id)->where('status','booked')->get();
        return view('user/centerShow',compact('getTheCenter','getBookedCenters'));
    }
}
