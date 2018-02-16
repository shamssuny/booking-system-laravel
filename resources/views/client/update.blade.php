@include('errors.error')

@if(session('updateSuccess'))
    {{ session('updateSuccess') }}
@endif
<form method="post" action="{{ URL::current() }}">
    <h2>Update Your Data</h2>
    {{ csrf_field() }}
    <input type="email" name="email" placeholder="Your Email" value="{{ $getClientData->email }}"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="password" name="password_confirmation" placeholder="Confirm Password">
    <br>
    <input type="submit" name="submit" value="Update" class="btn btn-warning btn-sm">

</form>