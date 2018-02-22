@extends('master.template')

@section('content')

    <div class="main col-md-12">
        <h3>Support Center</h3>

        @forelse($getSupport as $support)
            <div class="col-md-12" style="border-bottom: 2px solid coral">

                <div class="col-md-3">
                    <p>Username: {{ $support->username }}</p>
                    <p>User Type: {{ $support->user_type }}</p>
                </div>

                <div class="col-md-3">
                    <p>{{ $support->email }}</p>
                </div>

                <div class="col-md-3">
                    <p>Subject: {{ $support->subject }}</p>
                    <p>Details: {{ $support->details }}</p>
                </div>

                <div class="col-md-3">
                    @php
                        $stat = array('pending','active','clear');
                    @endphp

                    <form action="{{ URL::current() }}/{{ $support->id }}" method="post">

                        {{ csrf_field() }}
                        <select name="status">
                            @foreach($stat as $status)
                                @if($status == $support->status)
                                    <option value="{{ $support->status }}" selected >{{ $support->status }}</option>
                                @else
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endif

                            @endforeach
                        </select>

                        <input type="submit" name="submit" value="Update Stauts">

                    </form>

                </div>

            </div>
        @empty
        @endforelse

    </div>


@endsection


