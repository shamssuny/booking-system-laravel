@extends('master.template')

@section('title','Update Profile | Client | Ayojon')

@push('css')
<style>
    .contents{
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 15px;
        box-shadow: 0px 2px 30px 0px;
        padding: 3%;
    }
    h2{
        margin: 20px;
        padding:10px;
        border-radius: 0px 50px 0px 50px;
        box-shadow: 0px 5px 28px 3px;
    }
</style>
@endpush

@section('rightNavContent')
    <li><a href="{{ url('/client/profile') }}">Update Profile</a></li>
    <li><a href="{{ url('client/bookings') }}">Bookings</a></li>
    <li><a href="/client/center">Your Center</a></li>
@endsection


@section('content')

<div class="main col-md-12">

    <div class="contents col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        @include('errors.error')

        @if(session('updateSuccess'))
            <p class="alert alert-success">{{ session('updateSuccess') }}</p>
        @endif
        <form class="form-group" method="post" action="{{ URL::current() }}">
            <h2 class="text-center">Update Your Data</h2>
            {{ csrf_field() }}
            <input class="form-control" type="email" name="email" placeholder="Your Email" value="{{ $getClientData->email }}"><br>
            <input class="form-control" type="password" name="password" placeholder="Password"><br>
            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
            <br>
            <input type="submit" name="submit" value="Update" class="btn btn-danger">

        </form>
    </div>

</div>


@endsection
