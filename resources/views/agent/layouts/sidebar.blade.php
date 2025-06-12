<div class="col-lg-3 col-md-12">
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item {{ Route::is('agent.dashboard.show') ? 'active' : '' }}">
                <a href="{{ route('agent.dashboard.show') }}">Dashboard</a>
            </li>
            <li class="list-group-item">
                <a href="user-payment.html">Make Payment</a>
            </li>
            <li class="list-group-item">
                <a href="user-orders.html">Orders</a>
            </li>
            <li class="list-group-item">
                <a href="user-property-add.html">Add Property</a>
            </li>
            <li class="list-group-item">
                <a href="user-properties.html">All Properties</a>
            </li>
            <li class="list-group-item">
                <a href="user-wishlist.html">Wishlist</a>
            </li>
            <li class="list-group-item {{ Route::is('agent.profile.show') ? 'active' : '' }}">
                <a href="{{ route('agent.profile.show') }}">Edit Profile</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('agent.logout.handle') }}">Logout</a>
            </li>
        </ul>
    </div>
</div>
