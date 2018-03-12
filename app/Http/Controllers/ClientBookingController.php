<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ClientBookingController extends Controller
{
    public function show(){
        //get booked dates
        $getBookedDates = Booking::where('client_id',Auth::guard('client')->id())->where('status','booked')->paginate(10);
        $getCompleteDates = Booking::where('client_id',Auth::guard('client')->id())->where('status','complete')->paginate(10);
        return view('client.bookings',compact('getBookedDates','getCompleteDates'));
    }

    //client local booking checked database in mark 00
    public function clientLocalBook(){

        $this->validate(request(),[
            'date' => 'required',
            'book_details' => 'required'
        ]);

        $clientBook = new Booking();
        $clientBook->client_id = Auth::guard('client')->id();
        $clientBook->user_id = 00;
        $clientBook->book_details = request('book_details');
        $clientBook->date = request('date');
        $clientBook->status = "booked";
        $clientBook->save();

        return redirect()->back();
    }

}
