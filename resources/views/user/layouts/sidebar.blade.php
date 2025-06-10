<div class="col-lg-3 col-md-12">
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item {{ Route::is('user.dashboard.show') ? 'active' : '' }}">
                <a href="{{ route('user.dashboard.show') }}">Dashboard</a>
            </li>

            <li class="list-group-item">
                <a href="user-orders.html">Orders</a>
            </li>
            <li class="list-group-item">
                <a href="user-property-add.html">Messages</a>
            </li>
            <li class="list-group-item">
                <a href="user-wishlist.html">Wishlist</a>
            </li>
            <li class="list-group-item {{ Route::is('user.profile.show') ? 'active' : '' }}">
                <a href="{{ route('user.profile.show') }}">Edit Profile</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('user.logout.handle') }}">Logout</a>
            </li>
        </ul>
    </div>
</div>
