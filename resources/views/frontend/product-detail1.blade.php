@extends('frontend.layouts.app')
@section('content')
    <section class="shop py-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-12 float-end">
                    <p class="float-end"><strong>Products /
                            {{ $product->product_subcategory($product->product_subcategories)->name ?? '' }} /
                            {{ $product->name ?? '' }}</strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-auto">
                    <div id="carouselExampleIndicatorsf" class="carousel slide d-flex">
                        <div class="carousel-indicators">

                            @foreach (json_decode($product->featured_image) as $key => $item)
                                <button type="button" data-bs-target="#carouselExampleIndicatorsf"
                                    data-bs-slide-to="{{ $key }}" class="active" aria-current="true"
                                    aria-label="Slide {{ $key + 1 }}"><img src="{{ asset('public/product/' . $item) }}"
                                        class="d-block" style="width:100px" alt=""></button>
                            @endforeach

              
                        </div>
                        <div class="carousel-inner">
                            {{-- <div class="carousel-item active">
                                <img src="{{ asset('public/frontend/images/03.png') }}" class="d-block" alt="">
                            </div> --}}
                            
                            @foreach (json_decode($product->featured_image) as $key => $item)
                            {{-- {{dd($key)}} --}}
                                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                    <img src="{{ asset('public/product/' . $item) }}" class="d-block" alt="">
                                </div>
                            @endforeach
         

                        </div>
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
                        $pro = \App\Models\wishlist::where(['product_id' => $product->id, 'user_id' => auth()->id()])->first();
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
                        <span class="qntbox float-start">
                            Quantity <input type="number" name="qty" min="1" value="1" id="input_quantity"
                                class="form-control" />
                        </span>

                        <span class="d-flex w-100 justify-content-end">
                            <a class="btn btn-primary float-end  mx-4 shadow"
                                onclick="addtocart('{{ $product->id }}', '{{ $product->sku }}', 'productdetail')">Add to
                                Cart</a> &nbsp; <a href="#" class="btn btn-secondary float-end shadow text-dark"
                                onclick="addtowishlist('{{ $product->id }}', '{{ $product->sku }}', 'productdetail')">Buy
                                Now</a>
                        </span>

                </div>
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
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                                <div
                                    class="card w-100 my-2 shadow-2-strong {{ strtolower($item->product_subcategory($item->product_subcategories)->name) ?? 'maati' }}">
                                    <a href="{{ route('product.detail', $item->slug) }}" class="btn-link product-link">
                                        <span class="wish">
                                            <button
                                                onclick="addtowishlist('{{ $item->id }}', '{{ $item->sku }}', 'productdetail')"
                                                type="button" class="btn wishlist-btn" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Wishlist">
                                                @php
                                                    $pro = \App\Models\wishlist::where(['product_id' => $item->id, 'user_id' => auth()->id()])->first();
                                                @endphp
                                                @if ($pro)
                                                    <i class="bi bi-heart-fill"></i>
                                                @else
                                                    <i class="bi bi-heart"></i>
                                                @endif
                                            </button>
                                        </span>
                                        <span class="catbox mx-auto">
                                            <img src="{{ asset('public/productsubcategory/' . $item->product_subcategory($item->product_subcategories)->icon_image) }}"
                                                class="img-fluid d-block mx-auto" />
                                            <p>New Collection</p>
                                        </span>
                                        <img src="{{ asset('public/product/' . $item->image) }}" height="250"
                                            width="250" class="card-img-top" />
                                        <span class="content">
                                            <h6>{{ $item->name }}</h6>
                                            <p>₹{{ $item->sale_price }}</p>
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
                    <div id="carouselExampleAutoplayingb" class="my-5 py-5 carousel slide bg-pattern"
                        data-bs-ride="carousel">
                        <div class="carousel-inner py-5 my-5">
                            <div class="carousel-item active">
                                <img src="" class="icon" />
                                <hr class="divider">
                                <h4>Category Name</h4>
                                <h6>Madubani Painting</h6>
                                <h5>MOST VIEWED</h5>
                            </div>
                            <div class="carousel-item">
                                <img src="" class="icon" />
                                <hr class="divider">
                                <h4>Category Name</h4>
                                <h6>Madubani Painting</h6>
                                <h5>MOST VIEWED</h5>
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
