@extends('master.template')

@section('title','Reset Password | Ayojon')


@section('rightNavContent')
    <li><a href="{{ url('/login') }}">Login/Register</a></li>
    <li><a href="">Welcome to Ayojon! </a></li>
@endsection


@section('content')

    <div class="reset col-md-12 col-sm-12">

        <div class="content col-md-6 col-md-offset-3" style="margin-top:3%;margin-bottom: 3%;">

            <div class="modal-content">

                <div class="modal-header" style="background-color: #AE2D1A;color:white;">
                    <h3 class="modal-title">Reset Password</h3>
                </div>

                <div class="modal-body text-center">

                        @if(session('resetSuccess'))
                            <p class="alert alert-success text-center">{{ session('resetSuccess') }}</p>
                        @endif

                        @include('errors.error')

                            <form action="{{ URL::current() }}" method="post" class="form-group">
                                {{ csrf_field() }}
                                <input class="form-control" type="number" name="phone" placeholder="Your Phone Number"><br>

                                <label for="c1" class="radio-inline"><input id="c1" type="radio" value="user" name="u_type">User</label>
                                <label for="c2" class="radio-inline"><input id="c2" type="radio" value="client" name="u_type">Client</label>
                                <br><br>
                                <input style="background-color: #AE2D1A;" class="btn btn-danger btn-sm" type="submit" name="submit" value="Reset Password">

                            </form>



                </div>

            </div>

        </div>

    </div>

@endsection