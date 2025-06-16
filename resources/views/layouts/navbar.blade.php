<div class="navbar-area" id="stickymenu">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="index.html" class="logo">
            <img src="{{ asset('assets/frontend/uploads/logo/logo.png') }}" alt="">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('assets/frontend/uploads/logo/logo.png') }}" alt="">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="properties.html" class="nav-link">Properties</a>
                        </li>
                        <li class="nav-item">
                            <a href="agents.html" class="nav-link">Agents</a>
                        </li>
                        <li class="nav-item">
                            <a href="locations.html" class="nav-link">Locations</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pricing') }}" class="nav-link">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a href="faq.html" class="nav-link">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a href="blog.html" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                        </li>

                        <li class="nav-item">
                            @if (Auth::guard('web')->check())
                                <a href="{{ route('user.dashboard.show') }}" class="nav-link">Customer Dashboard</a>
                            @endif
                            @if (Auth::guard('agent')->check())
                                <a href="{{ route('agent.dashboard.show') }}" class="nav-link">Agent Dashboard</a>
                            @endif
                            @if (!Auth::guard('web')->check() && !Auth::guard('agent')->check())
                                <a href="Login.html" class="nav-link">Login</a>
                            @endif
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
