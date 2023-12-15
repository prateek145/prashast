@extends('frontend.layouts.app')
{{-- @include('frontend.layouts.header') --}}

@section('content')
    <section class="hero-contact">
    </section>
    <section class="contact py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>
                        {{-- <span class="badge bg-primary rounded-pill">2</span> --}}
                    </h4>
                    @if (session()->get('cart'))
                    <ul class="list-group mb-3">
                        @php
                            $totalprice = 0;
                        @endphp
                        @foreach ($products as $key => $value)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{ $value['name'] }}</h6>
                                </div>
                                <span class="text-muted">{{ $value['quantity'] }}</span>

                                <span class="text-muted">{{ $value['price'] }}</span>
                            </li>
                            @php
                                $totalprice += ($value['price'] * $value['quantity']);
                            @endphp
                        @endforeach

                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (INR)</span>
                            <strong>{{ $totalprice }}</strong>
                        </li>
                    </ul>
                        
                    @endif

                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate="" action="{{ route('paytm.payment') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="firstName" class="form-label">Full name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="firstName" value="testing">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            {{-- <div class="col-sm-6">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value=""
                                    required="">
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div> --}}
                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" name="username" class="form-control" id="username"
                                        value="username" placeholder="Username" required>
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email <span
                                        class="text-muted"></span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="you@example.com" required>
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" id="address"
                                    value="1234 Main St" placeholder="1234 Main St" required="">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="address2" class="form-label">Address 2 <span
                                        class="text-muted">(Optional)</span></label>
                                <input type="text" name="address2" class="form-control" id="address2"
                                    value="Apartment or suite" placeholder="Apartment or suite">
                            </div>
                            <div class="col-md-5">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" name="country" id="country" required="">
                                    <option value="us" selected>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="state" class="form-label">State</label>
                                <select class="form-select" name="state" id="state" required="">
                                    <option value="california" selected>California</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="zip" class="form-label">Zip</label>
                                <input type="text" name="zip" class="form-control" id="zip" value="110059"
                                    placeholder="" required="">
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="same-address" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"
                                aria-controls="collapseExample">
                            <label class="form-check-label" for="same-address">Shipping address is the different as my
                                billing address</label>
                        </div>
                        <input type="hidden" value="{{ json_encode(session()->get('cart')) }}" name="productdetail">
                        <!--shipping-->
                        <div class="collapse" id="collapseExample">
                            <h4 class="mb-3">Shipping address</h4>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">Full name</label>
                                    <input type="text" class="form-control" name="shipping_name" id="firstName"
                                        placeholder="" value="" required="">
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
                                    <input type="text" class="form-control" name="shipping_address" id="address"
                                        placeholder="1234 Main St" required="">
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="address2" class="form-label">Address 2 <span
                                            class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" name="shipping_name2" id="address2"
                                        placeholder="Apartment or suite">
                                </div>
                                <div class="col-md-5">
                                    <label for="country" class="form-label">Country</label>
                                    <select class="form-select" id="country" name="country" required="">
                                        <option value="">Choose...</option>
                                        <option>United States</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="state" class="form-label">State</label>
                                    <select class="form-select" id="state" name="state" required="">
                                        <option value="">Choose...</option>
                                        <option>California</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="zip" class="form-label">Zip</label>
                                    <input type="text" class="form-control" name="zip" id="zip"
                                        placeholder="" required="">
                                    <div class="invalid-feedback">
                                        Zip code required.
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

    <script>
        // function products_details(e) {
        //     // e.preventDefault();
        //     var products = [];
        //     var sku = document.getElementsByClassName('skuproceed');
        //     var price = document.getElementsByClassName('priceproceed');
        //     var quantity = document.getElementsByClassName('setquantityproceed');
        //     console.log(sku[0].innerText);


        //     for (let index = 0; index < sku.length; index++) {
        //         var arr = {
        //             'sku': sku[index].innerText,
        //             'price': price[index].innerText,
        //             'quantity': quantity[index].value
        //         }
        //         products.push(arr);
        //     }
        //     console.log(products);
        //     document.getElementById('productdetail').value = JSON.stringify(products);
        // }

        var all_total = document.getElementsByClassName('total_price_print');

        var total_price = 0;
        for (let index = 0; index < all_total.length; index++) {
            var newstring = all_total[index].innerText.replace('₹', '');
            var getnum = parseInt(newstring);
            total_price += getnum;

        }

        document.getElementById('grand_total').innerText = '₹ ' + total_price;
        document.getElementById('subtotal').value = total_price;


        var pname = document.getElementsByClassName('pnameproceed');
        var psku = document.getElementsByClassName('skuproceed');
        var pqty = document.getElementsByClassName('setquantityproceed');
        var pprice = document.getElementsByClassName('priceproceed');
        console.log('prateek');
        var productdetails = [];
        for (let index = 0; index < pname.length; index++) {
            productdetails[index] = {
                'name': pname[index].innerText,
                'sku': psku[index].innerText,
                'pqty': pqty[index].value,
                'pprice': pprice[index].innerText
            };
        }



        var array = JSON.stringify(productdetails);
        document.getElementById('productdetail').value = array;
        console.log(productdetails);


        function add(work, sku) {
            $.ajax({
                url: "{{ route('add.qty.cart') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "sku": sku,
                },
                success: function(response) {
                    var skuf = document.getElementsByClassName('skucheck');
                    for (let index = 0; index < skuf.length; index++) {
                        if (skuf[index].innerText == sku) {
                            var value1 = document.getElementsByClassName('setquantity')[index].value;
                            value1++;
                            document.getElementsByClassName('setquantity')[index].value = value1;
                            // break;
                            if (document.getElementsByClassName('total_price')[index] != undefined) {
                                var price = document.getElementsByClassName('total_price')[index].value;
                            }

                            if (document.getElementsByClassName('total_price_print')[index] != undefined) {
                                var total_price = document.getElementsByClassName('total_price_print')[index];
                            }
                            total_price.innerText = '₹' + price * value1;
                        }

                    }
                    var all_total = document.getElementsByClassName('total_price_print');

                    var total_price = 0;
                    console.log(typeof(total_price));
                    for (let index = 0; index < all_total.length; index++) {
                        var newstring = all_total[index].innerText.replace('₹', '');
                        var getnum = parseInt(newstring);
                        total_price += getnum;

                    }

                    document.getElementById('grand_total').innerText = '₹ ' + total_price;
                    document.getElementById('subtotal').value = total_price;

                    var pname = document.getElementsByClassName('pnameproceed');
                    var psku = document.getElementsByClassName('skuproceed');
                    var pqty = document.getElementsByClassName('setquantityproceed');
                    var pprice = document.getElementsByClassName('priceproceed');
                    console.log('prateek');
                    var productdetails = [];
                    for (let index = 0; index < pname.length; index++) {
                        productdetails[index] = {
                            'name': pname[index].innerText,
                            'sku': psku[index].innerText,
                            'pqty': pqty[index].value,
                            'pprice': pprice[index].innerText
                        };
                    }


                    var array = JSON.stringify(productdetails);
                    document.getElementById('productdetail').value = array;

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
                    "sku": sku
                },
                success: function(response) {
                    console.log(response);
                    var skuf = document.getElementsByClassName('skucheck');
                    for (let index = 0; index < skuf.length; index++) {
                        if (skuf[index].innerText == sku) {
                            var value1 = document.getElementsByClassName('setquantity')[index].value;
                            value1--;
                            if (value1 == 0) {
                                //    console.log(ele);
                            } else {
                                document.getElementsByClassName('setquantity')[index].value = value1;

                                if (document.getElementsByClassName('total_price')[index] != undefined) {
                                    var price = document.getElementsByClassName('total_price')[index].value;
                                }

                                if (document.getElementsByClassName('total_price_print')[index] != undefined) {
                                    var total_price = document.getElementsByClassName('total_price_print')[
                                        index];
                                }

                                total_price.innerText = '₹' + price * value1;

                            }
                            // break;
                        }

                    }
                    var all_total = document.getElementsByClassName('total_price_print');

                    var total_price = 0;
                    console.log(typeof(total_price));
                    for (let index = 0; index < all_total.length; index++) {
                        var newstring = all_total[index].innerText.replace('₹', '');
                        var getnum = parseInt(newstring);
                        total_price += getnum;

                    }

                    document.getElementById('grand_total').innerText = '₹ ' + total_price;
                    document.getElementById('subtotal').value = total_price;

                    var pname = document.getElementsByClassName('pnameproceed');
                    var psku = document.getElementsByClassName('skuproceed');
                    var pqty = document.getElementsByClassName('setquantityproceed');
                    var pprice = document.getElementsByClassName('priceproceed');
                    console.log('prateek');
                    var productdetails = [];
                    for (let index = 0; index < pname.length; index++) {
                        productdetails[index] = {
                            'name': pname[index].innerText,
                            'sku': psku[index].innerText,
                            'pqty': pqty[index].value,
                            'pprice': pprice[index].innerText
                        };
                    }
                    var array = JSON.stringify(productdetails);
                    document.getElementById('productdetail').value = array;

                }
            });
        }

        function delete1(work, sku) {
            $.ajax({
                url: "{{ route('remove.cart') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "sku": sku
                },
                success: function(response) {
                    console.log(response);
                    var skuf = document.getElementsByClassName('skucheck');
                    for (let index = 0; index < skuf.length; index++) {
                        if (skuf[index].innerText == sku) {
                            document.getElementsByClassName('parentclass')[index].remove();
                            break;
                        }

                    }

                    //functionality for cart count
                    var sessioncount = document.getElementsByClassName('sessioncount')[0];
                    var session_count = parseInt(sessioncount.innerText);
                    var value = session_count - 1;
                    // console.log(typeof(value), value);
                    sessioncount.innerText = value;

                    //function for grand total 
                    var all_total = document.getElementsByClassName('total_price_print');

                    var total_price = 0;
                    console.log(typeof(total_price));
                    for (let index = 0; index < all_total.length; index++) {
                        var newstring = all_total[index].innerText.replace('₹', '');
                        var getnum = parseInt(newstring);
                        total_price += getnum;

                    }

                    document.getElementById('grand_total').innerText = '₹ ' + total_price;
                    document.getElementById('subtotal').value = total_price;

                    var pname = document.getElementsByClassName('pnameproceed');
                    var psku = document.getElementsByClassName('skuproceed');
                    var pqty = document.getElementsByClassName('setquantityproceed');
                    var pprice = document.getElementsByClassName('priceproceed');
                    console.log('prateek');
                    var productdetails = [];
                    for (let index = 0; index < pname.length; index++) {
                        productdetails[index] = {
                            'name': pname[index].innerText,
                            'sku': psku[index].innerText,
                            'pqty': pqty[index].value,
                            'pprice': pprice[index].innerText
                        };
                    }
                    var array = JSON.stringify(productdetails);
                    document.getElementById('productdetail').value = array;

                }
            });
        }

        function deletewishlist(work, sku) {
            $.ajax({
                url: "{{ route('remove.wishlist') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "sku": sku
                },
                success: function(response) {
                    // console.log(response);
                    var skuf = document.getElementsByClassName('skucheck');
                    for (let index = 0; index < skuf.length; index++) {
                        if (skuf[index].innerText == sku) {
                            document.getElementsByClassName('parentclass')[index].remove();
                            break;
                        }

                    }

                    //functionality for cart count
                    var sessioncount = document.getElementsByClassName('wsessioncount')[0];
                    var session_count = parseInt(sessioncount.innerText);
                    var value = session_count - 1;
                    sessioncount.innerText = value;


                }
            });
        }
    </script>


    <script>
        function razorpay(e) {
            e.preventDefault();
            var amt = document.getElementById('subtotal').value;
            var tamt = amt * 100;
            var pname = document.getElementsByClassName('pnameproceed');
            var psku = document.getElementsByClassName('skuproceed');
            var pqty = document.getElementsByClassName('setquantityproceed');
            var pprice = document.getElementsByClassName('priceproceed');

            var productdetails = [];
            for (let index = 0; index < pname.length; index++) {
                productdetails[index] = {
                    'name': pname[index].innerText,
                    'sku': psku[index].innerText,
                    'pqty': pqty[index].value,
                    'pprice': pprice[index].innerText
                };

            }

            var name = document.getElementsByName('name')[0].value;
            var phone = document.getElementsByName('phone')[0].value;
            var email = document.getElementsByName('email')[0].value;
            var address = document.getElementsByName('address')[0].value;
            var country = document.getElementsByName('country')[0].value;
            var state = document.getElementsByName('state')[0].value;
            var pincode = document.getElementsByName('pincode')[0].value;
            var userid = document.getElementsByName('user_id')[0].value;

            if (name == '' || phone == '' || email == '' || address == '' || country == '' || state == '' || pincode ==
                '') {
                alert('Please enter form fields');
                return false;

            }


            // $.ajax({
            //                 url: "{{ route('paytm.payment') }}",
            //                 method: "POST",
            //                 data: {
            //                     '_token': "{{ csrf_token() }}",
            //                     "amount": tamt / 100,
            //                     "name": name,
            //                     'phone': phone,
            //                     'email': email,
            //                     'address': address,
            //                     'country': country,
            //                     'state': state,
            //                     'pincode': pincode,
            //                     'product_details': productdetails,
            //                     'user_id': userid
            //                 },
            //                 success: function(response1) {
            //                     if (response1.token) {
            //                         // console.log(response1);
            //                         window.location.href = '/user-orders';

            //                     }else{
            //                         alert('Paytm currently not working. Please try after some time');
            //                     }
            //                 }
            // });

        }

        function closepopup() {
            // console.log('working');
            document.getElementById('myModal').style.display = 'none';
            window.location.href = "{{ url('/') }}";
        }
    </script>
@endsection
