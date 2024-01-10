<header>
    <div class="container pt-5 pb-4">
        <div class="row">
            <div class="d-none d-lg-block col-lg-12  mx-auto text-center">
                <a href="{{ route('frontend.home') }}" class="logo-link"><img
                        src="{{ asset('public/frontend/images/Regalia-logo-light.png') }}" class="img-fluid logo" /></a>
            </div>
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <a class="navbar-brand d-lg-none logo-link" href="{{ route('frontend.home') }}"><img
                                src="{{ asset('public/frontend/images/Regalia-logo-light.png') }}"
                                class="img-fluid logo  pt-md-5" /></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item mx-4">
                                    <a class="nav-link active" aria-current="page"
                                        href="{{ route('frontend.home') }}">Home</a>
                                </li>
                                <li class="nav-item mx-4">
                                    <a class="nav-link" href="{{ route('dynamic.page', 'about-us') }}">About Us</a>
                                </li>
                                <li class="nav-item mx-4">
                                    <a class="nav-link" href="{{ url('dynamic/shop/shop') }}">Shop</a>
                                </li>
                                <li class="nav-item mx-4">
                                    <a class="nav-link" href="{{ route('frontend.contact') }}">Contact Us</a>
                                </li>
                                <li class="nav-item dropdown mx-4">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Sign In
                                    </a>
                                    <ul class="dropdown-menu bg-dark text-white">
                                        <li><a class="dropdown-item" href="{{ route('my.account') }}">My Account</a>
                                        </li>
                                        @if (auth()->user())
                                            <form action="{{ route('logout') }}" method="post" style="margin-left: 10%;">
                                                @csrf
                                                <button class="btn btn-danger btn-xs"
                                                    style="background-color:#030303"> Logout</button>
                                            </form>
                                        @else
                                            <li><a class="dropdown-item" href="{{ route('login') }}"
                                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sign In</a>
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<main class="main" id="main">
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in show col-md-12">
            <strong>Success!</strong> {{ session('success') }}
            {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade in show col-md-12">
            <strong>Error!</strong> {{ session('error') }}
            {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
        </div>
    @endif

</main>
