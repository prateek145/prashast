@extends('frontend.layouts.app')
@section('content')
    @if ($page_image)
    <section class="hero1" style="background-image:url({{asset('public/pageimages/' . $page_image->images)}})">
    </section>
    @else
    <section class="hero-myaccount">
    </section>
        
    @endif
    <section class="contact py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto text-center">
                    <img src="{{ asset('public/frontend/images/peopleicon.png') }}" class="d-block mx-auto">
                    <img src="{{ asset('public/frontend/images/line_separator_01.png') }}" class="mx-auto">
                    <br>
                    <br>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 mx-auto text-center">


                    <a href="{{ route('my.account') }}" class="btn btn-primary d-inline-block mx-2">Profile</a>
                    <a href="{{ route('wishlist') }}" class="btn nav-link d-inline-block mx-2">Wishlist</a>
                    <a href="{{ route('orders.page') }}" class="btn nav-link d-inline-block mx-2">Orders</a>
                    {{-- <a href="cart.html" class="btn nav-link d-inline-block mx-2">Cart</a> --}}

                </div>
            </div>

            <div class="row">

                <div class="col-lg-4 mx-auto text-center mt-5">
                    {{-- <form class="needs-validation form" novalidate=""> --}}
                    <div class="row g-3">
                        <div class="col-12">
                            <input type="text" class="form-control" id="firstName" placeholder="Name"
                                value="{{ auth()->user()->name ?? '' }}" required="">
                        </div>
                        <div class="col-12">
                            <input type="email" class="form-control" id="email" placeholder="you@example.com"
                                value="{{ auth()->user()->email ?? '' }}">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="email" placeholder="+918880277282"
                                {{ auth()->user()->phone ?? '' }}>
                        </div>
                        <form action="{{ route('billing.address') }}" method="post">
                            @csrf
                            <div class="col-12 mt-5">
                                <h5>Billing Address</h5>
                                <textarea class="form-control" readonly rows="5" name="address">{{ auth()->user()->address }}, {{ auth()->user()->address1 }}, {{ auth()->user()->landmark }}, {{ auth()->user()->city }}, {{ auth()->user()->state }} - {{ auth()->user()->pincode }}</textarea>
                            </div>
                            <div class="col-12 mt-5">
                                <h5>Shipping Address</h5>
                                <div class="form-check d-inline-block mb-4">
                                    <input class="form-check-input" onchange="same_address1()" type="checkbox" name="same_address" value="1"
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Same as Billing Address
                                    </label>
                                </div>
                                <textarea class="form-control @error('billing_address') is-invalid @enderror" rows="5" name="billing_address">{{auth()->user()->billing_address}}</textarea>
                                @error('billing_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <button class="btn btn-primary my-4" type="submit">Add</button>

                            </div>
                        </form>
                        <div class="col-12 mt-5">
                            <h5>Payment Method</h5>
                            <div class="col-12">
                                <input type="text" class="form-control" id="firstName" placeholder="Card Number"
                                    value="" required="">
                            </div>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control" id="firstName" placeholder="Valid Thru: MM/YY"
                                value="" required="">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" id="firstName" placeholder="CVV" value=""
                                required="">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="address2" placeholder="Name on the card">
                        </div>
                    </div>
                    <button class="btn btn-primary my-4" type="submit">Add</button>
                    <div class="row g-3">
                        <div class="col-12 ">
                            <div class="card w-100 p-2 bg-light">
                                <h6 class="card-title">Payment Method 1</h6>
                                <p>XXXX XXXX XXXX XXXX</p>
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="card w-100 p-2 bg-light">
                                <h6 class="card-title">Payment Method 2</h6>
                                <p>XXXX XXXX XXXX XXXX</p>
                            </div>
                        </div>
                    </div>
                    {{-- </form> --}}
                </div>

                <div class="col-12 col-lg-12 mx-auto text-center">


                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">

                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                            tabindex="0">
                            <div class="card p-2">



                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                                        <div class="card w-100 my-2 shadow-2-strong maati">
                                            <a href="product.html" class="btn-link product-link">
                                                <span class="wish">
                                                    <button type="button" class="btn wishlist-btn"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Wishlist"><i class="bi bi-heart"></i></button>
                                                </span>
                                                <span class="catbox mx-auto">
                                                    <img src="{{ asset('public/frontend/images/cat-icon.png') }}"
                                                        class="mb-1">
                                                    <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                                        class="img-fluid d-block mx-auto">
                                                    <p>New Collection</p>
                                                </span>
                                                <img src="{{ asset('public/frontend/images/07.png') }}"
                                                    class="card-img-top">
                                                <span class="content">
                                                    <h6>Clay Kulhad Set of 6</h6>
                                                    <p>₹899.00</p>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                                        <div class="card w-100 my-2 shadow-2-strong maati">
                                            <a href="product.html" class="btn-link product-link">
                                                <span class="wish">
                                                    <button type="button" class="btn wishlist-btn"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Wishlist"><i class="bi bi-heart"></i></button>
                                                </span>
                                                <span class="catbox mx-auto">
                                                    <img src="{{ asset('public/frontend/images/cat-icon.png') }}"
                                                        class="mb-1">
                                                    <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                                        class="img-fluid d-block mx-auto">
                                                    <p>New Collection</p>
                                                </span>
                                                <img src="{{ asset('public/frontend/images/08.png') }}"
                                                    class="card-img-top">
                                                <span class="content">
                                                    <h6>Clay Kulhad Set of 6</h6>
                                                    <p>₹899.00</p>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                                        <div class="card w-100 my-2 shadow-2-strong zevar">
                                            <a href="" class="btn-link product-link">
                                                <span class="wish">
                                                    <button type="button" class="btn wishlist-btn"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Wishlist"><i class="bi bi-heart"></i></button>
                                                </span>
                                                <span class="catbox mx-auto">
                                                    <img src="{{ asset('public/frontend/images/cat-icon.png') }}"
                                                        class="mb-1">
                                                    <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                                        class="img-fluid d-block mx-auto">
                                                    <p>New Collection</p>
                                                </span>
                                                <img src="{{ asset('public/frontend/images/09.png') }}"
                                                    class="card-img-top">
                                                <span class="content">
                                                    <h6>Clay Kulhad Set of 6</h6>
                                                    <p>₹899.00</p>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                                        <div class="card w-100 my-2 shadow-2-strong zevar">
                                            <a href="" class="btn-link product-link">
                                                <span class="wish">
                                                    <button type="button" class="btn wishlist-btn"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Wishlist"><i class="bi bi-heart"></i></button>
                                                </span>
                                                <span class="catbox mx-auto">
                                                    <img src="{{ asset('public/frontend/images/cat-icon.png') }}"
                                                        class="mb-1">
                                                    <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                                        class="img-fluid d-block mx-auto">
                                                    <p>New Collection</p>
                                                </span>
                                                <img src="{{ asset('public/frontend/images/011.png') }}"
                                                    class="card-img-top">
                                                <span class="content">
                                                    <h6>Clay Kulhad Set of 6</h6>
                                                    <p>₹899.00</p>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                                        <div class="card w-100 my-2 shadow-2-strong baans">
                                            <a href="" class="btn-link product-link">
                                                <span class="wish">
                                                    <button type="button" class="btn wishlist-btn"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Wishlist"><i class="bi bi-heart"></i></button>
                                                </span>
                                                <span class="catbox mx-auto">
                                                    <img src="{{ asset('public/frontend/images/cat-icon.png') }}"
                                                        class="mb-1">
                                                    <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                                        class="img-fluid d-block mx-auto">
                                                    <p>New Collection</p>
                                                </span>
                                                <img src="{{ asset('public/frontend/images/010.png') }}"
                                                    class="card-img-top">
                                                <span class="content">
                                                    <h6>Clay Kulhad Set of 6</h6>
                                                    <p>₹899.00</p>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                                        <div class="card w-100 my-2 shadow-2-strong soot">
                                            <a href="" class="btn-link product-link">
                                                <span class="wish">
                                                    <button type="button" class="btn wishlist-btn"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Wishlist"><i class="bi bi-heart"></i></button>
                                                </span>
                                                <span class="catbox mx-auto">
                                                    <img src="{{ asset('public/frontend/images/cat-icon.png') }}"
                                                        class="mb-1">
                                                    <img src="{{ asset('public/frontend/images/top-separator-white.png') }}"
                                                        class="img-fluid d-block mx-auto">
                                                    <p>New Collection</p>
                                                </span>
                                                <img src="{{ asset('public/frontend/images/012.png') }}"
                                                    class="card-img-top">
                                                <span class="content">
                                                    <h6>Clay Kulhad Set of 6</h6>
                                                    <p>₹899.00</p>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab"
                            tabindex="0">
                            <div class="card p-2">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Order Number</th>
                                            <th>Status</th>
                                            <th>Order Date</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td>111</td>
                                            <td>Confirmed</td>
                                            <td>1-4-2023</td>
                                            <td><a href="order.html">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>111</td>
                                            <td>Confirmed</td>
                                            <td>1-4-2023</td>
                                            <td><a href="order.html">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>111</td>
                                            <td>Confirmed</td>
                                            <td>1-4-2023</td>
                                            <td><a href="order.html">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>111</td>
                                            <td>Confirmed</td>
                                            <td>1-4-2023</td>
                                            <td><a href="order.html">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>111</td>
                                            <td>Confirmed</td>
                                            <td>1-4-2023</td>
                                            <td><a href="order.html">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>111</td>
                                            <td>Confirmed</td>
                                            <td>1-4-2023</td>
                                            <td><a href="order.html">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>111</td>
                                            <td>Confirmed</td>
                                            <td>1-4-2023</td>
                                            <td><a href="order.html">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>111</td>
                                            <td>Confirmed</td>
                                            <td>1-4-2023</td>
                                            <td><a href="order.html">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>111</td>
                                            <td>Confirmed</td>
                                            <td>1-4-2023</td>
                                            <td><a href="order.html">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="cart-tab-pane" role="tabpanel" aria-labelledby="cart-tab"
                            tabindex="0">
                            <table class="table">
                                <tr>
                                    <th>Product</th>
                                    <th>MRP</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>Kulhad</td>
                                    <td>500</td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td>500</td>
                                    <td><button class="btn bg-light">X</button></td>
                                </tr>
                                <tr>
                                    <td>Kulhad</td>
                                    <td>500</td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td>500</td>
                                    <td><button class="btn bg-light">X</button></td>
                                </tr>
                                <tr>
                                    <td>Kulhad</td>
                                    <td>500</td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td>500</td>
                                    <td><button class="btn bg-light">X</button></td>
                                </tr>
                                <tr>
                                    <td>Kulhad</td>
                                    <td>500</td>
                                    <td><input type="number" class="form-control" /></td>
                                    <td>500</td>
                                    <td><button class="btn bg-light">X</button></td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col">
                                    <h3>Subtotal</h3>
                                </div>
                                <div class="col">
                                    <h3>INR 10000</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col"><a href="" class="btn btn-block bg-light">Update Cart</a>
                                </div>
                                <div class="col"><a href="checkout.html"
                                        class="btn btn-block bg-dark text-white">CheckOut</a></div>
                            </div>
                        </div>
                    </div>
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
                    @foreach ($sub_categories as $item)
                        <a href="{{ url('dynamic/category/' . $item->slug . '') }}"><img
                                src="{{ asset('public/productsubcategory/' . $item->featured_image) }}"
                                class="img-fluid icon m-grid rounded-4" /></a>
                    @endforeach

                </div>
            </div>

        </div>
    </section>

    <script>
        function same_address1(){
            var checkbox = document.getElementsByName('same_address')[0];
            if (checkbox.checked === true) {
                var address = document.getElementsByName('address')[0];
                var billing_address = document.getElementsByName('billing_address')[0];
                billing_address.value = address.value

            }

            if (checkbox.checked === false) {
                var billing_address = document.getElementsByName('billing_address')[0];
                billing_address.value = "";
            }

        }
    </script>
@endsection
