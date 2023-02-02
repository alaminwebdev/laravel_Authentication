<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Laravel Authentication</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link  {{ request()->routeIs('home') ? 'active' : '' }} " href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                @auth('web')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard*') ? 'active' : '' }} "
                            href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('logout') }}">
                            Logout
                        </a>
                    </li>
                @endauth

                {{-- @if (Auth::guard('web')->check())
                    The user is authenticated...
                @endif --}}

                @auth('admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin_dashboard*') ? 'active' : '' }} "
                            href="{{ route('admin_dashboard') }}">
                            Admin Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin_settings*') ? 'active' : '' }} "
                            href="{{ route('admin_settings') }}">
                            Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('admin_logout') }}">
                            Logout
                        </a>
                    </li>
                @endauth
                @if (!Auth::guard('web')->check() && !Auth::guard('admin')->check())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login*') ? 'active' : '' }} "
                            href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('registration*') ? 'active' : '' }} "
                            href="{{ route('registration') }}">
                            Registration
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
