@extends('master.template')

@section('title','Admin | Ayojon')

@push('css')
 <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-client-confirm.css') }}">
@endpush

@section('content')
<!-- body content  start -->
<main>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12  col-lg-12  col-sm-12 col-xs-12" style="padding-top: 3%;padding-bottom: 3%;">
          <div class="modal-content">
            <div class="modal-header text-center">
               
                <h4 class="modal-title" id="myModalLabel" class="" >
                     Client Verification </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" >
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs bold">
                            <li class="active width50 text-center red"><a href="#Login"  class="black" data-toggle="tab">Pending Clients</a></li>
                            <li class="width50 text-center red"><a href="#Registration" class="black" data-toggle="tab">Active Clients</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content" style="padding-right: 30px;">
                            <div class="tab-pane fade in active" id="Login">
                                <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      
                                      <th scope="col">User Name</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Phone</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @forelse($inactive as $in)
                                    <tr>
                                      <td>{{ $in->username }}</td>
                                      <td>{{ $in->email }}</td>
                                      <td>{{ $in->phone }}</td>
                                      <td>
                                          <a class="btn btn-warning btn-sm" href="{{ URL::current() }}/active/{{ $in->id }}">Active</a>
                                          <a class="btn btn-default btn-sm" href="{{ URL::current() }}/{{ $in->id }}/show">Show Center</a>
                                      </td>
                                    </tr>
                                  @empty
                                      No Inactive Client Available :(
                                  @endforelse

                                  </tbody>
                              </table>
                                <div class="text-center">
                                    {{ $inactive->links() }}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Registration">
                                <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      
                                      <th scope="col">Username</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Phone</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                  @forelse($active as $in)
                                    <tr>
                                        <td>{{ $in->username }}</td>
                                        <td>{{ $in->email }}</td>
                                        <td>{{ $in->phone }}</td>
                                      <td>
                                          <a class="btn btn-warning btn-sm" href="{{ URL::current() }}/inactive/{{ $in->id }}">Inactive</a>
                                          <a class="btn btn-default btn-sm" href="{{ URL::current() }}/{{ $in->id }}/show">Show Center</a>
                                      </td>
                                    </tr>
                                  @empty
                                      No Active Client Available :(
                                  @endforelse

                                  </tbody>
                              </table>
                                <div class="text-center">
                                    {{ $active->links() }}
                                </div>
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