<header class="container">
    <div class="header-area">
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between">
                <div class="align-self-center">
                    <a href="/">
                        <h3 class="font-weight-bold">{{ config('app.name') }}</h3>
                    </a>
                </div>
                <div class="menu-search-cart">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                @if(auth()->guest())
                                    <li><a href="{{ route('login') }}" class="text-primary">Login</a></li>
                                @endif
                                @if(!auth()->guest())
                                    <li>
                                        <a href="#">
                                            <div class="header__user-toggle">
                                                <div class="header__user-avatar">
                                                    <i class="icon bi bi-person"></i>
                                                </div>
                                                <span class="ml-1 d-none d-md-block">My Account</span>
                                                <i class="bi ml-1 fs-20 bi-chevron-down"></i>
                                            </div>
                                        </a>
                                        <ul class="dropdown">
                                            @if(auth()->user()->is_admin === 0)
                                                <li><a href="{{ route('employee.home') }}">My Dashboard</a></li>
                                                <li><a href="{{ route('employee.profile') }}">Profile</a></li>
                                            @else
                                                <li><a href="{{ route('admin.home') }}">My Dashboard</a></li>
                                            @endif
                                            <li>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout').submit();">Logout</a>
                                                <form id="logout" action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                <li class="mx-0 d-none">
                                    <a href="#">
                                        <div class="header-cart common-style">
                                            <button class="sidebar-trigger">
                                                <i class="bi bi-list fs-26px"></i>
                                            </button>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
