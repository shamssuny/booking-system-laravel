@extends('master.template')

@section('content')

    <div class="main col-md-12 text-center">

        <form method="post" action="{{ URL::current() }}">
            {{ csrf_field() }}
            <input type="text" name="search" placeholder="Input Client Username">
            <input type="submit" name="submit" value="Search">
        </form>

        @if(session('deleteSuccess'))
            {{ session('deleteSuccess') }}
        @endif

        <div class="main col-md-12">


            @if(isset($getSearchClient))
                @forelse($getSearchClient as $client)
                    <div class="col-md-12" style="border-bottom: 2px solid green">

                        <div class="col-md-3">
                            {{ $client->username }}
                        </div>

                        <div class="col-md-3">
                            {{ $client->email }}
                        </div>

                        <div class="col-md-3">
                            {{ $client->phone }}
                        </div>

                        <div class="col-md-3">
                            <a href="{{ URL::current() }}/delete/{{ $client->id }}" onclick="return confirm('Delete Client ?');">Delete</a>
                        </div>

                    </div>
                @empty
                    No Clients!
                @endforelse
            @else
                @forelse($getAllClient as $client)
                    <div class="col-md-12" style="border-bottom: 2px solid green">

                        <div class="col-md-3">
                            {{ $client->username }}
                        </div>

                        <div class="col-md-3">
                            {{ $client->email }}
                        </div>

                        <div class="col-md-3">
                            {{ $client->phone }}
                        </div>

                        <div class="col-md-3">
                            <a href="{{ URL::current() }}/delete/{{ $client->id }}" onclick="return confirm('Delete Client ?');">Delete</a>
                        </div>

                    </div>
                @empty
                    No Clients!
                @endforelse
            @endif


        </div>

    </div>

@endsection