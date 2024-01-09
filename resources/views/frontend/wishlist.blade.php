@extends('frontend.layouts.app')
@section('content')
    <style>
        .line:hover {
            border: 4px dashed #f0b53f !important;
        }
    </style>
    @if ($page_image)
        <section class="hero1" style="background-image:url({{ asset('public/pageimages/' . $page_image->images) }})">
        </section>
    @else
        <section class="hero-myaccount">
        </section>
    @endif

    <section class="contact py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto text-center">
                    <img src="{{ asset('public/frontend/images/hearticon.png') }}" class="d-block mx-auto">
                    <img src="{{ asset('public/frontend/images/line_separator_01.png') }}" class="mx-auto">
                    <br>
                    <br>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 mx-auto text-center">
                    <a href="{{ route('my.account') }}" class="btn nav-primary d-inline-block mx-2">Profile</a>
                    <a href="{{ route('wishlist') }}" class="btn btn-primary d-inline-block mx-2">Wishlist</a>
                    <a href="{{ route('orders.page') }}" class="btn nav-link d-inline-block mx-2">Orders</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mx-auto text-center mt-5">
                    <input type="text" class=" border-0 form-control"
                            placeholder="Search" name="wishlist_search" ><button class="btn border-0 bg-light" onclick="search_product(event)"><i class="bi bi-search"></i></button>
                 
                </div>
            </div>
            <div class="col-9 mx-auto">
                <div class="row mt-5">
                    @if (count($products) > 0)
                        @foreach ($products as $item)
                            <div class="col-lg-4 col-md-12 col-sm-12 col-12 d-flex {{' ' . str_replace(' ', '',$item->name) . ' '}} search_product">
                                <div
                                    class="line card w-100 my-2 shadow-2-strong {{ strtolower($item->product_subcategory($item->product_subcategories)->name) == 'kala' ? 'zevar' : strtolower($item->product_subcategory($item->product_subcategories)->name) }}">
                                    <a class="btn-link product-link">
                                        <span class="wishlst">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button"
                                                    onclick="deletewishlist('delete', '{{ $item->id }}')"
                                                    class="btn btn-trash"><i class="bi bi-trash"></i></button>
                                                <button type="button" class="btn btn-book"
                                                    onclick="addtocart('{{ $item->id }}', '{{ $item->sku }}', 'productdetail')""><i
                                                        class="bi bi-cart"></i></button>
                                            </div>
                                        </span>
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
                                            <p>₹{{ $item->sale_price }}</p>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h2 style="margin: auto">Select Products From Shop.</h2>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="category py-5 d-lg-none d-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel cate">
                        @foreach ($sub_categories as $item)
                            <a href="{{ url('dynamic-subcategory/' . $item->slug . '/category') }}">
                                <img src="{{ asset('public/productsubcategory/' . $item->featured_image) }}"
                                    class="img-fluid icon" />
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="category py-5 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mx-auto position-relative">
                    @foreach ($sub_categories as $item)
                        <a href="{{ url('dynamic-subcategory/' . $item->slug . '/category') }}"><img
                                src="{{ asset('public/productsubcategory/' . $item->featured_image) }}"
                                class="img-fluid icon m-grid rounded-4" /></a>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <script>
        function search_product(event){
            // console.log(value);
            event.preventDefault();
            var value = document.getElementsByName('wishlist_search')[0].value;
            var text = value.replaceAll(' ', '');
            var products = document.getElementsByClassName('search_product');
            // console.log(products);
            for (let index = 0; index < products.length; index++) {
                console.log(products[index].classList.contains(text));
                if (products[index].classList.contains(text)) {
                    products[index].classList.add('d-block');
                    
                } else {
                    products[index].classList.add('d-none');
                }
                
            }
        }
    </script>
@endsection
