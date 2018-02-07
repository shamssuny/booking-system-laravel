@extends('master.template')


@section('content')

    <div class="center-main col-md-12">
        @if(session('updateSuccess'))
            {{ session('updateSuccess') }}
        @endif
        <h2>Your Center Details. Please Update it with proper info.</h2>
        @forelse($errors->all() as $error)
            {{ $error }}
        @empty
        @endforelse
        <span>Keep your info up to date.</span>
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="text" name="center_name" value="{{ $getCenterDetails->center_name }}" placeholder="Center name"><br>
            <input type="number" name="capacity" value="{{ $getCenterDetails->capacity }}" placeholder="Center Capacity"><br>
            <input type="text" name="price_range" value="{{ $getCenterDetails->price_range }}" placeholder="Price Range"><br>
            <textarea name="center_details" value="" placeholder="Center Description">{{ $getCenterDetails->center_details }}</textarea><br>
            <img src="/uploads/{{ $getCenterDetails->picture }}" alt="" height="100px" width="300px">
            <input type="file" name="picture" placeholder="Picture"><br>
            <textarea name="facility_details" value="" placeholder="Facility Details">{{ $getCenterDetails->facilities }}</textarea>
            <br>
            <label for="">Current Location: </label>{{ $getCenterDetails->city }} {{ $getCenterDetails->sub_city }}<br>
            <label for="">Select City And Sub City</label><br>
            <select name="city" id="c">

                @forelse($city as $cities)
                    @if($cities == $getCenterDetails->city)
                        <option value="{{ $cities }}" selected>{{ $cities }}</option>
                    @else
                        <option value="{{ $cities }}">{{ $cities }}</option>
                    @endif()

                @empty

                @endforelse

            </select><br>
            <select name="sub_city" id="sc">
                <option value="{{ $getCenterDetails->sub_city }}" selected>{{ $getCenterDetails->sub_city }}</option>
            </select><br>
            <textarea name="full_address" id="" placeholder="Full Details">{{ $getCenterDetails->full_address }}</textarea><br>
            <input type="submit" name="submit" value="Update">
        </form>


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
