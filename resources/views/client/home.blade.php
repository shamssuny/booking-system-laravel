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

            @php
                $city = array('dhaka','chittagong','khulna','barishal','mymensing');
            @endphp

            {{--Search area--}}
            <div class="search-area col-md-12">

                <div class="search-box col-md-12 text-center">
                    <form action="" method="POST">
                        {{ csrf_field() }}
                        <select name="city" id="c">
                            <option value="">-----</option>
                            @forelse($city as $cities)
                                <option value="{{ $cities }}">{{ $cities }}</option>
                            @empty

                            @endforelse
                        </select>

                        <select name="sub_city" id="sc">
                            <option value="">-----</option>
                        </select>

                        <input type="submit" name="submit" value="submit">
                    </form>
                </div>

            </div>



            {{--other centers list--}}
            <div class="other-centers col-md-12">

                <h3>All Other Centers Like You.</h3>

                @if(isset($allSearchCenters))
                    @forelse($allSearchCenters as $center)
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
                    {{ $allSearchCenters->links() }}
                @else
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
                @endif


            </div>

        </div>

















        <script type="text/javascript">
            //code for make auto generated dropdown
            var dhaka = ['uttara','mirpur','rampura','banani','mohakhali'];
            var chittagong = ['halishahar','pahartali','agrabad'];
            $('#c').change(function () {
                var getValue = $(this).val();
                if(getValue == 'dhaka'){
                    $('#sc').html("");
                    for(var i=0;i<dhaka.length;i++){
                        $('#sc').append("<option value='"+dhaka[i]+"'>"+dhaka[i]+"</option>");
                    }
                }else if(getValue == 'chittagong'){
                    $('#sc').html("");
                    for(var i=0;i<chittagong.length;i++){
                        $('#sc').append("<option value='"+chittagong[i]+"'>"+chittagong[i]+"</option>");
                    }
                }
            });
        </script>
@endsection