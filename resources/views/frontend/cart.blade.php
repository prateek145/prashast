@extends('frontend.layouts.app')
@section('content')
    <section class="hero-contact">
    </section>
    <section class="contact py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>
                    </h4>
                    @if ($cart == true)
                        <ul class="list-group mb-3">
                            @php
                                $totalprice = 0;
                            @endphp
                            @foreach ($products as $key => $value)
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div style="width: 70%;">
                                        <h6 class="my-0">{{ $value['name'] }}</h6>
                                    </div>
                                    <span class="text-muted">{{ $value['qty'] }}</span>

                                    <span class="text-muted">{{ $value['price'] }}</span>
                                </li>
                                @php
                                    $totalprice += $value['price'] * $value['qty'];
                                @endphp
                            @endforeach

                            <form action="{{ route('coupon.apply') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" name="code" class="form-control" placeholder="coupon"
                                            id="">

                                        <input type="hidden" name="products" value="{{ json_encode($products) }}">
                                        <input type="hidden" name="type" value="multiple">

                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" value="submit" class="btn btn-sm btn-warning">

                                    </div>

                                </div>

                            </form>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (INR)</span>
                                {{-- {{ dd(session()->get('discountedPrice'), session()->get('priceChange')) }} --}}
                                @if (session()->get('priceChange') && session()->get('priceChange') == true)
                                    <strong>Total Price : {{ $totalprice }}</strong>
                                    <strong>Discounted Price : {{ session()->get('discountedPrice') }}</strong>
                                @else
                                    <strong>{{ $totalprice }}</strong>
                                @endif
                            </li>
                        </ul>
                    @endif

                    @if ($cart == false)
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div style="width: 70%;">
                                    <h6 class="my-0">{{ $product->name }}</h6>
                                </div>
                                <span class="text-muted">{{ $qty }}</span>

                                <span class="text-muted">{{ $product->sale_price }}</span>
                            </li>

                            <form action="{{ route('coupon.apply') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" name="code" class="form-control" placeholder="coupon"
                                            id="">
                                        <input type="hidden" name="products" value="{{ json_encode($product) }}">
                                        <input type="hidden" name="type" value="single">

                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" value="submit" class="btn btn-sm btn-warning">

                                    </div>

                                </div>

                            </form>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (INR)</span>
                                @if (session()->get('priceChange') && session()->get('priceChange') == true)
                                    <strong>Total Price : {{ $product->sale_price * $qty }}</strong>
                                    <strong>Discounted Price : {{ session()->get('discountedPrice') }}</strong>
                                @else
                                    <strong>{{ $product->sale_price * $qty }}</strong>
                                @endif
                            </li>
                        </ul>
                    @endif

                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>
                    <form action="{{ route('paytm.payment') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="firstName" class="form-label">Full name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="firstName"
                                    value="{{ auth()->user() == true ? auth()->user()->name : old('name') ?? '' }}"
                                    placeholder="Name" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="hidden" value="{{ session()->get('discountedPrice') == true ? session()->get('discountedPrice') : $totalprice ?? $product->sale_price * $qty }}" name="amount">
                            <div class="col-12">
                                <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="you@example.com"
                                    value="{{ auth()->user() == true ? auth()->user()->email : old('email') ?? '' }}"
                                    required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <input type="hidden" name="coupon" value="{{session()->get('priceChange') && session()->get('priceChange') == true ?   session()->get('couponName') : ''}}">

                            <div class="col-12">
                                <label for="phone" class="form-label">Phone <span class="text-muted"></span></label>
                                <input type="numeric" min="10" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror" placeholder="888888888"
                                    value="{{ auth()->user() == true ? auth()->user()->phone : old('phone') ?? '' }}"
                                    required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address"
                                    class="form-control @error('address') is-invalid @enderror" id="address"
                                    value="{{ old('address') ?? '' }}" placeholder="1234 Main St" required="">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="address2" class="form-label">Address 2 <span
                                        class="text-muted">(Optional)</span></label>
                                <input type="text" name="address2"
                                    class="form-control @error('address2') is-invalid @enderror" id="address2"
                                    value="{{ old('address1') ?? '' }}" placeholder="Apartment or suite">
                            </div>
                            <div class="col-md-5">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select @error('country') is-invalid @enderror" name="country"
                                    id="country" required="">
                                    <option value="india" selected>India</option>
                                </select>
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="state" class="form-label">State</label>
                                <select class="form-select @error('state') is-invalid @enderror" name="state"
                                    id="state" required="">
                                    <option value="">Select</option>

                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="zip" class="form-label">Pincode</label>
                                <input type="text" name="pincode"
                                    class="form-control @error('pincode') is-invalid @enderror" id="pincode"
                                    placeholder="Pincode" value="{{ old('pincode') ?? '' }}">
                                @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="same-address" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"
                                aria-controls="collapseExample" name="shipping_address_button"
                                {{ old('shipping_address_button') == 'on' ? 'checked' : '' }}>
                            <label class="form-check-label" for="same-address">Shipping address is different from my
                                billing address</label>
                        </div>
                        @if ($cart == true)
                            <input type="hidden" value="{{ json_encode(session()->get('cart')) }}"
                                name="productdetail">
                        @endif

                        @if ($cart == false)
                            <input type="hidden" value="{{ json_encode($productdetails) }}" name="productdetail">
                        @endif
                        <!--shipping-->
                        <div class="collapse {{ old('shipping_address_button') == 'on' ? 'show' : '' }}"
                            id="collapseExample">
                            <h4 class="mb-3">Shipping address</h4>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">Full name</label>
                                    <input type="text"
                                        class="form-control @error('shipping_name') is-invalid @enderror"
                                        name="shipping_name" id="firstName" placeholder=""
                                        value="{{ old('shipping_name') ?? '' }}">
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                {{-- <div class="col-sm-6">
                                    <label for="lastName" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder=""
                                        value="" required="">
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div> --}}
                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text"
                                        class="form-control @error('shipping_address') is-invalid @enderror"
                                        name="shipping_address" id="address" placeholder="1234 Main St"
                                        value="{{ old('shipping_address') ?? '' }}">
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="address2" class="form-label">Address 2 <span
                                            class="text-muted">(Optional)</span></label>
                                    <input type="text"
                                        class="form-control @error('shipping_address2') is-invalid @enderror"
                                        name="shipping_address2" id="address2" placeholder="Apartment or suite"
                                        value="{{ old('shipping_address2') ?? '' }}">
                                </div>
                                <div class="col-md-5">
                                    <label for="country"
                                        class="form-label @error('shipping_country') is-invalid @enderror">Country</label>
                                    <select class="form-select" id="country" name="shipping_country">
                                        <option value="india">India</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="state" class="form-label">State</label>
                                    <select class="form-select @error('shipping_state') is-invalid @enderror"
                                        id="state" name="shipping_state">
                                        <option value="">Select</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                        <option value="Daman and Diu">Daman and Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Puducherry">Puducherry</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="pincode" class="form-label">Pincode</label>
                                    <input type="text"
                                        class="form-control @error('shipping_pincode') is-invalid @enderror"
                                        name="shipping_pincode" id="pincode" placeholder=""
                                        value="{{ old('shipping_pincode') ?? '' }}">
                                    <div class="invalid-feedback">
                                        pincode code required.
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
