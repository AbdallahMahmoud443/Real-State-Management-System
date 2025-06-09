<nav class="navbar navbar-expand-lg p-3 " style="background-color: rgb(16, 16, 51)">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <strong><span style="font-size: 1.5rem"><span style="color: rgb(53, 184, 142)">MultiAuth
                        System</span></span></strong></a>

        <button aria-controls="myNavbar2" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"
            data-bs-target="#myNavbar2" data-bs-toggle="collapse" type="button"> <span
                class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="myNavbar2">
            <div class="ml-5">
                <ul class="navbar-nav" id="menu-menu-1">

                </ul>
            </div>
        </div>
        <div>
            @if (!Auth::guard('web')->check())
                <a class="btn btn-light" href="{{ route('user.login.show') }}">login</a>
                <a class="btn btn-light" href="{{ route('user.register.show') }}">register</a>
            @else
                <a class="btn btn-light" href="{{ route('user.profile.show') }}">profile</a>
                <a class="btn btn-danger" href="{{ route('user.logout.handle') }}">logout</a>
            @endif

        </div>
    </div>
</nav>
