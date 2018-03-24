@extends('master.template')

@section('title','Admin | Ayojon')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bookingmanager.css') }}">
@endpush

@section('content')
<!-- body content  start -->
<main>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12  col-lg-12  col-sm-12 col-xs-12">
          <div class="modal-content">
            <div class="jumbotron jumbotron-sm">
    <div class="container-fluid">
        <div class="row">
            @if(session()->has('actionSuccess'))
                <p class="alert alert-success text-center">{{ session('actionSuccess') }}</p>
            @endif
            <div class="col-sm-12 col-lg-12 text-center">
                <h1 class="h1">
                    Booking  <small>Manager</small></h1>
            </div>
        </div>
    </div>
</div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" >
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs bold">
                            <li class="active width20 text-center red"><a href="#Login"  class="black" data-toggle="tab">Pending</a></li>
                            <li class="width20 text-center red"><a href="#Registration" class="black" data-toggle="tab">Payment</a></li>
                            <li class="width20 text-center red"><a href="#PaymentVarify" class="black" data-toggle="tab">Payment Varify</a></li>
                            <li class="width20 text-center red"><a href="#Booked" class="black" data-toggle="tab">Booked</a></li>
                            <li class="width20 text-center red"><a href="#Complete" class="black" data-toggle="tab">Complete</a></li>
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

                                  @forelse($getPendings as $pending)
                                    <tr>
                                      
                                      <td>
                                        <p>User: <span class="bold">{{ App\User::find($pending->user_id)->username }}</span></p>
                                        <p>Email: <span class="bold">{{ App\User::find($pending->user_id)->email }}</span></p>
                                        <p>Phone: <span class="bold">{{ App\User::find($pending->user_id)->phone }}</span></p>
                                        <hr>
                                        <p>Center: <span class="bold">{{ App\Center::find($pending->client_id)->center_name }}</span></p>
                                        <p>Email: <span class="bold">{{ App\Client::find($pending->client_id)->email }}</span></p>
                                        <p>Phone: <span class="bold">{{ App\Client::find($pending->client_id)->phone }}</span></p>
                                      </td>
                                      <td>{{ $pending->book_details }}</td>
                                      <td>{{ $pending->date }}</td>
                                      <td class="pending">
                                          <form method="post" action="{{ url('auth/admin/booking') }}/{{ $pending->id }}">
                                              {{ csrf_field() }}
                                        <div class="col-md-6 col-sm-6 col-xs-12 zero sec">
        <select name="status" class="form-control">
            <option value="">-----</option>
            <option value="pending">Pending</option>
            <option value="payment">Payment</option>
            <option value="payment checking">Payment Check</option>
            <option value="booked">Booked</option>
            <option value="complete">Complete</option>
            <option value="delete">Delete</option>
        </select>
    </div>

           
    <div class="col-md-3 col-sm-6 col-xs-12" style="padding-left: 10%;">
    <input type="submit" value="Save" class="btn btn-search full-width" name="submit">
    </div>
                                          </form>



                                      </td>
                                    </tr>
                                  @empty
                                      No Pending Request :(
                                  @endforelse


                                  </tbody>
                              </table>
                                {{ $getPendings->links()}}
                            </div>
                            <div class="tab-pane" id="Registration">
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
                                  @forelse($getPaymentPendings as $pending)
                                    <tr>
                                      
                                      <td>
                                        <p>User: <span class="bold">{{ App\User::find($pending->user_id)->username }}</span></p>
                                        <p>Email: <span class="bold">{{ App\User::find($pending->user_id)->email }}</span></p>
                                        <p>Phone: <span class="bold">{{ App\User::find($pending->user_id)->phone }}</span></p>
                                        <hr>
                                        <p>Center: <span class="bold">{{ App\Center::find($pending->client_id)->center_name }}</span></p>
                                        <p>Email: <span class="bold">{{ App\Client::find($pending->client_id)->email }}</span></p>
                                        <p>Phone: <span class="bold">{{ App\Client::find($pending->client_id)->phone }}</span></p>
                                      </td>
                                      <td>{{ $pending->book_details }}</td>
                                      <td>{{ $pending->date }}</td>
                                      <td class="pending">
                                          <form method="post" action="{{ url('auth/admin/booking') }}/{{ $pending->id }}">
                                              {{ csrf_field() }}
                                        <div class="col-md-6 col-sm-6 col-xs-12 zero sec">
        <select class="form-control" name="status">
            <option value="">-----</option>
            <option value="pending">Pending</option>
            <option value="payment">Payment</option>
            <option value="payment checking">Payment Check</option>
            <option value="booked">Booked</option>
            <option value="complete">Complete</option>
            <option value="delete">Delete</option>
        </select>
    </div>

           
    <div class="col-md-3 col-sm-6 col-xs-12" style="padding-left: 10%;">
    <input type="submit" value="Save" class="btn btn-search full-width" name="">
    </div>
                                          </form>


                                      </td>
                                    </tr>
                                  @empty
                                      No Payment Requests :(
                                  @endforelse


                                  </tbody>
                              </table>
                                {{ $getPaymentPendings->links() }}
                            </div>
                            <div class="tab-pane fade" id="PaymentVarify">
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
                                  @forelse($getPaidCode as $pending)
                                    <tr>

                                        <td>
                                            <p>User: <span class="bold">{{ App\User::find($pending->user_id)->username }}</span></p>
                                            <p>Email: <span class="bold">{{ App\User::find($pending->user_id)->email }}</span></p>
                                            <p>Phone: <span class="bold">{{ App\User::find($pending->user_id)->phone }}</span></p>
                                            <hr>
                                            <p>Center: <span class="bold">{{ App\Center::find($pending->client_id)->center_name }}</span></p>
                                            <p>Email: <span class="bold">{{ App\Client::find($pending->client_id)->email }}</span></p>
                                            <p>Phone: <span class="bold">{{ App\Client::find($pending->client_id)->phone }}</span></p>
                                        </td>
                                        <td>{{ $pending->book_details }}</td>
                                        <td>
                                            {{ $pending->date }}
                                            <p>Code: {{ App\Payment::where('booking_id',$pending->id)->first()->transaction }}</p>
                                        </td>
                                      <td class="pending">
                                          <form method="post" action="{{ url('auth/admin/booking') }}/{{ $pending->id }}">
                                              {{ csrf_field() }}
                                          <div class="col-md-6 col-sm-6 col-xs-12 zero sec">
                                              <select class="form-control" name="status">
                                                  <option value="">-----</option>
                                                  <option value="pending">Pending</option>
                                                  <option value="payment">Payment</option>
                                                  <option value="payment checking">Payment Check</option>
                                                  <option value="booked">Booked</option>
                                                  <option value="complete">Complete</option>
                                                  <option value="delete">Delete</option>
                                              </select>
                                          </div>


                                          <div class="col-md-3 col-sm-6 col-xs-12" style="padding-left: 10%;">
                                              <input type="submit" value="Save" class="btn btn-search full-width" name="submit">
                                          </div>
                                          </form>
                                      </td>
                                    </tr>
                                  @empty
                                      No Paid Code Requests :(
                                  @endforelse

                                  </tbody>
                              </table>
                                {{ $getPaidCode->links() }}
                            </div>
                            <div class="tab-pane fade" id="Booked">
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

                                  @forelse($getBooked as $pending)
                                    <tr>
                                      
                                      <td>
                                          @if($pending->user_id == 0)
                                              <p style="border-bottom:2px solid green;">Own Booking</p>
                                          @else
                                        <p>User: <span class="bold">{{ App\User::find($pending->user_id)->username }}</span></p>
                                        <p>Email: <span class="bold">{{ App\User::find($pending->user_id)->email }}</span></p>
                                        <p>Phone: <span class="bold">{{ App\User::find($pending->user_id)->phone }}</span></p>
                                          @endif
                                        <hr>
                                        <p>Center: <span class="bold">{{ App\Center::find($pending->client_id)->center_name }}</span></p>
                                        <p>Email: <span class="bold">{{ App\Client::find($pending->client_id)->email }}</span></p>
                                        <p>Phone: <span class="bold">{{ App\Client::find($pending->client_id)->phone }}</span></p>
                                      </td>
                                      <td>{{ $pending->book_details }}</td>
                                      <td>{{ $pending->date }}</td>
                                      <td class="pending">
                                          <form method="post" action="{{ url('auth/admin/booking') }}/{{ $pending->id }}">
                                              {{ csrf_field() }}
                                              <div class="col-md-6 col-sm-6 col-xs-12 zero sec">
                                                  <select class="form-control" name="status">
                                                      <option value="">-----</option>
                                                      <option value="pending">Pending</option>
                                                      <option value="payment">Payment</option>
                                                      <option value="payment checking">Payment Check</option>
                                                      <option value="booked">Booked</option>
                                                      <option value="complete">Complete</option>
                                                      <option value="delete">Delete</option>
                                                  </select>
                                              </div>


                                              <div class="col-md-3 col-sm-6 col-xs-12" style="padding-left: 10%;">
                                                  <input type="submit" value="Save" class="btn btn-search full-width" name="submit">
                                              </div>
                                          </form>
                                      </td>
                                    </tr>
                                  @empty
                                      No Booked Requests :(
                                  @endforelse

                                  </tbody>
                              </table>
                                {{ $getBooked->links() }}
                            </div>
                           <div class="tab-pane fade" id="Complete">
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
                                  @forelse($getComplete as $pending)
                                      <tr>

                                          <td>
                                              @if($pending->user_id == 0)
                                                  <p style="border-bottom:2px solid green;">Own Booking</p>
                                              @else
                                                  <p>User: <span class="bold">{{ App\User::find($pending->user_id)->username }}</span></p>
                                                  <p>Email: <span class="bold">{{ App\User::find($pending->user_id)->email }}</span></p>
                                                  <p>Phone: <span class="bold">{{ App\User::find($pending->user_id)->phone }}</span></p>
                                              @endif
                                              <hr>
                                              <p>Center: <span class="bold">{{ App\Center::find($pending->client_id)->center_name }}</span></p>
                                              <p>Email: <span class="bold">{{ App\Client::find($pending->client_id)->email }}</span></p>
                                              <p>Phone: <span class="bold">{{ App\Client::find($pending->client_id)->phone }}</span></p>
                                          </td>
                                          <td>{{ $pending->book_details }}</td>
                                          <td>{{ $pending->date }}</td>
                                          <td class="pending">
                                              <form method="post" action="{{ url('auth/admin/booking') }}/{{ $pending->id }}">
                                                  {{ csrf_field() }}
                                                  <div class="col-md-6 col-sm-6 col-xs-12 zero sec">
                                                      <select class="form-control" name="status">
                                                          <option value="">-----</option>
                                                          <option value="pending">Pending</option>
                                                          <option value="payment">Payment</option>
                                                          <option value="payment checking">Payment Check</option>
                                                          <option value="booked">Booked</option>
                                                          <option value="complete">Complete</option>
                                                          <option value="delete">Delete</option>
                                                      </select>
                                                  </div>


                                                  <div class="col-md-3 col-sm-6 col-xs-12" style="padding-left: 10%;">
                                                      <input type="submit" value="Save" class="btn btn-search full-width" name="submit">
                                                  </div>
                                              </form>
                                          </td>
                                      </tr>
                                  @empty
                                      No Booked Requests :(
                                  @endforelse

                                  </tbody>
                              </table>
                               {{ $getComplete->links() }}
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
@endsection