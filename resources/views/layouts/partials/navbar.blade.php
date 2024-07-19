<nav class="navbar shadow-sm fixed-top p-0">
    <!-- Top section: Dark navbar -->
    <div class="navbar navbar-expand-md navbar-dark navbar-top py-0 w-100">
        <ul class="navbar-nav ms-auto mx-4">
            <!-- Authentication Links -->
            @guest
                <div class="d-flex align-items-center">
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    <li class="nav-item text-white px-2">|</li>

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                </div>
            @else
                <li class="nav-item dropdown">
                    <a id="profileDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="bi bi-person-circle text-white fs-6 me-1"></i>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">

                        <a class="dropdown-item" href="{{ route('profile')}}">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ Auth::user()->name }}
                        </a>

                        <hr>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>

    <!-- Bottom section: Red navbar -->
    <div class="navbar navbar-expand-md navbar-bottom w-100">
        <div class="container">
            <!-- Logo and brand -->
            <div class="col-auto col-lg-2 col-md-3 col-sm-4">
                <a href="/customer/home" class="navbar-brand p-0 me-2 text-white">
                    <img src="/image/logo/logo_nav.png" alt="Img" width="150px" class="rounded">
                </a>
            </div>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="col-auto col-lg-12 col-md-9 col-sm-8">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="d-flex justify-content-between w-100">
                        <!-- Search form -->
                        <div class="col-lg-6 col-md-3 col-sm-12 mx-3">
                            <form class="w-100" role="search">
                                <div class="input-icon-placeholder">
                                    <input type="search" class="form-control" placeholder="Search..."
                                        aria-label="Search">
                                </div>
                            </form>
                        </div>

                        <!-- Right nav items -->
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('customer.index') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('category') }}">Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="/customer/info-for-sell">Seller Center</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="myaccountDropdown" class="nav-link dropdown-toggle text-white" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        My Account
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="myaccountDropdown">
                                        <a class="dropdown-item" href="{{ route('profile')}}">My Account</a>
                                        <a class="dropdown-item" href="#">Orders History</a>
                                        <a class="dropdown-item" href="#">Returns and Exchanges</a>
                                        {{-- <hr class="my-1"> --}}
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('cart') }}">
                                        <i class="bi bi-cart4 fs-5"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
