@extends('master.template')

@section('title','User Bookings | Ayojon')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{asset('css/userbooking-editing.css')}}">
@endpush

@section('rightNavContent')
    <li><a  href="{{ url('/user/profile') }}">Profile</a></li>
    <li><a  href="{{ url('/user/bookings') }}">Bookings</a></li>
@endsection


@section('content')

<!-- body content  start -->
<main>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12  col-lg-12  col-sm-12 col-xs-12">
          <div class="modal-content" style="margin-top: 3%;margin-bottom: 3%;">
            <div class="modal-header text-center">
               
                <h4 class="modal-title" id="myModalLabel" class="" >
                    Booking Statistics </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" >
                    @if(session('bookSuccess'))
                            <p class="alert alert-success">{{ session('bookSuccess') }}</p>
                    @endif
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs bold">
                            <li class="active width50 text-center red"><a href="#Login"  class="black" data-toggle="tab">Booking Status</a></li>
                            <li class="width50 text-center red"><a href="#Registration" class="black" data-toggle="tab">Completed Booking</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content" style="padding-right: 30px;">
                            <div class="tab-pane fade in active" id="Login">
                                <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      
                                      <th scope="col">Name</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Date</th>
                                      <th scope="col">Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @forelse($getAllBooking as $bookings)
                                    <tr>
                                      
                                      <td>{{ \App\Center::where('client_id',$bookings->client_id)->first()->center_name }}</td>
                                      <td>{{ $bookings->book_details }}</td>
                                      <td>{{ $bookings->date }}</td>
                                      <td>
                                          @if($bookings->status == 'payment')
                                              <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal{{ $bookings->id }}" href="">Make Payment</a>
                                          @else
                                              {{ $bookings->status }}
                                          @endif
                                      </td>
                                    </tr>
                                  @empty
                                      <tr><td>No Bookings Yet!!</td></tr>
                                  @endforelse

                                  </tbody>
                              </table>
                                {{ $getAllBooking->links() }}
                            </div>
                            <div class="tab-pane fade" id="Registration">
                                <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      
                                      <th scope="col">Name</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Date</th>
                                      <th scope="col">Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @forelse($getCompleteBooking as $complete)
                                    <tr>
                                      <td>{{ \App\Center::where('client_id',$complete->client_id)->first()->center_name }}</td>
                                      <td>{{ $complete->book_details }}</td>
                                      <td>{{ $complete->date }}</td>
                                      <td>{{ $complete->status }}</td>
                                    </tr>

                                  @empty
                                      <tr><td>No Bookings Yet!!</td></tr>
                                  @endforelse
                                  </tbody>
                              </table>
                                {{ $getCompleteBooking->links() }}
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

<!-- body end -->






{{--modal begin--}}
@foreach($getAllBooking as $book)
    @if($book->status == 'payment')
        <div class="modal fade" id="myModal{{ $book->id }}" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="padding-left: 3%;">Make Payment</h4>
                    </div>
                    <div class="modal-body" style="padding: 3%">
                        {{--payment info--}}
                        <h2>Give Payment Information</h2>
                        <form method="post" action="{{ URL::current() }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="booking_id" value="{{ $book->id }}">
                            <input type="text" name="transaction" placeholder="Transaction Id"><br><br>
                            <input class="btn btn-success" type="submit" name="submit" value="submit">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    @endif
@endforeach
{{--modal end--}}

@endsection