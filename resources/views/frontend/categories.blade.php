@extends('frontend.layouts.app')
{{-- @include('frontend.layouts.header') --}}
@section('content')
    <section id="breadcrumbRow" class="row">
        <h2>Categories</h2>
        <div class="row pageTitle m0">
            <div class="container">
                <h4 class="fleft">Categories</h4>
                <ul class="breadcrumb">
                    <li><a href="{{ route('frontend.home') }}">home</a></li>
                    <li class="active">Categories</li>
                </ul>
            </div>
        </div>
    </section>

<section id="featureCategory" class="row contentRowPad pt-0">
    <div class="container">
        <div class="row m0 sectionTitle">
            {{-- <h3>featured categories</h3> --}}
            {{-- <h5>make easy shop with our categories</h5> --}}
        </div>
        <div class="">
            @foreach ($categories as $item)
            <div class="col-sm-4 product2">
                <div class="row m0 thumbnail">
                    <div class="row m0 imgHov">
                        <a href="{{ route('dynamic.categories', $item->slug) }}">
                        
                            <img src="{{ asset('public/productcategory/' . $item->featured_image) }}" alt="">
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
                        <h5 class="heading"><a href="{{ route('dynamic.categories', $item->slug) }}">{{ $item->name }}</a>
                        </h5>

                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="item">
                <div class="row m0 imgHov">
                    <img src="{{ asset('prashast/images/product/category/17.png') }}" alt="">
                    <div class="row m0 hovArea">
                        <i class="fas fa-heart-o"></i><br>
                        <h4>21 items</h4>
                        <a href="product2.html">shop now</a>
                    </div>
                </div>
                <div class="cat_h">
                    <a href="product2.html">
                        <h4>Lehengas</h4>
                        <span>See the Collection</span>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="row m0 imgHov">
                    <img src="{{ asset('prashast/images/product/category/18.png') }}" alt="">
                    <div class="row m0 hovArea">
                        <i class="fas fa-heart-o"></i><br>
                        <h4>30 items</h4>
                        <a href="product2.html">shop now</a>
                    </div>
                </div>
                <div class="cat_h">
                    <a href="product2.html">
                        <h4>Sarees</h4>
                        <span>See the Collection</span>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="row m0 imgHov">
                    <img src="{{ asset('prashast/images/product/category/19.png') }}" alt="">
                    <div class="row m0 hovArea">
                        <i class="fas fa-heart-o"></i><br>
                        <h4>55 items</h4>
                        <a href="product2.html">shop now</a>
                    </div>
                </div>
                <div class="cat_h">
                    <a href="product2.html">
                        <h4>Dresses</h4>
                        <span>See the Collection</span>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="row m0 imgHov">
                    <img src="{{ asset('prashast/images/product/category/21.png') }}" alt="">
                    <div class="row m0 hovArea">
                        <i class="fas fa-heart-o"></i><br>
                        <h4>21 items</h4>
                        <a href="product2.html">shop now</a>
                    </div>
                </div>
                <div class="cat_h">
                    <a href="product2.html">
                        <h4>Active Wears</h4>
                        <span>See the Collection</span>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</section>

@endsection