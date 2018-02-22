@include('errors.error')
<form method="post" action="{{ URL::current() }}">
    {{ csrf_field() }}
    <input type="text" name="username" placeholder="username"><br>
    <input type="password" name="password" placeholder="password"><br>
    <input type="submit" name="submit" value="Login">
</form>