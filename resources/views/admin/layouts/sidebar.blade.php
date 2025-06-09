<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard.show') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href=""></a>
        </div>
        <ul class="sidebar-menu">
            <li class="active"><a class="nav-link" href="{{ route('admin.dashboard.show') }}"><i class="fas fa-home"></i>
                    <span>Dashboard</span></a></li>

            <li class=""><a class="nav-link" href="{{ route('admin.profile.show') }}"><i class="fas fa-user"></i>
                    <span>Setting</span></a></li>

            {{-- <li class=""><a class="nav-link" href="form.html"><i class="fas fa-hand-point-right"></i>
                    <span>Form</span></a></li>

            <li class=""><a class="nav-link" href="table.html"><i class="fas fa-hand-point-right"></i>
                    <span>Table</span></a></li>

            <li class=""><a class="nav-link" href="invoice.html"><i class="fas fa-hand-point-right"></i>
                    <span>Invoice</span></a></li> --}}
        </ul>
    </aside>
</div>
