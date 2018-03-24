<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class BookingController extends Controller
{
//    make a booking

    public function makeBook($client_id){

        $this->validate(request(),[
            'book_detail' => 'required|min:10',
            'date' => 'required'
        ]);

        $book = new Booking();
        $book->client_id = $client_id;
        $book->user_id = Auth::id();
        $book->book_details = request('book_detail');
        $book->date = request('date');
        $book->status = "pending";
        $book->save();
        return redirect('user/bookings')->with('bookSuccess','Record Save Successfully!');
    }

    //payment of the user
    public function payment(){
        //insert payment
        $this->validate(request(),[
            'transaction' => 'required',
            'booking_id' => 'required'
        ]);

        $payment = new Payment();
        $payment->user_id = Auth::id();
        $payment->booking_id = request('booking_id');
        $payment->transaction = request('transaction');
        $payment->status = "pending";
        $payment->save();

        //change status in booking table
        $bookStatus = Booking::find(request('booking_id'));
        $bookStatus->status = 'payment checking';
        $bookStatus->save();
        return redirect()->back();

    }

    //view all the booking status
    public function view(){
        $getAllBooking = Booking::where('user_id',Auth::id())->where('status','!=','complete')->orderBy('id','desc')->paginate(10,['*'],'book_pg');
        $getCompleteBooking = Booking::where('user_id',Auth::id())->where('status','complete')->orderBy('id','desc')->paginate(10,['*'],'complete_pg');
        return view('user.bookings',compact('getAllBooking','getCompleteBooking'));
    }
}
