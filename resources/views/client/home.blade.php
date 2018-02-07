@extends('master.template')

@section('content')
    <div class="row">
        <div class="main col-md-12" style="">
            <div class="head col-md-12">
                <div class="left-head col-md-6">
                    আয়োজন
                    <span><a href="/client/center">Your Center</a></span>
                </div>

                <div class="right-head col-md-6">
                    <p>Account Active: {{ $accountStatus }}</p>
                    Welcome <b>{{ App\Client::where('id',Auth::guard('client')->id())->first()->username }}</b>
                </div>
            </div>
        </div>
    </div>
@endsection