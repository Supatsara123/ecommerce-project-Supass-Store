<!-- Top Navbar for md and below -->
<nav class="navbar navbar-expand-md nav-bg fixed-top d-md-none">
    <div class="container">
        <a class="navbar-brand" href="/super-admin/home">
            <img src="/image/logo/logo_admin.png" alt="Img" width="100px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="bi bi-grid mb-1 me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="rolePermissionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-shield-check mb-1 me-2"></i>
                        Role & Permission
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="rolePermissionDropdown">
                        <li><a class="dropdown-item" href="/super-admin/permissions">Devices Management</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/super-admin/product-list">
                            <i class="bi bi-plus-lg mb-1 me-2"></i>
                            Add Product
                        </a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/super-admin/response">
                        <i class="bi bi-list-ul mb-1 me-2"></i>
                        Analiztic
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle text-white mb-1 me-2"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- Side Navbar for md and above -->
<div class="nav-side d-none d-md-flex flex-column flex-wrap flex-md-nowrap flex-shrink-0">
    <div class="col-auto col-xl-2 col-md-3 px-0 nav-bg fixed-top">
        <div class="d-flex flex-column flex-shrink-0 nav-side">
            <!-- Logo -->
            <a href="/super-admin/home" class="navbar-brand p-3 text-white text-center">
                <img src="/image/logo/logo_admin.png" alt="Img" width="100px">
            </a>

            <!-- Nav link -->
            <ul class="nav nav-bg-dark nav-pills flex-column p-3 px-md-4 px-sm-2 mb-sm-auto align-items-center align-items-sm-start">
                <li class="nav-item py-2">
                    <a href="/" class="nav-link">
                        <i class="bi bi-grid mb-1 me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item py-2 dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="devicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-shield-check mb-1 me-2"></i>
                        Role & Permission
                    </a>
                    <ul class="dropdown-menu text-center" aria-labelledby="devicesDropdown">
                        <li><a href="/super-admin/permissions" class="dropdown-item">Devices Management</a></li>
                        <hr>
                        <li><a href="/super-admin/product-list" class="btn btn-primary w-95">
                            <i class="bi bi-plus-lg mb-1 me-2"></i>
                            Add Product
                        </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item py-2">
                    <a href="/super-admin/response" class="nav-link">
                        <i class="bi bi-list-ul mb-1 me-2"></i>
                        Analiztic
                    </a>
                </li>
            </ul>

            {{-- footer --}}
            <ul class="navbar-nav dropdown p-4">
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a href="#" class="d-flex align-items-center nav-link dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle text-white mb-1 me-2"></i>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</div>
