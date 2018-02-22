@extends('master.template')

@section('content')

@if(session('activeSuccess'))
    {{ session('activeSuccess') }}
@endif
<h2>User Homepage</h2>
<div class="user-head col-md-12">


    <div class="head-left col-md-6">
        আয়োজন
        <span><a href="{{ url('/user/profile') }}">Profile</a></span>
        <span><a href="{{ url('/user/bookings') }}">Bookings</a></span>
    </div>


    <div class="head-right col-md-6">
        Welcome {{ Auth::id() }}
    </div>


</div>

@php
    $city = array('dhaka','chittagong','khulna','barishal','mymensing');
@endphp

{{--main area start--}}
<div class="search-area col-md-12">

    <div class="search-box col-md-12 text-center">
        <form action="{{ URL::current() }}" method="POST">
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



{{--search result area--}}
<div class="center-list-main col-md-12">
    @if(isset($allSearchCenters))
        @forelse($allSearchCenters as $alls)
            <div class="center-detail col-md-8 col-md-offset-2" style="border:2px dotted coral;box-shadow: 2px 5px 2px 2px;">
                <div class="col-md-4">
                    <p>{{ $alls->center_name }}</p>
                    <span>Price Range: {{ $alls->price_range }}</span>
                </div>
                <div class="col-md-4">
                    <p>{{ $alls->city }} || {{ $alls->sub_city }}</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-primary" href="user/center/{{ $alls->id }}">View Details</a>
                </div>
            </div>
        @empty

        @endforelse

    @else
        @forelse($allCenters as $all)
            <div class="center-detail col-md-8 col-md-offset-2" style="border:2px dotted coral;box-shadow: 2px 5px 2px 2px;">
                <div class="col-md-4">
                    <p>{{ $all->center_name }}</p>
                    <span>Price Range: {{ $all->price_range }}</span>
                </div>
                <div class="col-md-4">
                    <p>{{ $all->city }} || {{ $all->sub_city }}</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-primary" href="user/center/{{ $all->id }}">View Details</a>
                </div>
            </div>
        @empty
        @endforelse
        <div class="col-md-12">
            {{ $allCenters->links() }}
        </div>

    @endif
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