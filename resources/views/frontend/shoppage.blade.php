@extends('frontend.layouts.app')
{{-- @include('frontend.layouts.header') --}}
@section('content')
    <section id="breadcrumbRow" class="row">
        <h2>Product Page</h2>
        <div class="row pageTitle m0">
            <div class="container">
                <h4 class="fleft">Products</h4>
                <ul class="breadcrumb">
                    <li><a href="{{ route('frontend.home') }}">home</a></li>
                </ul>
            </div>
        </div>
    </section>


    {{-- <section id="breadcrumbRow" class="row">
        <h2>product page</h2>
        <div class="row pageTitle m0">
            <div class="container">
                <h4 class="fleft">product page</h4>
                <ul class="breadcrumb">
                    <li><a href="index.html">home</a></li>
                    <li class="active">product page</li>
                </ul>
            </div>
        </div>
    </section> --}}

    <section class="row contentRowPad ">
        <div class="container">
            <div class="row">
                @foreach ($products as $item)
                    <div class="col-sm-3 product">
                        <div class="productInner row m0">
                            <div class="row m0 imgHov">
                                @php
                                    $images = json_decode($item->featured_image);
                                @endphp
                                <a href="{{ route('product.detail', $item->slug) }}"><img src="{{ asset('product/' . $images[0]) }}" alt=""></a> 

                                <div class="row m0 hovArea">
                                    <a href="{{ route('product.detail', $item->slug) }}"><img src="{{ asset('product/' . $images[0]) }}" alt=""></a> 
                                    {{-- <div class="row m0 icons">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fas fa-shopping-cart-alt"></i></a></li>
                                            <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="row m0 proType"><a href="#">Baccarat</a></div>
                                    <div class="row m0 proRating">
                                        <i class="fas fa-star-o"></i>
                                        <i class="fas fa-star-o"></i>
                                        <i class="fas fa-star-o"></i>
                                        <i class="fas fa-star-o"></i>
                                        <i class="fas fa-star-o"></i>
                                    </div> --}}
                                    <div class="row m0 proPrice"><i class="fas fa-usd"></i>₹
                                        {{ $item->regular_price }}
                                    </div>
                                </div>
                            </div>
                            <div class="row m0 proName"><a
                                    href="{{ route('product.detail', $item->slug) }}">{{ $item->name }}</a></div>
                            <div class="row m0 proBuyBtn">
                                @if ($item->product_type == 'simple_product')
                                    <button class="addToCart btn"
                                        onclick="addtocart('{{ $item->id }}', '{{ $item->sku }}')">add to
                                        cart</button>
                                @endif

                                @if ($item->product_type == 'variable_product')
                                    @php
                                        $variance = App\Models\backend\ProductVariance::where(['product_id' => $item->id])->first();
                                        // dd($variance);
                                    @endphp
                                    <button class="addToCart btn"
                                        onclick="addtocart('{{ $item->id }}', '{{ $variance->sku }}')">add to
                                        cart</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
