@extends('master.template')

@section('title','Admin | Ayojon')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-user-manager.css') }}">
@endpush


@section('content')
<!-- body content  start -->
<main>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12  col-lg-12  col-sm-12 col-xs-12">
          <div class="modal-content">
            <div class="modal-header text-center">
               
                <h4 class="modal-title" id="myModalLabel" >
                    User Manager </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" >
                        <!-- Nav tabs -->
                        @if(session('deleteSuccess'))
                            <p class="alert alert-danger">{{ session('deleteSuccess') }}</p>
                        @endif
                        <form class="form-group form-inline text-center" method="GET" action="{{ url('auth/admin/user-manager/search') }}">

                            <input class="form-control" type="text" name="search" placeholder="Input User Name">
                            <input class="btn btn-danger" type="submit" name="submit" value="Search">
                        </form>
                        <!-- Tab panes -->
                        <div class="tab-content" style="padding-right: 30px;">

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

                                  @if(isset($getSearchUsers))
                                      @forelse($getSearchUsers as $client)
                                    <tr>
                                      <td>{{ $client->username }}</td>
                                      <td>{{ $client->email }}</td>
                                      <td>{{ $client->phone }}</td>
                                      <td>
                                          <a href="{{ URL::current() }}/delete/{{ $client->id }}" onclick="return confirm('Delete User ?');">Delete</a>
                                      </td>
                                    </tr>
                                      @empty
                                          No Clients!
                                      @endforelse
                                      <div class="text-center">{{ $getSearchUsers->appends(request()->input())->links() }}</div>
                                  @else
                                      @forelse($getUsers as $client)

                                          <tr>
                                            <td>{{ $client->username }}</td>
                                            <td>{{ $client->email }}</td>
                                            <td>{{ $client->phone }}</td>
                                            <td>
                                                <a href="{{ URL::current() }}/delete/{{ $client->id }}" onclick="return confirm('Delete User ?');">Delete</a>
                                            </td>
                                        </tr>

                                      @empty
                                          No Users!
                                      @endforelse
                                      <div class="text-center">{{ $getUsers->links() }}</div>
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