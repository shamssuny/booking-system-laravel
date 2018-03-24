@extends('master.template')

@section('title','Admin | Ayojon')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-client-manager.css') }}">
@endpush


@section('content')
<!-- body content  start -->
<main>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12  col-lg-12  col-sm-12 col-xs-12" style="margin-top: 3%;margin-bottom: 3%;">
          <div class="modal-content">
            <div class="modal-header text-center">
               
                <h4 class="modal-title" id="myModalLabel" class="" >
                    Client Manager </h4>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" >
                        <!-- Nav tabs -->
                        @if(session('deleteSuccess'))
                            <p class="alert alert-danger">{{ session('deleteSuccess') }}</p>
                        @endif
                        <form class="form-group form-inline text-center" method="GET" action="{{ url('auth/admin/client-manager/search') }}">

                            <input class="form-control" type="text" name="search" placeholder="Input Client Username">
                            <input class="btn btn-danger" type="submit" name="submit" value="Search">
                        </form>
                        <!-- Tab panes -->
                        <div class="tab-content" style="padding-right: 30px;">

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


                                  @if(isset($getSearchClient))
                                      @forelse($getSearchClient as $client)

                                          <tr>

                                              <td>{{ $client->username }}</td>
                                              <td>{{ $client->email }}</td>
                                              <td>{{ $client->phone }}</td>
                                              <td>
                                                  <a href="{{ URL::current() }}/delete/{{ $client->id }}" onclick="return confirm('Delete Client ?');">Delete</a>
                                              </td>

                                          </tr>

                                      @empty
                                          No Clients!
                                      @endforelse
                                      <div class="text-center">
                                          {{ $getSearchClient->appends(request()->input())->links() }}
                                      </div>
                                  @else
                                      @forelse($getAllClient as $client)

                                          <tr>

                                              <td>{{ $client->username }}</td>
                                              <td>{{ $client->email }}</td>
                                              <td>{{ $client->phone }}</td>
                                              <td>
                                                  <a href="{{ URL::current() }}/delete/{{ $client->id }}" onclick="return confirm('Delete Client ?');">Delete</a>

                                              </td>

                                          </tr>

                                      @empty
                                          No Clients!
                                      @endforelse
                                      <div class="text-center">
                                          {{ $getAllClient->links() }}
                                      </div>
                                  @endif




                                  </tbody>
                              </table>



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