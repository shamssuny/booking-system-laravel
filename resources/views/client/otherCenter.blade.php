<div class="center-detail col-md-7" style="border:1px solid blue;">

    <h2>{{ $getTheCenter->center_name }}</h2>
    <img src="/uploads/{{ $getTheCenter->picture }}" alt="" height="100px" width="300px">
    <p>Capacity :: {{ $getTheCenter->capacity }}</p>
    <p>Price Range: {{ $getTheCenter->price_range }}</p>
    <p>Center  Details: {{ $getTheCenter->center_details }}</p>
    <p>Facilities: {{ $getTheCenter->facilities }}</p>
    <p>City : {{ $getTheCenter->city }}, {{ $getTheCenter->sub_city }}</p>
    <p>Full Address: {{ $getTheCenter->full_address }}</p>

</div>