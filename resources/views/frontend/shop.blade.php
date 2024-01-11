@extends('frontend.layouts.app')
@section('content')
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
                        <h2 style="padding:1rem;">Categories</h2>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            @foreach ($sub_categories as $item)
                                {{-- {{dd($categories)}} --}}
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseOne{{ $item->id }}"
                                            aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                            {{ $item->name }}
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseOne{{ $item->id }}"
                                        class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            <ul>

                                                @if (count($item->subproducts($item->id)) > 0)
                                                    @foreach ($item->subproducts($item->id) as $item1)
                                                        <li><a
                                                                href="{{ route('product.detail', $item1->slug) }}">{{ $item1->name }}</a>
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <li>No Item</li>
                                                @endif

                                                {{-- <li><a href="">Choker</a></li>
                                        <li><a href="">Earring</a></li>
                                        <li><a href="">Necklace</a></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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

                        <h2 style="padding:1rem;">Filter</h2>
                        <form>
                            <select class="form-select form-control">
                                <option>
                                    < 1000</option>
                                <option>1001 to 10000</option>
                                <option>10001 ></option>
                            </select>
                        </form>

                    </div>
                </div>
                <!-- sidebar -->
                <!-- content -->
                <div class="col-lg-9">
                    <header>
                        <form class="form searchform d-flex col-12 col-lg-5"><input type="text"
                                class=" border-0 form-control" placeholder="Search"><button class="btn border-0 bg-light"><i
                                    class="bi bi-search"></i></button></form>
                    </header>
                    <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                        <p class="d-block py-2 m-0">Showing 10 of 32 results </p>
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
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                            <div class="card w-100 my-2 shadow-2-strong maati">
                                <a href="product.html" class="btn-link product-link">
                                    <span class="wish">
                                        <button type="button" class="btn wishlist-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Wishlist"><i class="bi bi-heart"></i></button>
                                    </span>
                                    <span class="catbox mx-auto">
                                        <img src="{{ asset('public/frontend/images/cat-icon.png') }}" class="mb-1">
                                        <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                            class="img-fluid d-block mx-auto">
                                        <p>New Collection</p>
                                    </span>
                                    <img src="{{ asset('public/frontend/images/07.png') }}" class="card-img-top">
                                    <span class="content">
                                        <h6>Clay Kulhad Set of 6</h6>
                                        <p>₹899.00</p>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                            <div class="card w-100 my-2 shadow-2-strong maati">
                                <a href="product.html" class="btn-link product-link">
                                    <span class="wish">
                                        <button type="button" class="btn wishlist-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Wishlist"><i class="bi bi-heart"></i></button>
                                    </span>
                                    <span class="catbox mx-auto">
                                        <img src="{{ asset('public/frontend/images/cat-icon.png') }}" class="mb-1">
                                        <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                            class="img-fluid d-block mx-auto">
                                        <p>New Collection</p>
                                    </span>
                                    <img src="{{ asset('public/frontend/images/08.png') }}" class="card-img-top">
                                    <span class="content">
                                        <h6>Clay Kulhad Set of 6</h6>
                                        <p>₹899.00</p>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                            <div class="card w-100 my-2 shadow-2-strong zevar">
                                <a href="" class="btn-link product-link">
                                    <span class="wish">
                                        <button type="button" class="btn wishlist-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Wishlist"><i class="bi bi-heart"></i></button>
                                    </span>
                                    <span class="catbox mx-auto">
                                        <img src="{{ asset('public/frontend/images/cat-icon.png') }}" class="mb-1">
                                        <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                            class="img-fluid d-block mx-auto">
                                        <p>New Collection</p>
                                    </span>
                                    <img src="{{ asset('public/frontend/images/09.png') }}" class="card-img-top">
                                    <span class="content">
                                        <h6>Clay Kulhad Set of 6</h6>
                                        <p>₹899.00</p>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                            <div class="card w-100 my-2 shadow-2-strong zevar">
                                <a href="" class="btn-link product-link">
                                    <span class="wish">
                                        <button type="button" class="btn wishlist-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Wishlist"><i class="bi bi-heart"></i></button>
                                    </span>
                                    <span class="catbox mx-auto">
                                        <img src="{{ asset('public/frontend/images/cat-icon.png') }}" class="mb-1">
                                        <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                            class="img-fluid d-block mx-auto">
                                        <p>New Collection</p>
                                    </span>
                                    <img src="{{ asset('public/frontend/images/011.png') }}" class="card-img-top">
                                    <span class="content">
                                        <h6>Clay Kulhad Set of 6</h6>
                                        <p>₹899.00</p>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                            <div class="card w-100 my-2 shadow-2-strong baans">
                                <a href="" class="btn-link product-link">
                                    <span class="wish">
                                        <button type="button" class="btn wishlist-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Wishlist"><i class="bi bi-heart"></i></button>
                                    </span>
                                    <span class="catbox mx-auto">
                                        <img src="{{ asset('public/frontend/images/cat-icon.png') }}" class="mb-1">
                                        <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                            class="img-fluid d-block mx-auto">
                                        <p>New Collection</p>
                                    </span>
                                    <img src="{{ asset('public/frontend/images/010.png') }}" class="card-img-top">
                                    <span class="content">
                                        <h6>Clay Kulhad Set of 6</h6>
                                        <p>₹899.00</p>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                            <div class="card w-100 my-2 shadow-2-strong soot">
                                <a href="" class="btn-link product-link">
                                    <span class="wish">
                                        <button type="button" class="btn wishlist-btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Wishlist"><i class="bi bi-heart"></i></button>
                                    </span>
                                    <span class="catbox mx-auto">
                                        <img src="{{ asset('public/frontend/images/cat-icon.png') }}" class="mb-1">
                                        <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                            class="img-fluid d-block mx-auto">
                                        <p>New Collection</p>
                                    </span>
                                    <img src="{{ asset('public/frontend/images/012.png') }}" class="card-img-top">
                                    <span class="content">
                                        <h6>Clay Kulhad Set of 6</h6>
                                        <p>₹899.00</p>
                                    </span>
                                </a>
                            </div>
                        </div>
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
                    @if (isset($footer_image))
                        <div id="carouselExampleAutoplayingb" class="my-lg-5 py-lg-5 carousel slide bg-pattern1"
                            data-bs-ride="carousel"
                            style="background-image:url({{ asset('public/pageimages/' . $footer_image->specific_image) }})">
                            <div class="carousel-inner py-lg-5 my-lg-5">
                                @foreach ($sub_categories as $key => $item)
                                    <div class="carousel-item {{$key == 0 ? 'active' : ''}} py-5 my-lg-5">
                                        <img src="{{ asset('public/productsubcategory/' . $item->product_subcategory($item->product_subcategories)->icon_image) }}"
                                            class="img-fluid d-block mx-auto">
                                        <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                            class="img-fluid d-block mx-auto">
                                        <h4>{{$item->name}}</h4>
                                        <h6>{{$item->top_seller->name ?? "Select Top Seller"}}</h6>
                                        <h5>TOP SELLER</h5>
                                    </div>
                                @endforeach
                                <div class="carousel-item py-5 my-lg-5">
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
                    @else
                        <div id="carouselExampleAutoplayingb" class="my-lg-5 py-lg-5 carousel slide bg-pattern"
                            data-bs-ride="carousel">
                            <div class="carousel-inner py-lg-5 my-lg-5">
                                <div class="carousel-item active py-5 my-lg-5">
                                    <img src="{{ asset('public/frontend/images/icon-top.png') }}"
                                        class="img-fluid d-block mx-auto">
                                    <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                        class="img-fluid d-block mx-auto">
                                    <h4>Kala</h4>
                                    <h6>MADHUBANI PAINTING</h6>
                                    <h5>TOP SELLER</h5>
                                </div>
                                <div class="carousel-item py-5 my-lg-5">
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
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
