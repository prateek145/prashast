@extends('frontend.layouts.app')
@section('content')
    <section class="hero-myaccount">
    </section>
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
                    <form class="form searchform d-flex col-12"><input type="text" class=" border-0 form-control"
                            placeholder="Search"><button class="btn border-0 bg-light"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-9 mx-auto">
                <div class="row mt-5">
                    @if (count($products) > 0)
                    @foreach ($products as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                            <div
                                class="card w-100 my-2 shadow-2-strong {{ strtolower($item->product_subcategory($item->product_subcategories)->name) ?? 'maati' }}">
                                <a class="btn-link product-link">
                                    <span class="wishlst">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" onclick="deletewishlist('delete', '{{ $item->sku }}')" class="btn btn-trash"><i class="bi bi-trash"></i></button>
                                            <button type="button" class="btn btn-book" onclick="addtocart('{{ $item->id }}', '{{ $item->sku }}', 'productdetail')""><i class="bi bi-cart"></i></button>
                                        </div>
                                    </span>
                                    <span class="catbox mx-auto">
                                        @if ($item->product_subcategory($item->product_subcategories)->icon_image)
                                            <img src="{{ asset('public/productsubcategory/') . $item->product_subcategory($item->product_subcategories)->icon_image }}"
                                                class="mb-1">
                                        @else
                                            <img src="{{ asset('public/frontend/images/cat-icon.png') }}" class="mb-1">
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
                        <div class="item"> <img src="{{ asset('public/frontend/images/zevar.png') }}"
                                class="img-fluid icon" /> </div>
                        <div class="item"> <img src="{{ asset('public/frontend/images/baans.png') }}"
                                class="img-fluid icon" /> </div>
                        <div class="item"> <img src="{{ asset('public/frontend/images/soot.png') }}"
                                class="img-fluid icon" /> </div>
                        <div class="item"> <img src="{{ asset('public/frontend/images/maati.png') }}"
                                class="img-fluid icon" /> </div>
                        <div class="item"> <img src="{{ asset('public/frontend/images/kala.png') }}"
                                class="img-fluid icon" /> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="category py-5 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mx-auto position-relative">
                    <img src="{{ asset('public/frontend/images/zevar.png') }}" class="img-fluid icon m-grid rounded-4" />
                    <img src="{{ asset('public/frontend/images/baans.png') }}" class="img-fluid icon m-grid rounded-4" />
                    <img src="{{ asset('public/frontend/images/soot.png') }}" class="img-fluid icon m-grid rounded-4" />
                    <img src="{{ asset('public/frontend/images/maati.png') }}" class="img-fluid icon m-grid rounded-4" />
                    <img src="{{ asset('public/frontend/images/kala.png') }}" class="img-fluid icon m-grid rounded-4" />
                </div>
            </div>
        </div>
    </section>
@endsection
