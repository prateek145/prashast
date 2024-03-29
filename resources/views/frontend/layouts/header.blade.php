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
                                    <a class="nav-link {{ request()->segment(1) == '' ? 'active' : '' }}"
                                        aria-current="page" href="{{ route('frontend.home') }}">Home</a>
                                </li>
                                {{-- {{dd(request()->segment(1))}} --}}

                                <li class="nav-item mx-4">
                                    <a class="nav-link {{ request()->segment(1) == 'about-us' ? 'active' : '' }}"
                                        href="{{ route('frontend.about') }}">About Us</a>
                                </li>

                                @php
                                    $categories = App\Models\backend\ProductSubcategory::where('status', 1)
                                        ->latest()
                                        ->get();

                                @endphp
                                <li class="nav-item dropdown mx-4" id="menu123">
                                    <a class="nav-link  {{ request()->segment(1) == 'shop' ? 'active' : '' }} dropdown-toggle"
                                        onclick="redirectshop()" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Shop
                                    </a>
                                    <ul class="dropdown-menu bg-dark text-white menuchilds">
                                        @foreach ($categories as $item)
                                            <li><a class="dropdown-item"
                                                    href="{{ route('dynamic.categories', $item->slug) }}">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li class="nav-item mx-4">
                                    <a class="nav-link {{ request()->segment(1) == 'contact-us' ? 'active' : '' }}"
                                        href="{{ route('frontend.contact') }}">Contact Us</a>
                                </li>

                                {{-- <li class="nav-item mx-4">
                                    <a class="nav-link" href="{{ url('en/blog') }}">Blog</a>
                                </li> --}}

                                <li class="nav-item dropdown mx-4">
                                    <a class="nav-link {{ request()->segment(1) == 'login' ? 'active' : '' }} {{ request()->segment(1) == 'register' ? 'active' : '' }} {{ request()->segment(1) == 'my-account' ? 'active' : '' }} dropdown-toggle"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        @if (auth()->user())
                                            {{ auth()->user()->name ?? '' }}
                                        @else
                                            Sign-In/Register
                                        @endif
                                    </a>
                                    <ul class="dropdown-menu bg-dark text-white">
                                        <li><a class="dropdown-item" href="{{ route('my.account') }}">My Account</a>
                                        </li>
                                        @if (auth()->user())
                                            <form action="{{ route('logout') }}" method="post"
                                                style="margin-left: 10%;">
                                                @csrf
                                                <button class="btn btn-danger btn-xs" style="background-color:#030303">
                                                    Logout</button>
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
                        @php
                            $products = session()->get('cart');
                        @endphp
                        <!-- Cart Icon -->
                        <div class="navbar-nav ml-auto d-none d-md-block">
                            <a class="nav-link" href="{{ route('cart') }}">
                                <i class="bi bi-cart3 text-light h5"
                                    style="width:50px;padding:10px;height:50px;border-radius: 50%; background-color: #986633;"></i>
                                <span class=" badge rounded-pill bg-danger top-0 start-100"
                                    style="transform: translate(-90%, -80%) !important;">
                                    {{ $products == true ? count($products) : 0 }}

                                </span>
                            </a>
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

    @if (Session::has('error12'))
        <div class="alert alert-danger alert-dismissible fade in show col-md-12">
            <strong>{{ session('error12') }}</strong>
            {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
        </div>
    @endif

</main>

<script>
    function redirectshop() {
        window.location.href = "{{ route('shop.page') }}";
    }

    document.getElementById("menu123").addEventListener("mouseover", function() {
        document.getElementsByClassName('menuchilds')[0].classList.add(
            "show");
        this.style.display = "block";
    });
    document.getElementById("menu123").addEventListener("mouseout", function() {
        document.getElementsByClassName('menuchilds')[0].classList.remove("show");
    });
</script>
