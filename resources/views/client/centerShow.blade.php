@extends('master.template')

@section('title','Center Update | Client | Ayojon')


@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/centerdetailupdate.css') }}">
@endpush


@section('rightNavContent')
    <li><a href="{{ url('/client/profile') }}">Update Profile</a></li>
    <li><a href="{{ url('client/bookings') }}">Bookings</a></li>
    <li><a href="/client/center">Your Center</a></li>
@endsection

  @section('content')
<!-- body content  start -->
<main>

<div class="container box"> <br />
    <div class="row">
      <div class="modal-header text-center">
          @if(session('updateSuccess'))
              <p class="alert alert-success">{{ session('updateSuccess') }}</p>
          @endif

          @include('errors.error')
                <h2 class="modal-title" id="myModalLabel" >
                   ** Your Center Details, Update With Proper Info ** </h2>
                    
            </div>
    <form action="{{ URL::current() }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal">
        {{ csrf_field() }}
      <div class="col-md-5 ">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Upload Center Image</strong> <small> </small></div>
        <div class="panel-body ">
            <small style="color: red;">File Should Not Exceed 2MB</small>
          <div class="input-group image-preview">
            {{--<input placeholder="" type="text" class="form-control image-preview-filename" disabled="disabled">--}}
            <!-- don't give a name === doesn't send on POST/GET -->

            <span class="input-group-btn"> 
            

            <!-- image-preview-input -->
            <div class="">

              <input id="fl" type="file" name="picture" placeholder="Input Your Image" class="form-control"/>
              <!-- rename it --> 
            </div>
           
            </span> </div>
            <div id="fileErr">
                {{--show error on image upload if overflow--}}
            </div>
          <!-- /input-group image-preview [TO HERE]--> 
          
          <br />
          
          <!-- Drop Zone -->
          <div class="upload" id="drop-zone">
              @if(!empty($getCenterDetails->picture))
                  <img width="100%" src="/uploads/{{ $getCenterDetails->picture }}" alt="Nothing To Show">
              @else
                  No Image Uploaded
              @endif
          </div>
          <br />
          
        
        </div>
      </div>
    </div>
        
      <div class="col-md-7 ">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Update Center Info</strong> <small> </small></div>
        <div class="panel-body">
        
          <div class="form-group">
              <label for="Center Name" class="col-sm-3 control-label">Center Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="center_name" placeholder="Center Name" value="{{ $getCenterDetails->center_name }}"  />
              </div>
          </div>
          <div class="form-group">
              <label for="Capacity" class="col-sm-3 control-label">Capacity</label>
              <div class="col-sm-9">
                <input type="number" class="form-control"  placeholder="Capacity" name="capacity" value="{{ $getCenterDetails->capacity }}" />
              </div>
          </div>
          <div class="form-group">
              <label for="Price Range" class="col-sm-3 control-label">Price Range</label>
              <div class="col-sm-9">
                <input type="text" class="form-control"  placeholder="Price Range" name="price_range" value="{{ $getCenterDetails->price_range }}" />
              </div>
          </div>
          <div class="form-group">
              <label for="Center Details" class="col-sm-3 control-label">Center Details</label>
              <div class="col-sm-9">
                <textarea id="message" class="form-control" rows="5" cols="25" required="required"
                                placeholder="Center Details" name="center_details">{{ $getCenterDetails->center_details }}</textarea>
              </div>
          </div>
          <div class="form-group">
              <label for="Center Facilities" class="col-sm-3 control-label">Center Facilities</label>
              <div class="col-sm-9">
                <textarea id="message" class="form-control" rows="5" cols="25" required="required"
                                placeholder="Message" name="facility_details">{{ $getCenterDetails->facilities }}</textarea>
              </div>
          </div>
          {{--<div class="form-group">--}}
              {{--<label for="Current Location" class="col-sm-3 control-label">Current Location</label>--}}
              {{--<div class="col-sm-9">--}}
                {{--<input type="text" class="form-control"  placeholder="Username" name="Username" />--}}
              {{--</div>--}}
          {{--</div>--}}

          <div class="form-group">
              <label for="City & Subcity" class="col-sm-3 control-label">Select City & Subcity </label>
              <div class="col-sm-9 zero">
                <div class="col-md-5 col-sm-4 col-xs-12 sec">
                  <select class="form-control" name="city" id="c">
                      @forelse($city as $cities)
                          @if($cities == $getCenterDetails->city)
                              <option value="{{ $cities }}" selected>{{ $cities }}</option>
                          @else
                              <option value="{{ $cities }}">{{ $cities }}</option>
                          @endif()

                      @empty

                      @endforelse
                  </select>
              </div>
              <div class="col-md-5 col-sm-4 col-xs-12 sec">
                  <select class="form-control" name="sub_city" id="sc">
                      <option value="{{ $getCenterDetails->sub_city }}" selected>{{ $getCenterDetails->sub_city }}</option>
                  </select>
              </div>
              </div>
          </div>
          <div class="form-group">
              <label for="Full Address" class="col-sm-3 control-label">Full Address</label>
              <div class="col-sm-9">
                <textarea id="message" class="form-control" rows="2" cols="25" required="required"
                                placeholder="Message" name="full_address">{{ $getCenterDetails->full_address }}</textarea>
              </div>
          </div>

          <input type="submit" name="submit" value="update " class="btn btn-primary pull-right">

        </div>
        </div>
    </div>   
  </form>     
        
        
  </div>
</div>

<!-- /container --> 

    
</main>
<!-- body end -->




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

<script>

    $('#fl').change(function(){
        var f = this.files[0];
        if(f.size > 2097152){
            $('#fileErr').append("<p class='alert alert-danger text-center'>File Limit Exceed</p>");
        }else{
            $('#fileErr').html('');
        }
    });

</script>
  @endsection