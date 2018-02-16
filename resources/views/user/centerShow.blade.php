@extends('master.template')

@section('content')
    <div class="main col-md-12">

        <div class="center-detail col-md-7" style="border:1px solid blue;">

            <h2>{{ $getTheCenter->center_name }}</h2>
            <img src="/uploads/{{ $getTheCenter->picture }}" alt="" height="100px" width="300px">
            <p>Capacity :: {{ $getTheCenter->capacity }}</p>
            <p>Price Range: {{ $getTheCenter->price_range }}</p>
            <p>Center  Details: {{ $getTheCenter->center_details }}</p>
            <p>Facilities: {{ $getTheCenter->facilities }}</p>
            <p>City : {{ $getTheCenter->city }}, {{ $getTheCenter->sub_city }}</p>
            <p>Full Address: {{ $getTheCenter->full_address }}</p>

        </div>

        <div class="bookings col-md-5" style="">
            <h3>Booked Dates: </h3>
            <hr>
            @forelse($getBookedCenters as $booked)
                <div class="col-md-12">
                    {{ $booked->date }}
                </div>
            @empty
                No Upcoming Bookings
            @endforelse

        </div>

    </div>


    <div class="booking-buttons-forms col-md-12">

        <form action="{{ url('user/book/'.$getTheCenter->client_id) }}" method="post">
            {{ csrf_field() }}
            <label for="">Select Date:</label>
            <input type="text" id="datepicker" name="date" placeholder="Booking Date"><br>
            <textarea name="book_detail" id="" placeholder="Detailed Description about your booking"></textarea>
            <input type="submit" name="book" value="Make Booking">
        </form>

    </div>

    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
@endsection