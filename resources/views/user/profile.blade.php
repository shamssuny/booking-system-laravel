@include('errors.error')
@if(session('updateSuccess'))
    {{ session('updateSuccess') }}
@endif
<form method="post" action="{{ URL::current() }}">
    {{ csrf_field() }}
    <input type="email" name="email" value="{{ $user->email }}" placeholder="Your Email"><br>

    <input type="password" name="password" placeholder="New Password"><br>
    <input type="password" name="password_confirmation" placeholder="Confirm Password"><br>
    <input type="submit" name="submit" value="Update" class="btn btn-primary btn-sm">
</form>