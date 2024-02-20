<style>
    .float{
	position:fixed;
	width:50px;
	height:50px;
	bottom:115px;
	left:95%;
	background-color:#25d366;
	color:#FFF;
	border-radius:50%;
	text-align:center;
	transform: translate(-50%, -50%);
  font-size:35px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
</style>
<section class="about py-5">
    <div class="container">
        <div class="row">
            <div class="col-8 col-lg-5 mx-auto">
                <img src="{{ asset('public/frontend/images/stories.png') }}" class="img-fluid">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-4 mx-auto">
                <form class="subscribe" method="POST" action="{{ route('newsletter.store') }}">
                    @csrf
                    <input type="email" placeholder="enter your email Id" name="email" required><input type="submit"
                        value="Subscribe">
                </form>
            </div>
        </div>
    </div>
</section>
<a id="back-to-top" href="#" class="btn back-to-top" role="button"><i class="bi bi-arrow-up"></i></a>

<footer class="py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <ul class="footlink text-center text-lg-start">
                    <li>
                        <a style="color: #6e6e6e;" href="{{ route('frontend.home') }}">Home</a>
                    </li>
                    <li>
                        <a style="color: #6e6e6e;" href="{{ route('frontend.about') }}">
                            About us
                        </a>
                    </li>
                    <li> <a style="color: #6e6e6e;" href="{{ route('shop.page') }}">Shop</a> </li>
                    <li> <a style="color: #6e6e6e;" href="{{ route('frontend.contact') }}">Contact Us</a> </li>
                    <li> <a style="color: #6e6e6e;" href="{{ route('blogs') }}">Blogs</a> </li>
                    <li> <a style="color: #6e6e6e;" href="{{ route('page.dynamic', 'return-and-cancellation-policy') }}">Return and Cancellation Policy</a> </li>
                    <li> <a style="color: #6e6e6e;" href="{{ route('page.dynamic', 'shipping-policy') }}">Shipping Policy</a> </li>
                    <li> <a style="color: #6e6e6e;" href="{{ route('page.dynamic', 'privacy-policy') }}">Privacy Policy</a> </li>
                    <li> <a style="color: #6e6e6e;" href="{{ route('page.dynamic', 'terms-and-conditions') }}">Terms and Conditions</a> </li>
                    

                    {{-- <li> <a style="color: #6e6e6e;" href="{{ route('page.dynamic', '') }}">Blogs</a> </li> --}}
                </ul>

            </div>
            <div class="col-lg-4 text-center">
                <img src="{{ asset('public/frontend/images/footer-logo.png') }}" class="img-fluid footer-logo">
                <h1>Prashast</h1>
                <img src="{{ asset('public/frontend/images/line_separator_01.png') }}">
                <p>© 2023 Prashast. All Rights Reserved.</p>
            </div>
            <div class="col-lg-4 text-end">
                <ul class="footlink text-center text-lg-end">
                    {{-- <li>Cart</li> --}}
                    @if (auth()->user())
                        <form action="{{ route('logout') }}" method="post" style="margin-left: 10%;">
                            @csrf
                            <button class="btn btn-danger btn-xs" style="background-color:#6e6e6e"> Logout</button>
                        </form>
                    @else
                        <li> <a style="color: #6e6e6e;" href="{{ route('login') }}">Sign in</a> </li>
                    @endif
                </ul>
                <div class="d-none d-lg-block w-100 min-height-60">
                    <hr class="float-end d-none d-lg-block w-50">
                </div>
                <div class="d-block w-100 min-height-60 d-flex d-lg-block">
                    <ul class="social p-0 mx-auto float-lg-end">
                        <li> <a href="https://www.instagram.com/prashast.co.in?igsh=N3lsMG5zaGh4bDN4&utm_source=qr" target="_blank"><i class="bi bi-instagram"></i></a> </li>
                        <li> <a href="https://twitter.com/Prashast_co_in" target="_blank"><i class="bi bi-twitter-x"></i></a> </li>
                        {{-- <li><i class="bi bi-instagram"></i></li>
                        <li><i class="bi bi-linkedin"></i></li>
                        <li><i class="bi bi-youtube"></i></li> --}}
                    </ul>
                </div>
                <ul class="footlink text-center text-lg-end w-100">

                    <li>info@prashast.co.in</li>
                    <li>+91 9625 663737</li>
                </ul>
            </div>
        </div>
    </div>
    @php
        $products = session()->get('cart');
    @endphp

    <!-- cart start-->
    <button class="cart-btn btn btn-primary" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"><i class="bi bi-cart3"><span
                class=" badge rounded-pill bg-danger" style="top:-7px">
                {{$products == true ? count($products) : 0}}

            </span></i>
        Cart</button>
        <a href="https://wa.link/gjkzq0" class="float" target="_blank">
<i class="bi bi-whatsapp my-float"></i>
</a>

    <div class="offcanvas offcanvas-end {{ session()->get('showcart') == 'true' ? 'show' : '' }}" tabindex="-1"
        id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">Shopping Cart</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            {{-- {{session()->get('cart')}} --}}

            <table class="table">
                <tr>
                    <th>Product</th>
                    <th>MRP</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                @if (!is_null($products))
                    @php
                        $final_total = 0;
                    @endphp
                    @foreach ($products as $key => $value)
                        <tr>
                            <td>{{ $value['name'] }}</td>
                            <td>{{ $value['price'] }}</td>
                            <td><input type="number" value="{{ $value['qty'] }}" min=1 class="form-control" />
                                <div class="input-group-btn-vertical d-flex">
                                    <form action="{{ route('remove.qty.cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $value['sku'] }}" name="sku">
                                        <input type="hidden" value="{{ $value['id'] }}" name="id">
                                        <input type="hidden" value="{{ $value['qty'] }}" name="quantity">
                                        <button class="btn btn-default" type="submit"><i
                                                class="bi bi-dash-square-fill"></i></button>

                                    </form>

                                    <form action="{{ route('add.qty.cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $value['sku'] }}" name="sku">
                                        <input type="hidden" value="{{ $value['id'] }}" name="id">
                                        <button class="btn btn-default" type="submit"><i
                                                class="bi bi-plus-square-fill"></i></button>

                                    </form>

                                </div>

                            </td>
                            <td>{{ $value['price'] * $value['qty'] }}</td>
                            <td>
                                <form action="{{ route('remove.cart') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $value['sku'] }}" name="sku">
                                    <input type="hidden" value="{{ $value['id'] }}" name="id">
                                    <button class="btn bg-light">X</button>

                                </form>
                            </td>
                        </tr>
                        @php
                            $final_total += $value['price'] * $value['qty'];
                        @endphp
                    @endforeach
                @endif
            </table>
            <div class="row">
                <div class="col">
                    <h3>Subtotal</h3>
                </div>
                <div class="col">
                    <h3>INR {{ $final_total ?? 0 }}</h3>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col"><a href="{{ route('shop.page') }}" class="btn btn-block bg-light">Update Cart</a> --}}
            </div>
            <div class="col"><a href="{{ route('cart') }}" class="btn btn-block bg-dark text-white">CheckOut</a>
            </div>
        </div>
    </div>
    </div>
    <!-- cart end-->
</footer>

<script>
    function add(work, sku) {
        $.ajax({
            url: "{{ route('add.qty.cart') }}",
            method: "POST",
            data: {
                '_token': "{{ csrf_token() }}",
                "sku": sku,
                "id": id,
            },
            success: function(response) {
                if (response.result === 'success') {
                    location.reload();
                }
            }
        });
        //    console.log($cart_items);
    }

    function remove(work, sku) {
        $.ajax({
            url: "{{ route('remove.qty.cart') }}",
            method: "POST",
            data: {
                '_token': "{{ csrf_token() }}",
                "sku": sku,
                "id": id,

            },
            success: function(response) {
                if (response.result === 'success') {
                    location.reload();
                }
            }
        });
    }

    function delete1(work, sku) {
        $.ajax({
            url: "{{ route('remove.cart') }}",
            method: "POST",
            data: {
                '_token': "{{ csrf_token() }}",
                "sku": sku,
                "id": id,

            },
            success: function(response) {
                if (response.result === 'success') {
                    location.reload();
                    // console.log('prateek');
                    document.getElementById('offcanvasWithBackdrop').classList.add('show');
                }
            }
        });
    }
</script>
