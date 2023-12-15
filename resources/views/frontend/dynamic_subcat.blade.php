@extends('frontend.layouts.app')
{{-- @include('frontend.layouts.header') --}}
@section('content')
    <style>
        h2 {
            font-size: 1.5rem;
        }

        .line:hover {
            border: 4px dashed #f0b53f !important;
        }
    </style>
    <section class="hero-shop">
    </section>
    <section class="offers py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleAutoplayingoffer" class="carousel slide my-5" data-bs-ride="carousel">
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
                        <h2 style="padding: 1rem">Collections</h2>
                        <h5 class="tag active" style="padding-left: 1rem">
                            <a href="">All products</a>
                        </h5>
                        <h5 class="tag" style="padding-left: 1rem">
                            <a href="">Accessories</a>
                        </h5>
                        <h5 class="tag" style="padding-left: 1rem">
                            <a href="">Utility pouches</a>
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
                        </h5>
                        <h2 style="padding: 1rem">Filter</h2>
                        <form>
                            <select class="form-select form-control">
                                <option>1000</option>
                                <option>1001 to 10000</option>
                                <option>10001 ></option>
                            </select>
                        </form>
                        <h2 style="padding:1rem;">Categories</h2>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            @foreach ($sub_categories as $item)
                                <a href="{{route('dynamic.subcategories', $item->name)}}">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseOne{{ $item->id }}"
                                            aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                            {{ $item->name }}
                                        </button>
                                    </h2>

                                </a>
                              
                            @endforeach
                            {{-- <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Baans
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="">Bracelet</a></li>
                                    <li><a href="">Choker</a></li>
                                    <li><a href="">Earring</a></li>
                                    <li><a href="">Necklace</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Soot
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="">Bracelet</a></li>
                                    <li><a href="">Choker</a></li>
                                    <li><a href="">Earring</a></li>
                                    <li><a href="">Necklace</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                Maati
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="">Bracelet</a></li>
                                    <li><a href="">Choker</a></li>
                                    <li><a href="">Earring</a></li>
                                    <li><a href="">Necklace</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                        </div>
                        <h2 style="padding:1rem;">Tags</h2>
                        <h5 class="tag" style="padding-left:1rem;"><a href="">Bracelet</a></h5>
                        <h5 class="tag active" style="padding-left:1rem;"><a href="">Choker</a></h5>
                        <h5 class="tag" style="padding-left:1rem;"><a href="">Earring</a></h5>
                        <h5 class="tag" style="padding-left:1rem;"><a href="">Necklace</a></h5>

                        <!--<h2 style="padding:1rem;">Filter</h2>-->
                        <!--<form>-->
                        <!--    <select class="form-select form-control">-->
                        <!--        <option>-->
                        <!--            < 1000</option>-->
                        <!--        <option>1001 to 10000</option>-->
                        <!--        <option>10001 ></option>-->
                        <!--    </select>-->
                        <!--</form>-->

                    </div>
                </div>
                <!-- sidebar -->
                <!-- content -->
                <div class="col-lg-9">
                    <header>
                        <form class="form searchform d-flex col-12 col-lg-5" action="{{route('searchproduct')}}" method="post">
                            @csrf
                            <input type="text"
                                class=" border-0 form-control" onkeyup="searchproducts(this.value)" list="datalistname" placeholder="Search">
                                <datalist id="datalistname"></datalist>
                                <button class="btn border-0 bg-light"><i class="bi bi-search"></i></button></form>
                    </header>
                    <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                        <p class="d-block py-2 m-0">Showing {{ count($products) }} of {{ count($products) }} results </p>
                        <div class="ms-auto">
                            <select class="form-select d-inline-block w-auto border pt-1">
                                <option value="0">Best match</option>
                                <option value="1">Recommended</option>
                                <option value="2">High rated</option>
                                <option value="3">Randomly</option>
                            </select>
                        </div>
                    </header>
                    <div class="row">
                        @foreach ($products as $item)
                            {{-- {{dd($item->product_subcategory($item->product_subcategories))}} --}}
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                                <div
                                    class="card w-100 my-2 shadow-2-strong line {{ strtolower($item->product_subcategory($item->product_subcategories)->name) == 'kala' ? 'zevar' : strtolower($item->product_subcategory($item->product_subcategories)->name) }}">
                                    <a class="btn-link product-link" href="{{ route('product.detail', $item->slug) }}">
                                        @php
                                            $pro = \App\Models\wishlist::where(['product_id' => $item->id, 'user_id' => auth()->id()])->first();

                                        @endphp
                                        @if ($pro)
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
                                        @endif
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
                                                height="200px" width="200px">
                                        @else
                                            <img src="{{ asset('public/frontend/images/07.png') }}" class="card-img-top">
                                        @endif
                                        <span class="content">
                                            <h6>{{ $item->name }}</h6>
                                            <p>₹{{ $item->regular_price }}</p>
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
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
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
                    <div id="carouselExampleAutoplayingb" class="my-lg-5 py-lg-5 carousel slide bg-pattern"
                        data-bs-ride="carousel">
                        <div class="carousel-inner py-lg-5 my-lg-5">
                            <div class="carousel-item active py-lg-5 my-lg-5">
                                <img src="{{ asset('public/frontend/images/icon-top.png') }}"
                                    class="img-fluid d-block mx-auto">
                                <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                    class="img-fluid d-block mx-auto">
                                <h4>Kala</h4>
                                <h6>MADHUBANI PAINTING</h6>
                                <h5>TOP SELLER</h5>
                            </div>
                            <div class="carousel-item py-lg-5 my-lg-5">
                                <img src="{{ asset('public/frontend/images/icon-top.png') }}"
                                    class="img-fluid d-block mx-auto">
                                <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                    class="img-fluid d-block mx-auto">
                                <h4>Kala</h4>
                                <h6>MADHUBANI PAINTING</h6>
                                <h5>TOP SELLER</h5>
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
                </div>
            </div>
        </div>
    </section>
@endsection
