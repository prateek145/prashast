@extends('frontend.layouts.app')
@section('content')
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
                    <a href="{{ route('my.account') }}" class="btn nav-link d-inline-block mx-2">Profile</a>
                    <a href="{{ route('wishlist') }}" class="btn nav-link d-inline-block mx-2">Wishlist</a>
                    <a href="{{ route('orders.page') }}" class="btn btn-primary d-inline-block mx-2">Orders</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mx-auto text-center mt-5">
                    {{-- <form class="form searchform d-flex col-12"> --}}
                    <input type="text" class=" border-0 form-control" name="order_search" placeholder="Search" ><button class="btn border-0 bg-light" onclick="search_product(event)"><i class="bi bi-search"></i></button>
                    {{-- <select class="mx-1 form-select form-control border-0">
                            <option>Past Week</option>
                        </select> --}}
                    {{-- </form> --}}
                </div>
            </div>
            <div class="col-lg-9 col-12 pt-5 mx-auto">

                @foreach ($orders as $item)
                    <div class="card border-0 mb-5 {{ ' ' . str_replace(' ', '', $item->order_id) . ' ' }} search_order">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <h6 class="yellow"> {{ $item->order_id }}</h6>
                            </div>
                            {{-- <div class="col-12 col-lg-6 float-end">
                                <h6 class="yellow  float-end">TRACK</h6>
                            </div> --}}
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-2">order placed<br>
                                <strong>{{ $item->created_at->format('d-m-y') }}</strong>
                            </div>
                            <div class="col-lg-2">Ship to V<br>
                                <strong>{{ $item->shipping_address ?? $item->billing_address }}</strong>
                            </div>
                            <div class="col-lg-2">Bill to V<br>
                                <strong>{{ $item->billing_address ?? '' }}</strong>
                            </div>
                            <div class="col-lg-2">Total<br>
                                <strong>Rs. {{ $item->amount }}</strong>
                            </div>
                            <div class="col-lg-4">
                                <a href="{{ route('download.bill', $item->order_id) }}" target="_blank">
                                    <button type="button" class="btn float-end" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Download Invoice">
                                        <strong><i class="bi bi-download"></i></strong>
                                    </button>
                                </a>
                            </div>
                        </div>
                        @php
                            $order_deatails = json_decode($item->product_details);
                            // dd($order_deatails);
                        @endphp

                        @foreach ($order_deatails as $item1 => $value)
                            {{-- {{dd($item1, $value, $value->image)}} --}}
                            @php
                                $product = App\Models\backend\Product::find($value->id);
                            @endphp
                            @if ($product)
                            <div class="row mt-5">
                                <div class="col-12 col-lg-2 align-self-center">
                                    <h6>{{ $count++ }}</h6>
                                    <img src="{{ asset('public/' . $value->image ?? '') }}" class="img-fluid">
                                </div>
                                <div class="col-12 col-lg-4 align-self-center">
                                    <h3>{{ $value->name ?? '' }}</h3>
                                    {{-- <p><strong>Secondary product title</strong></p> --}}
                                    <p>Quantity: {{ $value->qty ?? '' }}</p>
                                    <p>Rs. {{ $value->price ?? '' }}</p>

                                    <div>
                                        <p><strong>Payment method</strong></p>
                                        <p>Online</p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 align-self-center">
                                    <a class="btn btn-secondary float-end"
                                        href="{{ route('product.detail', $product->slug) }}">Buy Again</a>
                                </div>
                            </div>
                                
                            @else
                                <h3>Product Deleted</h3>
                            @endif
                        @endforeach

                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="category py-5 d-lg-none d-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel cate">
                        @foreach ($sub_categories as $item)
                            <a href="{{ route('dynamic.categories', $item->name) }}"><img
                                    src="{{ asset('public/productsubcategory/' . $item->featured_image) }}"
                                    class="img-fluid icon m-grid rounded-4" /></a>
                        @endforeach
                        {{-- <div class="item"> <img src="{{asset('public/frontend/images/baans.png')}}" class="img-fluid icon" /> </div>
                        <div class="item"> <img src="{{asset('public/frontend/images/soot.png')}}" class="img-fluid icon" /> </div>
                        <div class="item"> <img src="{{asset('public/frontend/images/maati.png')}}" class="img-fluid icon" /> </div>
                        <div class="item"> <img src="{{asset('public/frontend/images/kala.png')}}" class="img-fluid icon" /> </div> --}}
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
                        <a href="{{ route('dynamic.categories', $item->name) }}"><img
                                src="{{ asset('public/productsubcategory/' . $item->featured_image) }}"
                                class="img-fluid icon m-grid rounded-4" /></a>
                    @endforeach
                    {{-- <img src="{{asset('public/frontend/images/baans.png')}}" class="img-fluid icon m-grid rounded-4" />
                    <img src="{{asset('public/frontend/images/soot.png')}}" class="img-fluid icon m-grid rounded-4" />
                    <img src="{{asset('public/frontend/images/maati.png')}}" class="img-fluid icon m-grid rounded-4" />
                    <img src="{{asset('public/frontend/images/kala.png')}}" class="img-fluid icon m-grid rounded-4" /> --}}
                </div>
            </div>
        </div>
    </section>


    <script>
        function search_product(event) {
            // console.log(value);
            event.preventDefault();
            var value = document.getElementsByName('order_search')[0].value;
            var text = value;
            var products = document.getElementsByClassName('search_order');
            // console.log(products, text, value);
            for (let index = 0; index < products.length; index++) {
                // console.log(products[index].classList.contains(text));
                if (products[index].classList.contains(text)) {
                    products[index].classList.add('d-block');
                } else {
                    products[index].classList.add('d-none');
                }

            }
        }
    </script>
@endsection
