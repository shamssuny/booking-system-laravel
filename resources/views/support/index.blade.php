@extends('master.template')

@section('title','Support | Ayojon')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/helpcenter.css') }}">
@endpush

@section('rightNavContent')
    <li><a href="">Welcome to Ayojon! </a></li>
@endsection

@section('content')
  <!-- body content  start -->
<main>
  
<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Support Center <small>Feel free to contact us</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box padding3">
                @if(session('requestSuccess'))
                    <p class="alert alert-success">{{ session('requestSuccess') }}</p>
                @endif
                <form method="post" action="{{ URL::current() }}">
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Username</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Username" required="required" name="username" />
                        <br>
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        <br>
                            <label for="subject">
                                User Type</label>
                            <select id="subject" name="user_type" class="form-control" required="required">
                                <option value="" selected="">Choose One:</option>
                                <option value="user">Customer </option>
                                <option value="client">Center Owner</option>
                                
                            </select>
                        <br>
                            <label for="Request">
                                Request Subject</label>
                            <input type="text" class="form-control" id="name" placeholder="Request Subject" required="required" name="subject" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="details" id="message" class="form-control" rows="13" cols="25" required="required"
                                placeholder="Message"></textarea>
                      
                   <br>
                    
                        
                            <input type="submit" name="submit" value="Submit Request " class="btn btn-primary pull-right">
                    </div>
                  </div>
                </form>
            </div>
        </div>
      
    </div>
</div>

    
</main>
<!-- body end -->
@endsection



