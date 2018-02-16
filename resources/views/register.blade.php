@if(session('usererror'))
    {{ session('usererror') }}
@endif

@foreach($errors->all() as $error)
    {{ $error }}<br>
@endforeach
<form action="/register" method="POST">
    {{ csrf_field() }}
    <input type="text" name="username" placeholder="username"><br>
    <input type="password" name="password" placeholder="password"><br>
    <input type="email" name="email" placeholder="email"><br>
    <input type="number" name="phone" placeholder="phone"><br>
    <input type="radio" name="u_type" value="client"> Client
    <input type="radio" name="u_type" value="user"> User<br>
    <input type="submit" name="submit" placeholder="submit">
</form>