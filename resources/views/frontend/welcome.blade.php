@extends('frontend.layouts.app')
{{-- @include('frontend.layouts.top-header') --}}
@section('content')
    {{-- @include('frontend.layouts.slider') --}}
    @if ($home_slider)
        @php
            $images = json_decode($home_slider->images);
            $links = json_decode($home_slider->links);
        @endphp
        <section class="slider-top">
            <div class="row" style=" --bs-gutter-x: 0;">
                <div class="col-12">
                    <div id="carouselExampleAutoplayingoffer" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($images as $key => $value)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <a href="{{ $links[$key] ?? '#' }}">
                                        <img src="{{ asset('public/homeslider/' . $value) }}" class="d-block w-100"
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
    <section class="about py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('public/frontend/images/line_separator_01.png') }}" class="my-5">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="maintext">Prashast is a proud aggregator of sustainable and artisanal handicraft products
                        sourced from the makers from Indian rural and tribal areas, promoting traditional and contemporary
                        crafts. While Prashast as a brand has a larger focus and purpose around handicraft manufacturing,
                        e-commerce promotion & management, dealing in farm & non farm products, training & consultancy, this
                        website is the one-stop shop for all the products under the banner.</p>
                    <a href="{{ route('frontend.about') }}" class="btn btn-primary shadow">Know More</a>
                </div>
            </div>
        </div>
    </section>
    <section class="featured py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4  text-center py-3 order-2 order-lg-1">
                    <div class=" topsell" style="padding:20px !important;">
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($top_products as $key => $item)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }} text-center">
                                        @if ($item->product_subcategory($item->product_subcategories)->icon_image)
                                            <img src="{{ asset('public/productsubcategory/' . $item->product_subcategory($item->product_subcategories)->icon_image) }}"
                                                class="img-fluid d-block mx-auto">
                                        @else
                                            <img src="{{ asset('public/frontend/images/icon-top.png') }}"
                                                class="img-fluid d-block mx-auto">
                                        @endif
                                        <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                            class="img-fluid d-block mx-auto">
                                        <p>TOP SELLER</p>
                                        <img src="{{ asset('public/product/' . $item->image) }}" class="d-block w-100"
                                            alt="...">
                                        <h6>{{ $item->name }}</h6>
                                        <a href="{{ route('product.detail', $item->slug) }}"
                                            class="btn btn-secondary">Shop</a>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev"
                                style="top:0 !important; left:0px !important">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next"
                                style="top:0 !important;">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 text-center py-3 order-3 order-lg-2">
                    <div class="newcol" style="padding:20px !important;">
                        <div id="carouselExampleAutoplayinga" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($new_products as $key => $item)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }} text-center">
                                        @if ($item->product_subcategory($item->product_subcategories)->icon_image)
                                            <img src="{{ asset('public/productsubcategory/' . $item->product_subcategory($item->product_subcategories)->icon_image) }}"
                                                class="img-fluid d-block mx-auto">
                                        @else
                                            <img src="{{ asset('public/frontend/images/icon-top.png') }}"
                                                class="img-fluid d-block mx-auto">
                                        @endif
                                        <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                            class="img-fluid d-block mx-auto">
                                        <p>NEW COLLECTION</p>
                                        <img src="{{ asset('public/product/' . $item->image) }}" class="d-block w-100"
                                            alt="...">
                                        <h6>{{ $item->name }}</h6>
                                        <a href="{{ route('product.detail', $item->slug) }}"
                                            class="btn btn-secondary">Shop</a>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplayinga" data-bs-slide="prev"
                                style="top:0 !important;left:0px !important">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplayinga" data-bs-slide="next"
                                style="top:0 !important;">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center py-3 order-1 order-lg-3">
                    <div class="collectixon">
                        <img src="{{ asset('public/frontend/images/collections.png') }}" class="img-fluid" />
                    </div>
                </div>
                <!--<div class="col-lg-4 text-center py-3 order-1 order-lg-3">
                                                                                    <div class="collection" style="background: url('dynamic/public/frontend/images/collections.png); background-size: cover; height: 100vh;"></div>
                                                                                </div>-->
            </div>
        </div>
    </section>

    <section class="category d-lg-none d-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel cate">
                        @foreach ($categories as $item)
                            <a href="{{ route('dynamic.categories', $item->slug) }}">
                                <img src="{{ asset('public/productsubcategory/' . $item->featured_image) }}"
                                    class="img-fluid icon" />
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="category d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mx-auto position-relative">
                    @foreach ($categories as $item)
                        <a href="{{ route('dynamic.categories', $item->slug) }}"><img
                                src="{{ asset('public/productsubcategory/' . $item->featured_image) }}"
                                class="img-fluid icon m-grid rounded-4" /></a>
                    @endforeach

                </div>
            </div>

        </div>
    </section>
    <section class="mostviewed text-white text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (isset($footer_image))
                        <div id="carouselExampleAutoplayingb" class="my-lg-2 py-lg-2 carousel slide bg-pattern1"
                            data-bs-ride="carousel">
                            <div class="carousel-inner py-lg-2 my-lg-2">
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
                        <div id="carouselExampleAutoplayingb" class="my-lg-2 py-lg-2 carousel slide "
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
                                <div class="carousel-item py-2 my-lg-2">
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
    <section class="about py-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('public/frontend/images/line_separator_01.png') }}" class="my-5">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="maintext">Each of the products are crafted with love, and affection- meticulously<br>
                        and intricately crafted into a unqiue traditional piece.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-3 text-center"></div>
                <div class="col-12 col-lg-2 text-center position-relative fact-height">
                    <div class="fact-box">
                        <h1 class="yellow facts">500+</h1>
                        <p>artisans helped</p>
                    </div>
                </div>
                <div class="col-12 col-lg-2 text-center position-relative fact-height">
                    <div class="fact-box">
                        <h1 class="yellow facts">10+</h1>
                        <p>cities reached</p>
                    </div>
                </div>
                <div class="col-12 col-lg-2 text-center position-relative fact-height">
                    <div class="fact-box">
                        <h1 class="yellow facts">250+</h1>
                        <p>products sold</p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 text-center"></div>
            </div>
        </div>
    </section>
    <section class="about py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="video">VOICES<br>
                        <em>from the</em><br>
                        FIELD
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 videoplayer mt-5">
                    <iframe width="100%" src="https://www.youtube.com/embed/6d0n1G-vcRM?si=vk6-iWBfJQ15Txws"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>


    @if ($campaign_offer->status == 1)
    <div class="modal fade show" id="campaignOffer" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true" style=display:block;>
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h1 class="modal-title fs-5" id="exampleModalLabel">Campaign Offer</h1>
                   <button type="button" class="btn-close" onclick="campaignOffer()" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   {!! $campaign_offer->description !!}
               </div>
           </div>
       </div>
   </div>
    @else
    <div class="modal fade" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h1 class="modal-title fs-5" id="exampleModalLabel">Campaign Offer</h1>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   {!! $campaign_offer->description !!}
               </div>
           </div>
       </div>
   </div>
    @endif



    <script>
        function switchactive(id) {
            console.log(id);
            var upper = document.getElementsByClassName('switchactive' + id)[0];
            var lower = document.getElementsByClassName('switchactive1' + id)[0];

        }

        function campaignOffer(){
           var campaignOffer =  document.getElementById('campaignOffer');
           campaignOffer.style.display = 'none';
        }
    </script>
@endsection
