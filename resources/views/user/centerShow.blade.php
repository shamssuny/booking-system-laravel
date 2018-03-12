@extends('master.template')

@section('title','Center Show | Ayojon')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/userbooking.css') }}">
@endpush


@section('rightNavContent')
    <li><a  href="{{ url('/user/profile') }}">Profile</a></li>
    <li><a  href="{{ url('/user/bookings') }}">Bookings</a></li>
@endsection

@section('content')
<!-- body content  start -->
<main>
  

<div class="container box padding3" style="margin-top: 2%;">
  <div class="row">
    <div class="col-md-5 col-lg-5 col-sm-6 col-xs-12 ">
      <div class="center-details " style="">
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



    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 ">
      <div class="booked-date">
        <h3>Booked date</h3>
        <hr>
          @forelse($getBookedCenters as $booked)
              <div class="col-md-12">
                  {{ $booked->date }}
              </div>
              <hr>
          @empty
              No Upcoming Bookings
          @endforelse


      </div>
    </div>
    
    <div class="col-md-4  col-lg-4  col-sm-12 col-xs-12 ">
        <form action="{{ url('user/book/'.$getTheCenter->client_id) }}" method="post">
            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">
                                Select date</label>
                            <input type="text" class="form-control" id="datepicker" placeholder="Enter Date" required="required" name="date" />
                        <br>
                            
                      
                            <label for="name">
                                booking Details</label>
                            <textarea name="book_detail" id="message" class="form-control" rows="10" cols="25" required="required" placeholder="Booking Details"></textarea>
                        </div>
                        <div class="text-center padding3">
                          <input type="submit" name="" value="Make Booking" class="btn btn-primary pull-center ">
                        </div>
        </form>
    </div>



  </div>
</div>

    
</main>
<!-- body end -->


<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>
@endsection