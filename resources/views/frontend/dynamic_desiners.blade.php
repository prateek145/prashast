@extends('frontend.layouts.app')
{{-- @include('frontend.layouts.header') --}}
@section('content')
    <section id="breadcrumbRow" class="row">
        <h2>{{ $desiner->name }}</h2>
        <div class="row pageTitle m0">
            <div class="container">
                <h4 class="fleft">{{ $desiner->name }}</h4>
                <ul class="breadcrumb">
                    <li><a href="{{ route('frontend.home') }}">home</a></li>
                    <li class="active">{{ $desiner->name }}</li>
                </ul>
            </div>
        </div>
    </section>

    {{-- <section id="featureCategory" class="row contentRowPad pt-0">
        <div class="container-fluid">
            <div class="row m0 sectionTitle">
                <h3>our featured categories</h3>
                <h5>make easy shop with our categories</h5>
            </div>
            <div class="owl-carousel featureCats row m0">
                @foreach ($subcategories as $item)
                    <div class="item">
                        <div class="row m0 imgHov">
                            <img src="{{ asset('public/productsubcategory/' . $item->featured_image) }}" alt="">
                            <div class="row m0 hovArea">
                                <i class="fas fa-heart-o"></i><br>
                                
                                <a href="{{ route('dynamic.subcategories', $item->slug) }}">shop now</a>
                            </div>
                        </div>
                        <div class="cat_h">
                            <a href="{{ route('dynamic.subcategories', $item->slug) }}">
                                <h4>{{ $item->name }}</h4>
                                <span>{!! $item->description !!}</span>
                            </a>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section> --}}

    <section class="row contentRowPad ">
        <div class="container">
            <div class="row">

                @foreach ($products as $item)
                    <div class="col-sm-4 product2">
                        <div class="row m0 thumbnail">
                            <div class="row m0 imgHov">
                                @php
                                    $images = json_decode($item->featured_image);
                                    // dd($images);
                                @endphp
                                <img src="{{ asset('product/' . $images[0]) }}" alt="">
                                <div class="hovArea row m0">
                                    <div class="links row m0">
                                        <a href="single-product.html"><i class="fas fa-link"></i></a>
                                        <a class="lightbox" href="{{ asset('product/' . $images[0]) }}"
                                            data-lightbox="product1" data-title="Maximus quam posuere"><i
                                                class="fas fa-expand"></i></a>
                                    </div>
                                    <div class="row m0 getlike">
                                        <a href="#" class="fleft"><i class="fas fa-shopping-cart"></i> Add to
                                            cart</a>


                                    </div>
                                </div>
                            </div>
                            <div class="row m0 productIntro">
                                <h5 class="heading"><a
                                        href="{{ route('product.detail', $item->slug) }}">{{ $item->name }}</a>
                                    @if ($item->sale_price)
                                        <span><del>₹{{ $item->regular_price }}</del> ₹{{ $item->sale_price }}</span>
                                    @else
                                        <span>₹{{ $item->regular_price }}</span>
                                    @endif
                                </h5>
                                <h5 class="proCat">{{ $item->productcategory()->first()->name }}</h5>

                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>

@endsection
