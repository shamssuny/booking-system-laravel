@extends('master.template')

@section('title','Activation | User | Ayojon')

@push('css')
@endpush


@section('content')

    <div class="col-md-12 col-sm-12">

        <div class="active col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3" style="margin-top: 3%;margin-bottom: 3%;">

            <div class="modal-content">

                <div class="modal-header redbg white">

                    <div class="modal-title">
                        <h3>Active Your Account First</h3>
                    </div>

                </div>


                <div class="modal-body text-center">

                    @if(session('codeError'))
                        <p class="alert alert-danger">{{ session('codeError') }}</p>
                    @endif

                    @if(session('smsAlert'))
                        <p class="alert alert-info alert-dismissable">{{ session('smsAlert') }}</p>
                    @endif
                    <form class="form-group form-inline" action="/user/active" method="POST">
                        {{ csrf_field() }}
                        <input class="form-control" type="text" name="active_code" placeholder="Enter Your Code"><br><br>
                        <input  class="btn btn-danger redbg" type="submit" name="submit" value="submit">
                    </form>

                    <a href="/user/active/resend" >Resend Code</a>


                </div>

            </div>

        </div>

    </div>

@endsection