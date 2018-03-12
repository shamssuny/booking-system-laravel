@extends('master.template')

@section('title','Center Show | Client | Ayojon')

@section('rightNavContent')
    <li><a href="{{ url('/client/profile') }}">Update Profile</a></li>
    <li><a href="{{ url('client/bookings') }}">Bookings</a></li>
    <li><a href="/client/center">Your Center</a></li>
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/clientcentershow.css') }}">
@endpush

@section('content')
<!-- body content  start -->
<main>
  

<div style="margin-top: 3%;" class="container box padding3">
  <div class="row">
    <div  class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-sm-12 col-xs-12 ">
      <div class="center-details ">
        <img src="/uploads/{{ $getTheCenter->picture }}">
        <div class="h-details">

          <h3>Name: <span class="bold">{{ $getTheCenter->center_name }}</span></h3>
          
          <div class="data capacity">  
            Capacity  <em> 
            <span class="amount">{{ $getTheCenter->capacity }}</span></em>

          </div>
          
          <div class=" data Price-range">  
            Price Range:  <em> <span class="curr">$</span>
            <span class="amount">{{ $getTheCenter->price_range }}</span></em>
          </div>
          
          <div class=" data c-d">  
            <p>Center Details:</p> 
            <span class="amount">{{ $getTheCenter->center_details }}</span>
          </div>
          
          
          <div class=" data faci">  
            <p style="">Facilities: </p> 
            <span class="amount">{{ $getTheCenter->facilities }}</span>
          </div>
          
          
          <div class=" data city">  
            City:  <em> 
            <span class="amount">{{ $getTheCenter->city }}, {{ $getTheCenter->sub_city }}</span></em>
          </div>
          
          <div class=" data city">  
            <p style="">Full Address:</p> 
            <span class="amount">{{ $getTheCenter->full_address }}</span>
          </div>
          
        </div>
      </div>
    </div>




  </div>
</div>

    
</main>
<!-- body end -->

@endsection