@extends('frontend.layouts.app')
@section('content')
    <style>
        h2 {
            font-size: 1.5rem;
        }

        .line:hover {
            border: 4px dashed #f0b53f !important;
        }
    </style>
    {{-- @if ($page_image)
        <section class="hero1" style="background-image:url({{ asset('public/pageimages/' . $page_image->images) }})">
        </section>
    @else
        <section class="hero-shop">
        </section>
    @endif --}}
    @if ($shop_page_slider)
        @php
            $images = json_decode($shop_page_slider->images);
            $links = json_decode($shop_page_slider->links);
            // dd($images, $links);
        @endphp
        <section class="slider-top">
            <div class="row" style=" --bs-gutter-x: 0;">
                <div class="col-12">
                    <div id="carouselExampleAutoplayingoffer" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($images as $key => $value)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <a href="{{ $links[$key] ?? '#' }}">
                                        <img src="{{ asset('public/shopslider/' . $value) }}" class="d-block w-100"
                                            alt="...">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleAutoplayingoffer" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleAutoplayingoffer" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="slider-top">
            <div class="row" style=" --bs-gutter-x: 0;">
                <div class="col-12">
                    <div id="carouselExampleAutoplayingoffer" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="shop.html">
                                    <img src="{{ asset('public/frontend/images/1.jpg') }}" class="d-block w-100"
                                        alt="...">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="shop.html">
                                    <img src="{{ asset('public/frontend/images/2.jpg') }}" class="d-block w-100"
                                        alt="...">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="shop.html">
                                    <img src="{{ asset('public/frontend/images/3.jpg') }}" class="d-block w-100"
                                        alt="...">
                                </a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleAutoplayingoffer" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleAutoplayingoffer" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- sidebar -->
                <div class="col-lg-3">
                    <!-- Toggle button -->
                    <button class="btn border btn-block d-block d-lg-nonex w-100" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Show/Hide Filters
                    </button>
                    <!-- Collapsible wrapper -->
                    <div class="collapse show" id="collapseExample">

                        <h2 style="padding:1rem;">Categories</h2>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            @foreach ($categories as $item)
                                <h5 class="tag" style="padding-left: 1rem">
                                    <a href="{{ route('dynamic.categories', $item->slug) }}">
                                        {{ $item->name }}
                                    </a>
                                </h5>
                            @endforeach
                        </div>
                        {{-- <h2 style="padding:1rem;">Tags</h2> --}}
                        {{-- {{dd($tags)}} --}}
                        @if ($fsidebar)
                            {!! $fsidebar->description !!}
                        @endif

                        <h2 style="padding: 1rem">Filter</h2>
                        <form action="{{ route('shop.page') }}" method="get" id="filter_form">
                            <input type="hidden" name="filter_search">
                            <select class="form-select form-control" onchange="filter_price(this.value)">
                                <option value="" selected>Select</option>
                                <option value="{{ $min_price }}">{{ $min_price }} < </option>
                                <option value="{{ $medium_price }}">{{ $medium_price }} to {{ $max_price }}</option>
                                <option value="{{ $max_price }}">{{ $max_price }} ></option>
                            </select>
                        </form>

                    </div>
                </div>
                <!-- sidebar -->
                <!-- content -->
                <div class="col-lg-9">
                    <header>
                        <form class="form searchform d-flex col-12 col-lg-12 mb-2" action="{{ route('shop.page') }}"
                            method="get">
                            {{-- @csrf --}}
                            <input type="text" class=" border-0 form-control" placeholder="Search" name="search">

                            <button class="btn border-0 bg-light"><i class="bi bi-search"></i></button>
                        </form>
                    </header>
                    <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                        <p class="d-block py-2 m-0">Showing {{ count($products) }} of {{ count($products) }} results </p>
                        <div class="ms-auto">
                            <form action="{{ route('shop.page') }}" method="get" id="selectForm">
                                <input type="hidden" name="search_box">
                                <select class="form-select d-inline-block w-auto border pt-1"
                                    onchange="selectForm(this.value)">
                                    <option value="">Short By</option>
                                    <option value="low_to_high">Price Low to High</option>
                                    <option value="high_to_low">Price High to Low</option>
                                    <option value="now_product">What’s new?</option>
                                </select>

                            </form>
                        </div>
                    </header>
                    <div class="row">
                        @foreach ($products as $item)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                                <div class="card w-100 my-2 shadow-2-strong border border-0 ">
                                    <a href="{{ route('product.detail', $item->slug) }}" class="btn-link product-link">
                                        @if ($item->image)
                                            <img src="{{ asset('public/product/' . $item->image) }}"
                                                class="card-img-top">
                                        @else
                                            <img src="https://omegastaging.com.au/jbm/wp-content/uploads/2024/02/Madhubani-2-9.jpg"
                                                class="card-img-top">
                                        @endif

                                        <span class="content ">
                                            <h6 class="text-black mt-3" style="color:black !important">
                                                {{ $item->name }}</h6>
                                            <p class="text-black" style="color:black !important">₹{{ $item->sale_price }}
                                            </p>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    {{ $products->links('frontend.layouts.customtable') }}
                </div>
            </div>
        </div>
    </section>
    <section class="mostviewed text-white text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (isset($footer_image))
                        <div id="carouselExampleAutoplayingb" class="my-lg-5 py-lg-5 carousel slide bg-pattern1"
                            data-bs-ride="carousel">
                            <div class="carousel-inner py-lg-5 my-lg-5">
                                @foreach ($categories as $key => $item)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }} py-5 my-lg-5">
                                        <img src="{{ asset('public/pageimages/' . $footer_image->image) }}"
                                            class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block ">
                                            <img src="{{ asset('public/productsubcategory/' . $item->icon_image) }}"
                                                class="img-fluid d-block mx-auto">
                                            <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                                class="img-fluid d-block mx-auto">
                                            <h4>{{ $item->name ?? '' }}</h4>
                                            @if (!isset($item->top_seller_name->name))
                                                <h6>{{ 'Select Top Seller' }}</h6>
                                            @else
                                                <a href="{{ route('product.detail', $item->top_seller_name->slug) }}"
                                                    class="text-light link-underline link-underline-opacity-0">
                                                    <h6>{{ $item->top_seller_name->name ?? '' }}</h6>
                                                </a>
                                            @endif
                                            <h5>TOP SELLER</h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplayingb" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplayingb" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @else
                        <div id="carouselExampleAutoplayingb" class="my-lg-5 py-lg-5 carousel slide "
                            data-bs-ride="carousel">
                            <div class="carousel-inner py-lg-5 my-lg-5">
                                <div class="carousel-item active py-5 my-lg-5">
                                    <img src="https://omegawebdemo.com.au/ept/images/bg-black.png" class="d-block w-100"
                                        alt="...">
                                    <div class="carousel-caption d-none d-md-block ">
                                        <img src="{{ asset('public/frontend/images/icon-top.png') }}"
                                            class="img-fluid d-block mx-auto">
                                        <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                            class="img-fluid d-block mx-auto">
                                        <h4>Kala</h4>
                                        <h6>MADHUBANI PAINTING</h6>
                                        <h5>TOP SELLER</h5>
                                    </div>
                                </div>
                                <div class="carousel-item py-5 my-lg-5">
                                    <img src="https://omegawebdemo.com.au/ept/images/bg-black.png" class="d-block w-100"
                                        alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <img src="{{ asset('public/frontend/images/icon-top.png') }}"
                                            class="img-fluid d-block mx-auto">
                                        <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                            class="img-fluid d-block mx-auto">
                                        <h4>Kala</h4>
                                        <h6>MADHUBANI PAINTING</h6>
                                        <h5>TOP SELLER</h5>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplayingb" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplayingb" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <script>
        var min_price = "{{ $min_price }}";
        var medium_price = "{{ $medium_price }}";
        var max_price = "{{ $max_price }}";

        function filter_price(value) {
            if (value != "") {
                document.getElementsByName('filter_search')[0].value = value;
                document.getElementById('filter_form').submit();

            }
        }

        function inputfield(value) {
            console.log(value);
        }

        function selectForm(value) {
            // console.log(value);
            if (value != "") {
                document.getElementsByName('search_box')[0].value = value;
                document.getElementById('selectForm').submit();

            }
        }
    </script>
@endsection
