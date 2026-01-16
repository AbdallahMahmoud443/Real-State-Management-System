<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard.show') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href=""></a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Route::is('admin.dashboard.show') ? 'active' : '' }} "><a class="nav-link"
                    href="{{ route('admin.dashboard.show') }}"><i class="fas fa-home"></i>
                    <span>Dashboard</span></a></li>
            <li
                class="nav-item dropdown {{ Route::is('admin.location.*') || Route::is('admin.amenity.*') || Route::is('admin.type.*') || Route::is('admin.properties.*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-folder"></i><span>Property
                        Section</span></a>

                <ul class="dropdown-menu">
                    <li class="{{ Route::is('admin.location.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.location.index') }}">
                            <i class="fas fa-angle-right"></i>
                            Locations</a>
                    </li>
                    <li class="{{ Route::is('admin.type.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.type.index') }}">
                            <i class="fas fa-angle-right"></i>
                            Types</a>
                    </li>
                    <li class="{{ Route::is('admin.amenity.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.amenity.index') }}">
                            <i class="fas fa-angle-right"></i>
                            Amenities</a>
                    </li>
                    <li class="{{ Route::is('admin.properties.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.properties.index') }}">
                            <i class="fas fa-angle-right"></i>
                            Properties</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/dashboard/package/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.package.show') }}">
                    <i class="far fa-money-bill-alt"></i>
                    <span>Pricing Package</span>
                </a>
            </li>
            <li class="{{ Route::is('admin.Customers.index') ? 'active' : '' }}  ">
                <a class="nav-link" href="{{ route('admin.Customers.index') }}">
                    <i class="fas fa-users"></i>
                    <span>Customers</span>
                </a>
            </li>
            <li class="{{ Route::is('admin.agents.index') ? 'active' : '' }}  ">
                <a class="nav-link" href="{{ route('admin.agents.index') }}">
                    <i class="fas fa-users"></i>
                    <span>Agents</span>
                </a>
            </li>
            <li class="{{ Route::is('admin.orders.index') ? 'active' : '' }}  ">
                <a class="nav-link" href="{{ route('admin.orders.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Orders</span>
                </a>
            </li>
            <li class="{{ Route::is('admin.profile.show') ? 'active' : '' }}  ">
                <a class="nav-link" href="{{ route('admin.profile.show') }}">
                    <i class="fas fa-id-card"></i>
                    <span>Edit Profile</span>
                </a>
            </li>

            <li class="{{ Route::is('admin.logout.handle') ? 'active' : '' }}  ">
                <a class="nav-link" href="{{ route('admin.logout.handle') }}">
                    <i class="fas fa-sign-out-alt">
                    </i>
                    <span>logout</span>
                </a>
            </li>
            {{-- <li class=""><a class="nav-link" href="form.html"><i class="fas fa-hand-point-right"></i>
                    <span>Form</span></a></li>

            <li class=""><a class="nav-link" href="table.html"><i class="fas fa-hand-point-right"></i>
                    <span>Table</span></a></li>

            <li class=""><a class="nav-link" href="invoice.html"><i class="fas fa-hand-point-right"></i>
                    <span>Invoice</span></a></li> --}}
        </ul>
    </aside>
</div>
