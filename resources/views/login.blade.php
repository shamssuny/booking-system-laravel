@if(session('regsuccess'))
    {{ session('regsuccess') }}
@endif

@if(session('loginError'))
    {{ session('loginError') }}
@endif
<form action="/login" method="POST">
    {{ csrf_field() }}
    <input type="text" name="username"><br>
    <input type="password" name="password"><br>
    <input type="radio" name="u_type" value="user"> User
    <input type="radio" name="u_type" value="client"> Client<br>
    <input type="submit" name="submit" value="submit">
</form>