@extends('master.template')

@section('title','Admin | Ayojon')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
@endpush


@section('content')
<!-- body content  start -->
<main>
  
<div class="jumbotron jumbotron-sm">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Dashboard <small>Maintain on your requirment</small></h1>
            </div>
        </div>
    </div>
</div>



<br />

<div class="container">
  <div class="row">
    <div class="col-md-12 client-section box">
      <div class="section-head">
        <h1>Client Section</h1>
      </div>
      <div class="col-sm-6 padding2">
          <a href="{{ url('/auth/admin/client-verify') }}">
            <div class="hero-widget well well-sm">
                  <div class="icon">
                       <i class="fa fa-check-square"></i>

                  </div>
                  <div class="text">
                      <var>{{ App\Client::where('active','yes')->count() }}</var>
                      <label class="text-muted"><h2>Client Varification</h2></label>
                  </div>
                  
            </div>
          </a>
            
      </div>
      <div class="col-sm-6 padding2">
          <a href="{{ URL::current() }}/client-manager">
            <div class="hero-widget well well-sm">
                  <div class="icon">
                       <!-- <i class="glyphicon glyphicon-star"></i> -->
                       <i class="fa fa-users"></i>
                  </div>
                  <div class="text">
                      <var>{{ App\Client::all()->count() }}</var>
                      <label class="text-muted"><h2>Manage Clients</h2></label>
                  </div>
                  
              </div>
          </a>
              
      </div>
    </div>

    <div class="col-md-12 user-section box">
      <div class="section-head">
        <h1>User Section</h1>
      </div>
      <div class="col-sm-6 padding2">
          <a href="{{ URL::current() }}/booking">
            <div class="hero-widget well well-sm">
                <div class="icon">
                     <i class="glyphicon glyphicon-calendar"></i>
                </div>
                <div class="text">
                    <var>{{ App\Booking::where('status','pending')->count() }}</var>
                    <label class="text-muted"><h2>Booking Manager</h2></label>
                </div>
                
            </div>
          </a>
            
      </div>
        <div class="col-sm-6 padding2">
            <a href="{{ URL::current() }}/user-manager"">
              <div class="hero-widget well well-sm">
                <div class="icon">
                     <i class="fa fa-user-circle"></i>
                </div>
                <div class="text">
                    <var>{{ App\User::all()->count() }}</var>
                    <label class="text-muted"><h2>User Manage</h2></label>
                </div>
                
            </div>
            </a>
        </div>
    </div>

    <div class="col-md-12 client-section box">
      <div class="section-head">
        <h1>Support Center</h1>
      </div>
      <div class="col-sm-12 padding2">
          <a href="{{ URL::current() }}/support">
            <div class="hero-widget well well-sm">
                <div class="icon">
                     <i class="fa fa-question-circle"></i>
                </div>
                <div class="text">
                    <var>{{ App\Support::where('status','pending')->count() }}</var>
                    <label class="text-muted"><h2>Support center</h2></label>
                </div>
                
            </div>
          </a>
            
      </div>
        
    </div>
    
        
  </div>
</div>


    
</main>
<!-- body end -->

@endsection