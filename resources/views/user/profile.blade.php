@extends('master.template')

@section('title','Update Profile | Ayojon')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/updateprofile.css') }}">
@endpush

@section('rightNavContent')
    <li><a  href="{{ url('/user/profile') }}">Profile</a></li>
    <li><a  href="{{ url('/user/bookings') }}">Bookings</a></li>
@endsection

@section('content')
<!-- body content  start -->
<main>

        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 col-sm-12 col-xs-12" style="margin-top: 3%;margin-bottom: 3%;">
          <div class="modal-content">
            <div class="modal-header text-center">
               
                <h4 class="modal-title" id="myModalLabel">
                    Update Profile </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" >
                        <!-- Nav tabs -->
                    @include('errors.error')
                    @if(session('updateSuccess'))
                            <p class="alert-success">{{ session('updateSuccess') }}</p>
                    @endif
                        <!-- Tab panes -->
                        <div class="update-content" style="">
                            
                                <form method="post" action="{{ URL::current() }}" role="form" class="form-horizontal">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label">
                                        Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  placeholder="Enter your Email" name="email" value="{{ $user->email }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-3 control-label">
                                      New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" placeholder="New Password" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-3 control-label">
                                      Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" />
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-sm-12 text-center">
                                        <input type="submit" class="btn btn-green-custom " name="update" value="Update">
                                        
                                    </div>
                                </div>
                                </form>
                            
                            
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
          </div>
        </div>
    

<!-- body end -->

</main>

@endsection
