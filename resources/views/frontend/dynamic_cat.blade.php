@extends('frontend.layouts.app')
{{-- @include('frontend.layouts.header') --}}
@section('content')
    <section id="breadcrumbRow" class="row">
        <h2>{{ $cat->name }}</h2>
        <div class="row pageTitle m0">
            <div class="container">
                <h4 class="fleft">{{ $cat->name }}</h4>
                <ul class="breadcrumb">
                    <li><a href="{{ route('frontend.home') }}">home</a></li>
                    <li class="active">{{ $cat->name }}</li>
                </ul>
            </div>
        </div>
    </section>

    <section id="featureCategory" class="row contentRowPad pt-0">
        <div class="container">
            <div class="row m0 sectionTitle">
                <h3>our featured categories</h3>
                {{-- <h5>make easy shop with our categories</h5> --}}
            </div>
            @foreach ($subcategories as $item)
                <div class="col-sm-4 product2">
                    <div class="row m0 thumbnail">
                        <div class="row m0 imgHov">
                            <a href="{{ route('dynamic.subcategories', $item->slug) }}">
                            
                                <img src="{{ asset('public/productsubcategory/' . $item->featured_image) }}" alt="">
                            </a> 
                            <div class="hovArea row m0">
                                {{-- <div class="links row m0">
                                    <a href="single-product.html"><i class="fas fa-link"></i></a>
                                    <a class="lightbox" href="images/product/pro2p/saree.jpg" data-lightbox="product2"
                                        data-title="Donec aliquam"><i class="fas fa-expand"></i></a>
                                </div> --}}
                                {{-- <div class="row m0 getlike">
                                    <a href="#" class="fleft"><i class="fas fa-shopping-cart"></i> Add to cart</a>


                                </div> --}}
                            </div>
                        </div>
                        <div class="row m0 productIntro">
                            <h5 class="heading"><a href="{{ route('dynamic.subcategories', $item->slug) }}">{{ $item->name }}</a>
                            </h5>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- <div class="item">
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
               
            </a>
        </div>
    </div> --}}
@endsection
