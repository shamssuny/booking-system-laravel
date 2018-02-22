<h2>Admin Dashboard</h2>

<div class="client">
    <h3>Client Section</h3>
    <a href="{{ url('/auth/admin/client-verify') }}">Client Verification</a>
    <a href="{{ URL::current() }}/client-manager">Manage Clients</a>
</div>

<div class="user">
    <h3>User section</h3>
    <a href="{{ URL::current() }}/booking">Booking Manager</a>
    <a href="{{ URL::current() }}/user-manager">User Manage</a>
</div>

<div class="support">
    <h3>Support Center</h3>
    <a href="{{ URL::current() }}/support">Support Center</a>
</div>