@extends('master.template')

@section('title','Reset Password | Ayojon')


@section('rightNavContent')
    <li><a href="{{ url('/login') }}">Login/Register</a></li>
    <li><a href="">Welcome to Ayojon! </a></li>
@endsection


@section('content')
    <div class="main col-md-12 text-center">

        <h3>Reset Password</h3>

        @if(session('resetSuccess'))
            <p class="alert alert-success text-center">{{ session('resetSuccess') }}</p>
        @endif

        @include('errors.error')
        <div class="reset-passs col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
            <form action="{{ URL::current() }}" method="post" class="form-group">
                {{ csrf_field() }}
                <input class="form-control" type="number" name="phone" placeholder="Your Phone Number"><br>

                <label for="c1" class="radio-inline"><input id="c1" type="radio" value="user" name="u_type">User</label>
                <label for="c2" class="radio-inline"><input id="c2" type="radio" value="client" name="u_type">Client</label>
                <br><br>
                <input class="btn btn-warning btn-sm" type="submit" name="submit" value="Reset Password">

            </form>
        </div>

    </div>
@endsection