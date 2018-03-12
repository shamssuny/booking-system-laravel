@extends('master.template')

@section('title','Bookings | Client | Ayojon')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/clientbooking.css') }}">
@endpush

@section('rightNavContent')
    <li><a href="{{ url('/client/profile') }}">Update Profile</a></li>
    <li><a href="{{ url('client/bookings') }}">Bookings</a></li>
    <li><a href="/client/center">Your Center</a></li>
@endsection


@section('content')

<!-- body content  start -->
<main>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12  col-lg-12  col-sm-12 col-xs-12">
          <div class="modal-content" style="margin-top: 3%;margin-bottom: 3%;">
            <div class="modal-header text-center">
               
                <h4 class="modal-title" id="myModalLabel" style="display: inline;" >
                    Booking Statistics </h4>
                <a name="" class="btn btn-light pull-right" data-toggle="modal" data-target="#myModal">Add your Local Booking</a>
            </div>
            <div class="modal-body" >
                <div class="row">
                    <div class="col-md-12" >
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs bold">
                            <li class="active width50 text-center red"><a href="#Login"  class="black" data-toggle="tab">Upcoming Bookings</a></li>
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
                                    </tr>
                                  </thead>
                                  <tbody>

                                  @forelse($getBookedDates as $book)
                                    <tr>
                                      <td>
                                          @if($book->user_id == 0)
                                              Your Booking
                                          @else
                                              {{ \App\User::find($book->user_id)->username }}
                                          @endif
                                      </td>
                                      <td>{{ $book->date }}</td>
                                      <td>{{ $book->book_details }}</td>

                                    </tr>
                                  @empty
                                      <tr><td>No Bookings Yet</td></tr>
                                  @endforelse
                                  </tbody>
                              </table>
                                {{ $getBookedDates->links() }}
                            </div>
                            <div class="tab-pane fade" id="Registration">
                                <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      
                                      <th scope="col">Name</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Date</th>

                                    </tr>
                                  </thead>
                                  <tbody>
                                  @forelse($getCompleteDates as $book)
                                    <tr>
                                      <td>
                                          @if($book->user_id == 0)
                                              Your Booking
                                          @else
                                              {{ \App\User::find($book->user_id)->username }}
                                          @endif
                                      </td>
                                      <td>{{ $book->date }}</td>
                                      <td>{{ $book->book_details }}</td>

                                    </tr>
                                  @empty
                                      <tr><td>No Complete Events</td></tr>
                                  @endforelse
                                  </tbody>
                              </table>
                                {{ $getCompleteDates->links() }}
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





{{--add a booking by client modal--}}
{{--modal begins--}}

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="margin-left: 3%;" class="modal-title">Add Your Local Booking</h4>
            </div>
            <div class="modal-body" style="margin-left: 3%;">

                <form class="form-group form-inline" action="{{ URL::current() }}" method="post">
                    {{ csrf_field() }}
                    <input class="form-control" type="text" name="date" id="datepicker" placeholder="Select Your Date"><br><br>
                    <textarea class="form-control" name="book_details" placeholder="Details About Booking"></textarea><br><br>
                    <input type="submit" class="btn btn-success btn-sm" name="submit" value="Add Local Booking">
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

{{--modal ends--}}

<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>

@endsection