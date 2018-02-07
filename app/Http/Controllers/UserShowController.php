<?php

namespace App\Http\Controllers;

use App\Center;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserShowController extends Controller
{
    public function searchView($id)
    {
        $getTheCenter = Center::where('id',$id)->where('active','yes')->first();
        return view('user/centerShow',compact('getTheCenter'));
    }
}
