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
    @if ($page_image)
        <section class="hero1" style="background-image:url({{ asset('public/pageimages/' . $page_image->images) }})">
        </section>
    @else
        <section class="hero-shop">
        </section>
    @endif
    <section class="offers py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleAutoplayingoffer" class="carousel slide my-5" data-bs-ride="carousel">
                        @if (isset($shop_page_slider))
                            {{-- {{dd($shop_page_slider)}} --}}
                            <div class="carousel-inner">
                                @foreach (array_reverse(json_decode($shop_page_slider->images)) as $key => $item)
                                    {{-- {{dd($item)}} --}}
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('public/shopslider/' . $item) }}" class="d-block w-100"
                                            alt="...">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('public/frontend/images/offer-banner.png') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('public/frontend/images/offer-banner.png') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('public/frontend/images/offer-banner.png') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            </div>
                        @endif

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
        </div>
    </section>
    <section class="">
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
                        {{-- <h2 style="padding: 1rem">Collections</h2>
                        <h5 class="tag active" style="padding-left: 1rem">
                            <a href="">All products</a>
                        </h5>
                        <h5 class="tag" style="padding-left: 1rem">
                            <a href="">Accessories</a>
                        </h5>

                        <h2 style="padding: 1rem">Home & Lifestyle</h2>
                        <h5 class="tag" style="padding-left: 1rem">
                            <a href="">Home decor</a>
                        </h5>
                        <h5 class="tag" style="padding-left: 1rem">
                            <a href="">Storage</a>
                        </h5>
                        <h5 class="tag" style="padding-left: 1rem">
                            <a href="">Kitchen and dining</a>
                        </h5> --}}

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
                        <form>
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
                        <form class="form searchform d-flex col-12 col-lg-5" action="{{ route('searchproduct') }}"
                            method="post">
                            @csrf
                            <input type="text" class=" border-0 form-control" onkeyup="searchproducts(this.value)"
                                list="datalistname" placeholder="Search">
                            <datalist id="datalistname"></datalist>
                            <button class="btn border-0 bg-light"><i class="bi bi-search"></i></button>
                        </form>
                    </header>
                    <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                        <p class="d-block py-2 m-0">Showing {{ count($products) }} of {{ count($products) }} results </p>
                        <div class="ms-auto">
                            <select class="form-select d-inline-block w-auto border pt-1">
                                {{-- <option value="0">Best match</option>
                                <option value="1">Recommended</option>
                                <option value="2">High rated</option> --}}
                                <option value="3">Randomly</option>
                            </select>
                        </div>
                    </header>
                    <div class="row">
                        @foreach ($products as $item)
                            {{-- {{dd($item->product_subcategory($item->product_subcategories))}} --}}
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                                <div
                                    class="card w-100 my-2 shadow-2-strong line {{ strtolower($item->product_subcategory($item->product_subcategories)->name) }}">
                                    <a class="btn-link product-link" href="{{ route('product.detail', $item->slug) }}">
                                        @php
                                            $pro = \App\Models\wishlist::where(['product_id' => $item->id, 'user_id' => auth()->id()])->first();

                                        @endphp
                                        {{-- @if ($pro)
                                            <span class="wish">
                                                <button type="button" class="btn wishlist-btn" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    onclick="addtowishlist('{{ $item->id }}', '{{ $item->sku }}', 'productdetail')"
                                                    title="Wishlist"><i class="bi bi-heart-fill"></i></button>
                                            </span>
                                        @else
                                            <span class="wish">
                                                <button type="button" class="btn wishlist-btn" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    onclick="addtowishlist('{{ $item->id }}', '{{ $item->sku }}', 'productdetail')"
                                                    title="Wishlist"><i class="bi bi-heart"></i></button>
                                            </span>
                                        @endif --}}
                                        <span class="catbox mx-auto">
                                            @if ($item->product_subcategory($item->product_subcategories)->icon_image)
                                                <img src="{{ asset('public/productsubcategory/' . $item->product_subcategory($item->product_subcategories)->icon_image) }}"
                                                    class="mb-1">
                                            @else
                                                <img src="{{ asset('public/frontend/images/cat-icon.png') }}"
                                                    class="mb-1">
                                            @endif
                                            <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                                class="img-fluid d-block mx-auto">
                                            <p>New Collection</p>
                                        </span>

                                        @if ($item->image)
                                            <img src="{{ asset('public/product/' . $item->image) }}" class="card-img-top"
                                                height="200px" >
                                        @else
                                            <img src="{{ asset('public/frontend/images/07.png') }}" class="card-img-top">
                                        @endif
                                        <span class="content">
                                            <h6>{{ $item->name }}</h6>
                                            <p>₹{{ $item->sale_price }}</p>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <!-- Pagination -->
                    <nav aria-label="Page navigation example" class="d-flex justify-content-end mt-3">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            {{-- {{pagination()->links}} --}}
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            {{-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li> --}}
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- Pagination -->
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
                                    <div class="carousel-item active py-5 my-lg-5">
                                        <img src="https://omegawebdemo.com.au/ept/images/bg-black.png"
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
                                                <a href="{{ route('product.detail', $item->top_seller_name->slug) }}">
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
                                        <img src="images/icon-top.png" class="img-fluid d-block mx-auto">
                                        <img src="images/top-separator-white.png" class="img-fluid d-block mx-auto">
                                        <h4>Kala</h4>
                                        <h6>MADHUBANI PAINTING</h6>
                                        <h5>TOP SELLER</h5>
                                    </div>
                                </div>
                                <div class="carousel-item py-5 my-lg-5">
                                    <img src="https://omegawebdemo.com.au/ept/images/bg-black.png" class="d-block w-100"
                                        alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <img src="images/icon-top.png" class="img-fluid d-block mx-auto">
                                        <img src="images/top-separator-white.png" class="img-fluid d-block mx-auto">
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
            if (value !== "") {
                if (value == "{{ $min_price }}") {
                    window.location.href = "{{ url('filter/greater') }}" + "/" + min_price;
                }

                if (value == "{{ $medium_price }}") {
                    window.location.href = "{{ url('filter/equal') }}" + "/" + medium_price;
                }

                if (value == "{{ $max_price }}") {
                    window.location.href = "{{ url('filter/greaterthen') }}" + "/" + max_price;
                }

            }
        }
    </script>
@endsection
