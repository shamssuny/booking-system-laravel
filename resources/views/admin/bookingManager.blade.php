@extends('master.template')

@section('content')

<h2>Booking Manager</h2>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#pending">Pending</a></li>
    <li><a data-toggle="tab" href="#payment">Payment</a></li>
    <li><a data-toggle="tab" href="#paymentCheck">Payment Verify</a></li>
    <li><a data-toggle="tab" href="#booked">Booked</a></li>
    <li><a data-toggle="tab" href="#complete">Complete</a></li>
</ul>


<div class="tab-content">

    <div id="pending" class="tab-pane fade in active">

        @forelse($getPendings as $pending)
            <div class="col-md-12" style="border-bottom: 2px solid black">

                <div class="col-md-3">
                    <p>User: {{ App\User::find($pending->user_id)->username }}</p>
                    <p>email: {{ App\User::find($pending->user_id)->email }}</p>
                    <p style="border-bottom:2px solid green;">phone: {{ App\User::find($pending->user_id)->phone }}</p>
                    <p>Center: {{ App\Center::find($pending->client_id)->center_name }}</p>
                    <p>email: {{ App\Client::find($pending->client_id)->email }}</p>
                    <p>phone: {{ App\Client::find($pending->client_id)->phone }}</p>
                </div>

                <div class="col-md-3">
                    <p>{{ $pending->book_details }}</p>
                </div>

                <div class="col-md-3">
                    <p>{{ $pending->date }}</p>
                </div>

                <div class="col-md-3">
                    <form method="post" action="{{ URL::current() }}/{{ $pending->id }}">
                        {{ csrf_field() }}
                        <select name="status">
                            <option value="">-----</option>
                            <option value="pending">Pending</option>
                            <option value="payment">Payment</option>
                            <option value="payment checking">Payment Check</option>
                            <option value="booked">Booked</option>
                            <option value="complete">Complete</option>
                            <option value="delete">Delete</option>
                        </select>

                        <input type="submit" name="submit" value="Save">
                    </form>
                </div>

            </div>
        @empty
            No Pending Request :(
        @endforelse
        {{ $getPendings->links()}}
    </div>

    <div id="payment" class="tab-pane fade">
        @forelse($getPaymentPendings as $pending)
            <div class="col-md-12" style="border-bottom: 2px solid black">

                <div class="col-md-3">
                    <p>User: {{ App\User::find($pending->user_id)->username }}</p>
                    <p>email: {{ App\User::find($pending->user_id)->email }}</p>
                    <p style="border-bottom:2px solid green;">phone: {{ App\User::find($pending->user_id)->phone }}</p>
                    <p>Center: {{ App\Center::find($pending->client_id)->center_name }}</p>
                    <p>email: {{ App\Client::find($pending->client_id)->email }}</p>
                    <p>phone: {{ App\Client::find($pending->client_id)->phone }}</p>
                </div>

                <div class="col-md-3">
                    <p>{{ $pending->book_details }}</p>
                </div>

                <div class="col-md-3">
                    <p>{{ $pending->date }}</p>
                </div>

                <div class="col-md-3">
                    <form method="post" action="{{ URL::current() }}/{{ $pending->id }}">
                        {{ csrf_field() }}
                        <select name="status">
                            <option value="">-----</option>
                            <option value="pending">Pending</option>
                            <option value="payment">Payment</option>
                            <option value="payment checking">Payment Check</option>
                            <option value="booked">Booked</option>
                            <option value="complete">Complete</option>
                            <option value="delete">Delete</option>
                        </select>

                        <input type="submit" name="submit" value="Save">
                    </form>
                </div>

            </div>
        @empty
            No Payment Requests :(
        @endforelse
        {{ $getPaymentPendings->links() }}
    </div>

    <div id="paymentCheck" class="tab-pane fade">
        @forelse($getPaidCode as $pending)
            <div class="col-md-12" style="border-bottom: 2px solid black">

                <div class="col-md-3">
                    <p>User: {{ App\User::find($pending->user_id)->username }}</p>
                    <p>email: {{ App\User::find($pending->user_id)->email }}</p>
                    <p style="border-bottom:2px solid green;">phone: {{ App\User::find($pending->user_id)->phone }}</p>
                    <p>Center: {{ App\Center::find($pending->client_id)->center_name }}</p>
                    <p>email: {{ App\Client::find($pending->client_id)->email }}</p>
                    <p>phone: {{ App\Client::find($pending->client_id)->phone }}</p>
                </div>

                <div class="col-md-3">
                    <p>{{ $pending->book_details }}</p>
                </div>

                <div class="col-md-3">
                    <p>{{ $pending->date }}</p>
                    <p>Code: {{ App\Payment::where('booking_id',$pending->id)->first()->transaction }}</p>
                </div>

                <div class="col-md-3">
                    <form method="post" action="{{ URL::current() }}/{{ $pending->id }}">
                        {{ csrf_field() }}
                        <select name="status">
                            <option value="">-----</option>
                            <option value="pending">Pending</option>
                            <option value="payment">Payment</option>
                            <option value="payment checking">Payment Check</option>
                            <option value="booked">Booked</option>
                            <option value="complete">Complete</option>
                            <option value="delete">Delete</option>
                        </select>

                        <input type="submit" name="submit" value="Save">
                    </form>
                </div>

            </div>
        @empty
            No Payment Check Requests :(
        @endforelse
        {{ $getPaidCode->links()}}
    </div>

    <div id="booked" class="tab-pane fade">
        @forelse($getBooked as $pending)
            <div class="col-md-12" style="border-bottom: 2px solid black">

                <div class="col-md-3">
                    @if($pending->user_id == 0)
                        <p style="border-bottom:2px solid green;">Own Booking</p>
                    @else
                        <p>User: {{ App\User::find($pending->user_id)->username }}</p>
                        <p>email: {{ App\User::find($pending->user_id)->email }}</p>
                        <p style="border-bottom:2px solid green;">phone: {{ App\User::find($pending->user_id)->phone }}</p>
                    @endif

                        <p>Center: {{ App\Center::find($pending->client_id)->center_name }}</p>
                        <p>email: {{ App\Client::find($pending->client_id)->email }}</p>
                        <p>phone: {{ App\Client::find($pending->client_id)->phone }}</p>

                </div>

                <div class="col-md-3">
                    <p>{{ $pending->book_details }}</p>
                </div>

                <div class="col-md-3">
                    <p>{{ $pending->date }}</p>
                </div>

                <div class="col-md-3">
                    <form method="post" action="{{ URL::current() }}/{{ $pending->id }}">
                        {{ csrf_field() }}
                        <select name="status">
                            <option value="">-----</option>
                            <option value="pending">Pending</option>
                            <option value="payment">Payment</option>
                            <option value="payment checking">Payment Check</option>
                            <option value="booked">Booked</option>
                            <option value="complete">Complete</option>
                            <option value="delete">Delete</option>
                        </select>

                        <input type="submit" name="submit" value="Save">
                    </form>
                </div>

            </div>
        @empty
            No Booked Requests :(
        @endforelse
        {{ $getBooked->links() }}
    </div>

    <div id="complete" class="tab-pane fade">
        @forelse($getComplete as $pending)
            <div class="col-md-12" style="border-bottom: 2px solid black">

                <div class="col-md-3">
                    @if($pending->user_id == 0)
                        <p style="border-bottom:2px solid green;">Own Booking</p>
                    @else
                        <p>User: {{ App\User::find($pending->user_id)->username }}</p>
                        <p>email: {{ App\User::find($pending->user_id)->email }}</p>
                        <p style="border-bottom:2px solid green;">phone: {{ App\User::find($pending->user_id)->phone }}</p>
                    @endif

                    <p>Center: {{ App\Center::find($pending->client_id)->center_name }}</p>
                    <p>email: {{ App\Client::find($pending->client_id)->email }}</p>
                    <p>phone: {{ App\Client::find($pending->client_id)->phone }}</p>

                </div>

                <div class="col-md-3">
                    <p>{{ $pending->book_details }}</p>
                </div>

                <div class="col-md-3">
                    <p>{{ $pending->date }}</p>
                </div>

                <div class="col-md-3">
                    <form method="post" action="{{ URL::current() }}/{{ $pending->id }}">
                        {{ csrf_field() }}
                        <select name="status">
                            <option value="">-----</option>
                            <option value="pending">Pending</option>
                            <option value="payment">Payment</option>
                            <option value="payment checking">Payment Check</option>
                            <option value="booked">Booked</option>
                            <option value="complete">Complete</option>
                            <option value="delete">Delete</option>
                        </select>

                        <input type="submit" name="submit" value="Save">
                    </form>
                </div>

            </div>
        @empty
            No Complete Requests :(
        @endforelse
        {{ $getComplete->links() }}
    </div>

</div>

@endsection