<h2>Active Your Account First</h2>

@if(session('codeError'))
    {{ session('codeError') }}
@endif
<form action="/user/active" method="POST">
    {{ csrf_field() }}
    <input type="text" name="active_code" placeholder="Enter Your Code"><br>
    <input type="submit" name="submit" value="submit">
</form>

<a href="/user/active/resend">Resend Code</a>