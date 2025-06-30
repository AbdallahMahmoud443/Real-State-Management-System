<div class="col-lg-3 col-md-12">
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item {{ Route::is('agent.dashboard.show') ? 'active' : '' }}">
                <a href="{{ route('agent.dashboard.show') }}">Dashboard</a>
            </li>
            <li class="list-group-item {{ Route::is('agent.payment.show') ? 'active' : '' }}">
                <a href="{{ route('agent.payment.show') }}">Make Payment</a>
            </li>
            <li class="list-group-item {{ Route::is('agent.orders.show') ? 'active' : '' }}">
                <a href="{{ route('agent.orders.show') }}">Orders</a>
            </li>
            <li class="list-group-item {{ Route::is('agent.properties.create') ? 'active' : '' }}">
                <a href="{{ route('agent.properties.create') }}">Add Property</a>
            </li>
            <li class="list-group-item {{ Route::is('agent.properties.index') ? 'active' : '' }}">
                <a href="{{ route('agent.properties.index') }}">All Properties</a>
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
