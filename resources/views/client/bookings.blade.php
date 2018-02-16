@extends('master.template')

@section('content')

    <div class="main col-md-12">

        {{--add a booking by client--}}
        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" href="">Add Your Local Bookings</a>

        <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#upcoming">Upcomming Events</a></li>
                <li><a data-toggle="tab" href="#completed">Completed Events</a></li>
        </ul>

        <div class="tab-content">
            <div id="upcoming" class="tab-pane fade in active">
                @forelse($getBookedDates as $book)
                    <div class="col-md-12">
                        <div class="col-md-4">
                            @if($book->user_id == 0)
                                Your Booking
                            @else
                                {{ \App\User::find($book->user_id)->username }}
                            @endif

                        </div>

                        <div class="col-md-4">
                            {{ $book->date }}
                        </div>

                        <div class="col-md-4">
                            {{ $book->book_details }}
                        </div>

                    </div>
                @empty
                    No Bookings Yet
                @endforelse

            </div>

            <div id="completed" class="tab-pane fade">
                @forelse($getCompleteDates as $book)
                    <div class="col-md-12">
                        <div class="col-md-4">
                            {{ \App\User::find($book->user_id)->username }}
                        </div>

                        <div class="col-md-4">
                            {{ $book->date }}
                        </div>

                        <div class="col-md-4">
                            {{ $book->book_details }}
                        </div>

                    </div>
                @empty
                    No Complete Events
                @endforelse
            </div>
        </div>

    </div>





    {{--add a booking by client modal--}}
    {{--modal begins--}}

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Your Local Booking</h4>
                </div>
                <div class="modal-body">

                    <form action="{{ URL::current() }}" method="post">
                        {{ csrf_field() }}
                        <input type="text" name="date" id="datepicker"><br>
                        <textarea name="book_details"></textarea><br><br>
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