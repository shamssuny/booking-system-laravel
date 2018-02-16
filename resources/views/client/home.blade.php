@extends('master.template')

@section('content')

        <div class="main col-md-12" style="">
            <div class="head col-md-12">
                <div class="left-head col-md-6">
                    আয়োজন
                    <span><a href="/client/center">Your Center</a></span>
                    <span><a href="{{ url('client/bookings') }}">Bookings</a></span>

                </div>

                <div class="right-head col-md-6">
                    <a href="{{ url('/client/profile') }}">Update Profile</a>
                    <p>Account Active: {{ $accountStatus }}</p>
                    Welcome <b>{{ App\Client::where('id',Auth::guard('client')->id())->first()->username }}</b>
                </div>
            </div>



            {{--other centers list--}}
            <div class="other-centers col-md-12">

                <h3>All Other Centers Like You.</h3>

                @forelse($getOtherCenters as $center)
                    <div class="center-detail col-md-8 col-md-offset-2" style="border:2px dotted coral;box-shadow: 2px 5px 2px 2px;">
                        <div class="col-md-4">
                            <p>{{ $center->center_name }}</p>
                            <span>Price Range: {{ $center->price_range }}</span>
                        </div>
                        <div class="col-md-4">
                            <p>{{ $center->city }} || {{ $center->sub_city }}</p>
                        </div>
                        <div class="col-md-4">
                            <a class="btn btn-primary" href="{{ url('client/show/center/'.$center->id) }}">View Details</a>
                        </div>
                    </div>
                @empty
                @endforelse
                {{ $getOtherCenters->links() }}
            </div>

        </div>


@endsection