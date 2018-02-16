@extends('master.template')

@section('content')
    <div class="main col-md-10 col-md-offset-1">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#booking">Booking Status</a></li>
            <li><a data-toggle="tab" href="#complete">Completed Bookings</a></li>
        </ul>

        <div class="tab-content">

            <div id="booking" class="tab-pane fade in active">
                @forelse($getAllBooking as $bookings)
                    <div class="col-md-12">
                        <div class="col-md-3">
                            {{ \App\Center::where('client_id',$bookings->client_id)->first()->center_name }}
                        </div>

                        <div class="col-md-3">
                            {{ $bookings->book_details }}
                        </div>

                        <div class="col-md-3">
                            {{ $bookings->date }}
                        </div>

                        <div class="col-md-3">
                            @if($bookings->status == 'payment')
                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal{{ $bookings->id }}" href="">Make Payment</a>
                            @else
                            {{ $bookings->status }}
                            @endif
                        </div>
                    </div>
                @empty
                    <p>No Bookings Yet!!</p>
                @endforelse
            </div>

            <div id="complete" class="tab-pane fade">
                @forelse($getCompleteBooking as $complete)
                    <div class="col-md-12">
                        <div class="col-md-3">
                            {{ \App\Center::where('client_id',$complete->client_id)->first()->center_name }}
                        </div>

                        <div class="col-md-3">
                            {{ $complete->book_details }}
                        </div>

                        <div class="col-md-3">
                            {{ $complete->date }}
                        </div>

                        <div class="col-md-3">
                            {{ $complete->status }}
                        </div>
                    </div>
                @empty
                    no complete events
                @endforelse
            </div>

        </div>


    </div>




    {{--modal begin--}}
    @foreach($getAllBooking as $book)
    @if($book->status == 'payment')
    <div class="modal fade" id="myModal{{ $book->id }}" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Make Payment</h4>
                </div>
                <div class="modal-body">
                    {{--payment info--}}
                    <h2>Give Payment Information</h2>
                    <form method="post" action="{{ URL::current() }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="booking_id" value="{{ $book->id }}">
                        <input type="text" name="transaction" placeholder="Transaction Id"><br>
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