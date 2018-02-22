<h2>Support Center</h2>

@if(session('requestSuccess'))
    {{ session('requestSuccess') }}
@endif
<form method="post" action="{{ URL::current() }}">
    {{ csrf_field() }}
    <input type="text" name="username" placeholder="Your User Name"><br>
    <select name="user_type">
        <option value="client">Center Owner</option>
        <option value="user">Customer</option>
    </select>
    <br>
    <input type="email" name="email" placeholder="Your Email"><br>
    <input type="text" name="subject" placeholder="Request Subject"><br>
    <textarea name="details" placeholder="Request Details"></textarea><br>
    <input type="submit" name="submit" value="Submit Request">
</form>