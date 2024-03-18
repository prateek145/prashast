@extends('frontend.layouts.app')
@section('content')
    <style>
        /* CSS */
        #sync1 {
            .item {
                background: #0c83e7;
                padding: 80px 0px;
                margin: 5px;
                color: #FFF;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
                text-align: center;
            }
        }

        #sync2 {
            .item {
                background: #C9C9C9;
                padding: 10px 0px;
                margin: 5px;
                color: #FFF;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
                text-align: center;
                cursor: pointer;

                h1 {
                    font-size: 18px;
                }
            }

            .current .item {
                background: #0c83e7;
            }
        }



        .owl-theme {
            .owl-nav {

                /*default owl-theme theme reset .disabled:hover links */
                [class*='owl-'] {
                    transition: all .3s ease;

                    &.disabled:hover {
                        background-color: #D6D6D6;
                    }
                }

            }
        }


        #sync1.owl-theme {
            position: relative;

            .owl-next,
            .owl-prev {
                width: 22px;
                height: 40px;
                margin-top: -20px;
                position: absolute;
                top: 50%;
            }

            .owl-prev {
                left: 10px;
            }

            .owl-next {
                right: 10px;
            }
        }
    </style>
    <section class="shop py-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-12 float-end">
                    <p class="float-end"><strong> <a href="{{ route('shop.page') }}" style="color: #6e6e6e;">Products</a> /
                            <a href="{{ route('dynamic.categories', $product->product_subcategory($product->product_subcategories)->name ?? '') }}"
                                style="color: #6e6e6e;">{{ $product->product_subcategory($product->product_subcategories)->name ?? '' }}</a>
                            /
                            {{ $product->name ?? '' }}</strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-auto">

                    <div id="sync1" class="owl-carousel owl-theme">

                        @foreach (array_reverse(json_decode($product->featured_image)) as $key => $item)
                            <div class="item">
                                <img src="{{ asset('public/product/' . $item) }}" alt="">
                            </div>
                        @endforeach
                    </div>

                    <div id="sync2" class="owl-carousel owl-theme">
                        @foreach (array_reverse(json_decode($product->featured_image)) as $key => $item)
                            <div class="item">
                                <img src="{{ asset('public/product/' . $item) }}" alt="">
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-lg-7  mt-5 mt-lg-auto">

                    @if ($product->product_subcategory($product->product_subcategories)->name)
                        <img src="{{ asset('public/productsubcategory/' . $product->product_subcategory($product->product_subcategories)->dark_icon) }}"
                            class="d-block kulhad-icon">
                    @else
                        <img src="{{ asset('public/frontend/images/cat-icon-dark.png') }}" class="d-block kulhad-icon">
                    @endif
                    <img src="{{ asset('public/frontend/images/line_separator_01.png') }}">
                    <h6>New Collection</h6>
                    @php
                        $pro = \App\Models\wishlist::where([
                            'product_id' => $product->id,
                            'user_id' => auth()->id(),
                        ])->first();
                    @endphp

                    @if ($pro)
                        <button class="btn btn-link wishlist-link  p-0"
                            onclick="addtowishlist('{{ $product->id }}', '{{ $product->sku }}', 'productdetail')">Wishlist
                            <i class="bi bi-heart-fill"></i></button>
                    @else
                        <button class="btn btn-link wishlist-link  p-0"
                            onclick="addtowishlist('{{ $product->id }}', '{{ $product->sku }}', 'productdetail')">Wishlist
                            <i class="bi bi-heart"></i></button>
                    @endif

                    <h1>{{ $product->name }}</h1>
                    <p>{!! $product->description !!}</h3>
                    <h3>₹{{ $product->sale_price }}</h3>

                    <span class="qntbox float-start">
                        Quantity <input type="number" name="qty" min="1" value="1" id="input_quantity"
                            class="form-control mb-4" />

                    </span>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <span class="d-flex w-100 justify-content-end">
                        <a class="btn btn-primary float-end  mx-4 shadow"
                            onclick="addtocart('{{ $product->id }}', '{{ $product->sku }}', 'productdetail')">Add to
                            Cart</a> &nbsp; <a href="#" onclick="form_submit({{ $product->id }})"
                            class="btn btn-secondary float-end shadow text-dark">Buy
                            Now</a>
                    </span>

                </div>

                @if ($product->specification)
                    <div class="col-md-12 mt-5">
                        <h3>Specifications</h3>
                        {!! $product->specification !!}
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section class="Suggested">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <header>
                        <h3>Suggested Product</h3>
                    </header>

                    <div class="row">
                        @foreach ($latestproduct as $item)
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 d-flex">
                                <div class="card w-100 my-2 shadow-2-strong border border-0 ">
                                    <a href="{{ route('product.detail', $item->slug) }}" class="btn-link product-link">
                                        @if ($item->image)
                                            <img src="{{ asset('public/product/' . $item->image) }}" class="card-img-top">
                                        @else
                                            <img src="https://omegastaging.com.au/jbm/wp-content/uploads/2024/02/Madhubani-2-9.jpg"
                                                class="card-img-top">
                                        @endif

                                        <span class="content ">
                                            <h6 class="text-black mt-3" style="color:black !important">{{ $item->name }}
                                            </h6>
                                            <p class="text-black" style="color:black !important">₹{{ $item->sale_price }}
                                            </p>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr />
                </div>
            </div>
        </div>
    </section>
    <section class="mostviewed text-white text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (isset($footer_image))
                        <div id="carouselExampleAutoplayingb" class="my-lg-1 py-lg-1 carousel slide bg-pattern1"
                            data-bs-ride="carousel">
                            <div class="carousel-inner py-lg-5 my-lg-5">
                                @foreach ($sub_categories as $key => $item)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }} py-1 my-lg-1">
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
