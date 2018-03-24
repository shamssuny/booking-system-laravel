@extends('master.template')

@section('title','Home | Client | Ayojon')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/userhomepage.css') }}">
@endpush

@section('leftNavContent')
    <p class="navbar-text">Active: {{ $accountStatus }}</p>
@endsection

@section('rightNavContent')
    <li><a href="{{ url('/client/profile') }}">Update Profile</a></li>
    <li><a href="{{ url('client/bookings') }}">Bookings</a></li>
    <li><a href="/client/center">Your Center</a></li>
@endsection


@php
    //$city = array('dhaka','chittagong','khulna','barishal','mymensing');
@endphp


@section('content')
    <!-- body content  start -->
    <main>
        <!-- dropdown -->
        <div class="container">
            <div class="col-xs-8 col-md-8 col-md-offset-2 col-lg-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 " style="padding-top: 5%;">
                <div class="row ">
                    <form action="{{ url('client/search') }}" method="GET">

                        <div class="col-md-4 col-sm-4 col-xs-12 sec" >
                            <select class="form-control" name="city" id="c">
                                <option value="">City</option>
                                @forelse($city as $cities)
                                    <option value="{{ $cities }}">{{ $cities }}</option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 sec">
                            <select class="form-control" name="sub_city" id="sc">
                                <option value="">Sub City</option>
                            </select>
                        </div>


                        <div class="col-md-3 col-sm-3 col-xs-12"><input type="submit" name="submit" class="btn btn-primary full-width" value="Search"></div>
                    </form>
                </div>
            </div>

        </div>
        <!-- dropdown end -->

        <div class="container">
            <div class="row">
                <h3 class="text-center pad-bt-2">Other Centers Like You</h3>


            @if(isset($allSearchCenters))
                @forelse($allSearchCenters as $alls)

                    <!-- center start -->
                        <div class="check col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class=" av-center box">
                                <div class="center-image">
                                    <img height="200px" src="{{ asset('uploads/'.$alls->picture) }}" alt="Madeira levadas">
                                </div>
                                <div class="center-details">
                                    <h3>{{ $alls->center_name }}</h3>
                                    <span class="address">Location : </span>
                                    <span class="rating"><i>{{ $alls->city }} , {{ $alls->sub_city }}</i></span>
                                    <div style="border-bottom: 1px solid grey;" class="price">
                                        Price Range :  <em> <span class="curr"></span>
                                            <span class="amount">{{ $alls->price_range }}</span></em>
                                    </div>

                                    <div class="action">
                                        <a href="{{ url('client/show/center/'.$alls->id) }}" class="btn btn-danger">
                                            See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- center end -->


                    @empty

                    @endforelse
                    <div class="col-md-12 text-center">
                        {{ $allSearchCenters->appends(request()->all())->links() }}
                    </div>


                @else
                    @forelse($getOtherCenters as $all)


                    <!-- center start -->
                        <div class="check col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class=" av-center box">
                                <div class="center-image">
                                    <img height="200px" src="{{ asset('uploads/'.$all->picture) }}" alt="Madeira levadas">
                                </div>
                                <div class="center-details">
                                    <h3>{{ $all->center_name }}</h3>
                                    <span class="address">Location : </span>
                                    <span class="rating"><i>{{ $all->city }} , {{ $all->sub_city }}</i></span>
                                    <div style="border-bottom: 1px solid grey;" class="price">
                                        Price Range :  <em> <span class="curr"></span>
                                            <span class="amount">{{ $all->price_range }}</span></em>
                                    </div>

                                    <div class="action">
                                        <a href="{{ url('client/show/center/'.$all->id) }}" class="btn btn-danger">
                                            See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- center end -->


                    @empty
                    @endforelse
                    <div class="col-md-12 text-center">
                        {{ $getOtherCenters->links() }}
                    </div>

                @endif


            </div>
        </div>


    </main>

    <!-- body end -->


    <script type="text/javascript">

    </script>

@endsection