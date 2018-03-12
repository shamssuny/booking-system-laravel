@extends('master.template')

@section('title','Login | Admin Panel')

@push('css')
@endpush

@section('rightNavContent')
    <p class="navbar-text">Entry Restricted</p>
@endsection

@section('content')

    <div class="login-admin col-md-12 col-sm-12">

        <div class="login col-md-6 col-md-offset-3 col-sm-8 col-sm-2" style="margin-top: 3%;margin-bottom: 3%;">

            <div class="modal-content">

                <div class="modal-header" style="background-color: #AE2D1A;color:white;">
                    <h3 class="modal-title text-center">Caution!! Admin Panel Ahead. Keep Out. Or Die. </h3>
                </div>

                <div class="modal-content text-center" style="padding: 5%;">

                    @include('errors.error')
                    <form class="form-group" method="post" action="{{ URL::current() }}">
                        {{ csrf_field() }}
                        <input class="form-control" type="text" name="username" placeholder="username"><br>
                        <input class="form-control" type="password" name="password" placeholder="password"><br>
                        <input class="btn btn-danger" style="background-color: #AE2D1A;" type="submit" name="submit" value="Login">
                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection