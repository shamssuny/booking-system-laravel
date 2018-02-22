<?php

namespace App\Http\Controllers;

use App\Support;
use Illuminate\Http\Request;

use App\Http\Requests;

class SupportController extends Controller
{
    public function index(){
        return view('support.index');
    }

    //put a request
    public function store(){
        $this->validate(request(),[
            'username' => 'required|alpha_dash',
            'user_type' => 'required',
            'email' => 'email|required',
            'subject' => 'required|max:200',
            'details' => 'required|min:10'
        ]);

        $store = new Support();
        $store->username = request('username');
        $store->user_type = request('user_type');
        $store->email = request('email');
        $store->subject = request('subject');
        $store->details = request('details');
        $store->status = 'pending';
        $store->save();

        return redirect()->back()->with('requestSuccess','Your Request Submitted Successfully. We will contact with you through email.');
    }
}
