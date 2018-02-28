@extends('master.template')

@section('title','Login | Ayojon')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endpush

@section('rightNavContent')
    <li><a href="">Welcome to Ayojon! </a></li>
@endsection

@section('content')
<!-- body content  start -->
<main>

        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 col-sm-12 col-xs-12">
          <div class="modal-content">
            <div class="modal-header text-center">
               
                <h4 class="modal-title" id="myModalLabel">
                    Login/Registration </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" >
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs bold">
                            <li class="active width50 text-center red"><a href="#Login"  class="black" data-toggle="tab">Login</a></li>
                            <li class="width50 text-center red"><a href="#Registration" class="black" data-toggle="tab">Registration</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content" style="padding-right: 30px;">
                            @if(session('usererror'))
                                {{ session('usererror') }}
                            @endif
                            @include('errors.error')
                            <div class="tab-pane fade in active" id="Login">
                                @if(session('regsuccess'))
                                    <p class="alert alert-success">{{ session('regsuccess') }}</p>
                                @endif

                                @if(session('loginError'))
                                        <p class="alert alert-danger">{{ session('loginError') }}</p>
                                @endif

                                <form action="/login" method="post" role="form" class="form-horizontal">
                                    {{ csrf_field() }}
	                                <div class="form-group">
	                                    <label for="email" class="col-sm-2 control-label">
	                                        Username</label>
	                                    <div class="col-sm-10">
	                                        <input type="text" class="form-control"  placeholder="Username" name="username" />
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
	                                        Password</label>
	                                    <div class="col-sm-10">
	                                        <input type="password" class="form-control" name="password" placeholder="Password" />
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label for="email" class="col-sm-2 col-md-2 control-label">User Type</label>
	                                    <div class="col-sm-10">
	                                        <label class="radio-inline"><input type="radio" name="u_type" value="user">User </label>
	                                        <label class="radio-inline"><input type="radio" name="u_type" value="client">Client</label>
	                                    </div>
	                                </div>
	                                <div class="row">
	                                    
	                                    <div class="col-sm-12 text-center">
	                                        <input type="submit" class="btn btn-danger-custom " name="submit">
	                                        <a href="{{ url('/resetPassword') }}" style="padding-left: 4%;color: #ae2d1a;">Forgot your password?</a>
	                                    </div>
	                                </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="Registration">
                                <form action="/register" method="post" role="form" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  placeholder="Username" name="username" value="{{ old('username') }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-2 control-label">
                                        Phone</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') }}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 col-md-2 control-label">User Type</label>
                                    <div class="col-sm-10">
                                        <label class="radio-inline"><input type="radio" name="u_type" value="user">User </label>
                                        <label class="radio-inline"><input type="radio" name="u_type" value="client">Client</label>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-sm-12 text-center">
                                        <input type="submit" class="btn btn-danger-custom ">
                                        
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
        </div>
    

<!-- body end -->

</main>

@endsection

