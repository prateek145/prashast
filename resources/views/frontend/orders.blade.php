@extends('frontend.layouts.app')
{{-- @include('frontend.layouts.header') --}}

@section('content')
    {{-- <section id="breadcrumbRow" class="row">
        <h2>Orders</h2>
      
        <div class="row pageTitle m0">
            <div class="container">
                <h4 class="fleft">order</h4>
                <ul class="breadcrumb">
                    <li><a href="{{ route('frontend.home') }}">home</a></li>

                    <li class="active">order</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="row contentRowPad">
        <div class="container">
            <div class=" cartPage">
           
                <div class="table-responsive cartTable row m0">
                    @foreach ($orders as $item1)
                        <table class="table">
                            @php
                                $perorder = json_decode($item1->product_details);
                     
                            @endphp
                            <h4> Order ID : {{ $item1->order_id }}</h4>
                            <h4>Total Amount : {{ $item1->amount }}</h4>
                            For Download Bill <a href="download-bill/{{$item1->order_id}}"> Click here</a>
                            <thead>
                                <tr>
                                    <th class="productName">Product name</th>
                                    <th>Sku</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            @foreach ($perorder as $item)
                                <tbody>
                                    <tr class="alert" role="alert">
                                       
                                        <td class="productName">
                                            <h6 class="heading">{{ $item->name }}</h6>
                                        </td>
                                        <td>{{ $item->sku }}</td>
                                        <td class="price">{{ $item->pprice }}</td>
                                        <td>
                                            <p>{{ $item->pqty }}</p>
                                        </td>
                                        <td class="price">{{ $item->pprice * $item->pqty }} </td>
                                    </tr>
                                </tbody>
                            @endforeach
                    @endforeach

                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <a href="{{ url('/') }}" class="btn btn-primary btn-lg">continue shopping</a>
                            </td>
                        </tr>
                    </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section> --}}

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
                    <a href="{{ route('my.account') }}" class="btn nav-link d-inline-block mx-2">Profile</a>
                    <a href="{{ route('wishlist') }}" class="btn nav-link d-inline-block mx-2">Wishlist</a>
                    <a href="{{ route('orders.page') }}" class="btn btn-primary d-inline-block mx-2">Orders</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mx-auto text-center mt-5">
                    <form class="form searchform d-flex col-12"><input type="text" class=" border-0 form-control"
                            placeholder="Search"><button class="btn border-0 bg-light"><i class="bi bi-search"></i></button>
                        <select class="mx-1 form-select form-control border-0">
                            <option>Past Week</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="col-lg-9 col-12 pt-5 mx-auto">

                @foreach ($orders as $item)
                <div class="card border-0 mb-5">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <h6 class="yellow">ORDER {{$item->order_id}}</h6>
                        </div>
                        <div class="col-12 col-lg-6 float-end">
                            <h6 class="yellow  float-end">TRACK</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2">order placed<br>
                            <strong>October 19, 2023</strong>
                        </div>
                        <div class="col-lg-2">Ship to V<br>
                            <strong>C 98, Ground F...</strong>
                        </div>
                        <div class="col-lg-2">Bill to V<br>
                            <strong>C 98, Ground F...</strong>
                        </div>
                        <div class="col-lg-2">Total<br>
                            <strong>Rs. 26,309.00</strong>
                        </div>
                        <div class="col-lg-4">
                            <button type="button" class="btn float-end" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="Download Invoice">
                                <strong><i class="bi bi-download"></i></strong>
                            </button>
                        </div>
                    </div>
                    @php
                        $order_deatails = json_decode($item->product_details);
                    @endphp

                    @foreach ($order_deatails as $item1 => $value)
                    <div class="row mt-5">
                        <div class="col-12 col-lg-2 align-self-center">
                            <h6>1.</h6>
                            <img src="{{ asset('public/frontend/' . $value->image) }}" class="img-fluid">
                        </div>
                        <div class="col-12 col-lg-4 align-self-center">
                            <h3>{{$value->name}}</h3>
                            {{-- <p><strong>Secondary product title</strong></p> --}}
                            <p>Quantity: testing</p>
                            <p>Rs. testing.00</p>

                            <div>
                                <p><strong>Payment method 1.</strong></p>
                                <p>xxxx xxxx xxxx xxxx</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 align-self-center">
                            <a class="btn btn-secondary float-end" href="#">Buy Again</a>
                        </div>
                    </div>
                        
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
                            <a href="{{ route('dynamic.subcategories', $item->slug) }}"><img
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
                        <a href="{{ route('dynamic.subcategories', $item->slug) }}"><img
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
@endsection
