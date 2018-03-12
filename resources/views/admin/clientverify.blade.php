@extends('master.template')

@section('content')
<h2>Client Verification</h2>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#inactiveclient">Pending Clients</a></li>
    <li><a data-toggle="tab" href="#activeclient">Active Clients</a></li>
</ul>

<div class="tab-content">
    <div id="inactiveclient" class="tab-pane fade in active">

        @forelse($inactive as $in)
            <div style="border-bottom: 2px solid blueviolet" class="col-md-12">
                <div class="col-md-3">
                    {{ $in->username }}
                </div>

                <div class="col-md-3">
                    {{ $in->email }}
                </div>

                <div class="col-md-3">
                    {{ $in->phone }}
                </div>

                <div class="col-md-3">
                    <a class="btn btn-warning btn-sm" href="{{ URL::current() }}/active/{{ $in->id }}">Active</a>
                </div>
            </div>
        @empty
            No Inactive Client Available :(
        @endforelse

        {{ $inactive->links() }}

    </div>

    <div class="tab-pane fade" id="activeclient">

        @forelse($active as $in)
            <div style="border-bottom: 2px solid blueviolet" class="col-md-12">
                <div class="col-md-3">
                    {{ $in->username }}
                </div>

                <div class="col-md-3">
                    {{ $in->email }}
                </div>

                <div class="col-md-3">
                    {{ $in->phone }}
                </div>

                <div class="col-md-3">
                    <a class="btn btn-warning btn-sm" href="{{ URL::current() }}/inactive/{{ $in->id }}">Inactive</a>
                </div>
            </div>
        @empty
            No Active Client Available :(
        @endforelse

            {{ $active->links() }}

    </div>
</div>
    @endsection