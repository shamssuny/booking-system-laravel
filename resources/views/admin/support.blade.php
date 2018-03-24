@extends('master.template')

@section('title','Admin | Ayojon')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/supportcenter.css') }}">
@endpush

@section('content')
<!-- body content  start -->
<main>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12  col-lg-12  col-sm-12 col-xs-12" style="margin-top: 3%;margin-bottom: 3%;">
          <div class="modal-content">
            <div class="jumbotron jumbotron-sm">
              <div class="container-fluid">
                  <div class="row">
                      @if(session('updated'))
                            <p class="alert alert-danger text-center">{{ session('updated') }}</p>
                      @endif
                      <div class="col-sm-12 col-lg-12 text-center">
                          <h1 class="h1">
                              Support  <small>Center</small></h1>
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" >
                        <!-- Nav tabs -->
                        
                        <!-- Tab panes -->
                        <div class="tab-content" style="padding-right: 30px;">
                            
                                <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      
                                      <th scope="col">Credentials</th>
                                      <th scope="col">Email</th>
                                      <th scope="col">Details</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                  @forelse($getSupport as $support)
                                    <tr>
                                      
                                      <td>
                                        <p>Username: <span class="bold">{{ $support->username }}</span></p>
                                        <p>User Type: <span class="bold">{{ $support->user_type }}</span></p>
                                        
                                       
                                      </td>
                                      <td>{{ $support->email }}</td>
                                      <td>
                                        <p>Subject: <span class="bold">{{ $support->subject }}</span></p>
                                        <p>Details: <span class="bold">{{ $support->details }}</span></p>
                                        
                                       
                                      </td>
                                      <td class="pending">
                                          @php
                                              $stat = array('pending','active','clear');
                                          @endphp
                                          <form action="{{ URL::current() }}/{{ $support->id }}" method="post">
                                              {{ csrf_field() }}
                                        <div class="col-md-6 col-sm-6 col-xs-12 zero sec">

                                            <select name="status" class="form-control">
                                                @foreach($stat as $status)
                                                    @if($status == $support->status)
                                                        <option value="{{ $support->status }}" selected >{{ $support->status }}</option>
                                                    @else
                                                        <option value="{{ $status }}">{{ $status }}</option>
                                                    @endif

                                                @endforeach
                                            </select>
                                        </div>

           
    <div class="col-md-3 col-sm-6 col-xs-12" style="padding-left: 10%;">
        <input type="submit" value="Update Status" class="btn btn-search full-width" name="">
    </div>
                                          </form>



                                      </td>
                                    </tr>
                                    
                                    
                                  </tbody>

                                    @empty
                                        <p>No Query!</p>
                                    @endforelse
                                    {{ $getSupport->links() }}
                              </table>

                            
                            <div class="text-center">

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