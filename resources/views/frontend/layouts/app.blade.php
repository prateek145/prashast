<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prashast</title>
    <link href="{{ asset('public/frontend/images/iconuppr.png') }}" rel="icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('public/frontend/owl/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/owl/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/style.css') }}" />
    <link type="text/css" href="{{ asset('public/binshops-blog.css') }}" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
        integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
</head>

<body>
    @include('frontend.layouts.header')
    @yield('content')
    @include('frontend.layouts.footer')
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content bg-dark text-white">
                <div class="modal-body p-lg-3">
                    <form class="signin text-center" action="{{ route('login') }}" method="POST">
                        @csrf
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="col-md-12">
                            <input type="email" name="email"
                                class="form-control mb-2 @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="Email or Mobile Number" name="">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <input type="password" name="password"
                                class="form-control mb-4  @error('password') is-invalid @enderror"
                                value="{{ old('password') }}" placeholder="Passwowrd" placeholder="Password"
                                name="">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <input type="submit" class="btn btn-primary mb-4" value="Sign-in" />
                        <a class="d-block text-white" href="{{ route('password.request') }}">Forgot Password?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('public/frontend/owl/jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/owl/owl.carousel.min.js') }}"></script>
    <script type="text/javascript">
        // console.log('prateek');
        $('.cate').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: false,
                    autoplay: true
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 5,
                    nav: true,
                    loop: false
                }
            }
        })

        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            // scroll body to 0px on click
            $('#back-to-top').click(function() {
                $('body,html').animate({
                    scrollTop: 0
                }, 400);
                return false;
            });
        });

        function addtowishlist(productId, productSku, qtyuppr) {
            // console.log(productId, productSku, qtyuppr);
            // alert();
            event.preventDefault();
            var sku = productSku;
            var qty = 1;

            // console.log(sku, qty, productId);

            $.ajax({
                url: "{{ route('add.to.wishlist') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "productId": productId,
                    "sku": sku,
                    "qty": qty
                },
                success: function(response) {
                    console.log(response, 'prateek');
                    if (response.result == 'unauthorized') {
                        window.location.href = "{{ route('login') }}";
                    }

                    if (response.result == 'found') {
                        // alert('Product Already Added in Wishlist.');
                    }
                    if (response.result == 'notfound') {
                        // alert('Product Add In Wishlist.');
                        location.reload();
                    }

                }
            });


        }

        function selector(productId) {
            var selection = [];
            var sss = document.getElementsByClassName('attrselected');

            for (let index = 0; index < sss.length; index++) {

                selection.push(sss[index].value);
            }

            $.ajax({
                url: "{{ route('attr.change') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "selection": selection,
                    "productId": productId
                },
                success: function(response) {
                    // console.log(response);
                    // console.log(response.variance[0], response.variance[0]['regular_price']);

                    if (response.variance[0]['sale_price'] != null && response.variance[0]['regular_price'] !=
                        null) {
                        document.getElementById("sale_price").innerHTML =
                            '<del>₹' + response.variance[0]['regular_price'] + '</del>₹' + response.variance[0][
                                'sale_price'
                            ];

                    } else {
                        document.getElementById("regular_price").innerHTML =
                            '₹' + response.variance[0]['regular_price'];
                    }

                    document.getElementById("sku").innerText = response.variance[0]['sku'];
                    document.getElementById("description").innerHTML = response.variance[0]['description'];
                    document.getElementById("description1").innerHTML = response.variance[0]['description'];
                    var changeonclick = document.getElementById('changeonclick');
                    changeonclick.removeAttribute('onclick');
                    // console.log(changeonclick);
                    var productid = response.variance[0]['product_id'];
                    var productsku = response.variance[0]['sku'];
                    // changeonclick.setAttribute = ('onclick', "addtocart(productid, productsku)");
                    changeonclick.setAttribute('onclick', 'addtocart(' + "'" + productid + "'" + ',' + "'" +
                        productsku +
                        "'" + "," + "'productdetail'" + ')');
                    // console.log(changeonclick);

                }
            });
        }

        function addtocart(productId, productSku, qtyuppr) {
            // alert();
            var sku = productSku;
            if (qtyuppr == 'productdetail') {
                var qty11 = document.getElementById("input_quantity");
                if (qty11) {
                    var qty = document.getElementById("input_quantity").value;

                } else {
                    var qty = 1;

                }

            }

            // if (qtyuppr == 'latestproduct') {
            //     var qty = 1;

            // }

            $.ajax({
                url: "{{ route('add.to.cart') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "productId": productId,
                    "sku": sku,
                    "qty": qty
                },
                success: function(response) {
                    if (response.result == 'out_of_stock') {
                        var popup = document.getElementById('stockPopUp1');
                        popup.classList.add('show');
                        popup.style.display = 'block';
                    }else if(response.result == 'product_found'){
                        alert('Product Already In Cart');

                    }else{
                        location.reload();

                    }
                }
            });


        }

        function deletewishlist(work, id) {
            // console.log(sku);
            $.ajax({
                url: "{{ route('remove.wishlist') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "id": id
                },
                success: function(response) {
                    // console.log(response);
                    if (response.result == 'success') {

                        location.reload();

                    }

                }
            });
        }

        // function searchproducts(keyword) {
        //     //   console.log(keyword);

        //     $.ajax({
        //         url: "{{ route('product.search') }}",
        //         method: "POST",
        //         data: {
        //             '_token': "{{ csrf_token() }}",
        //             "keyword": keyword
        //         },
        //         success: function(response) {
        //             // console.log(response);
        //             var listname = document.getElementById('datalistname');
        //             listname.innerHTML = '';
        //             for (let index = 0; index < response.length; index++) {
        //                 const option = document.createElement('option');
        //                 option.setAttribute('value', response[index].id);
        //                 // option.setAttribute('onchange', "enterValue(" + response[index].id+ ")");
        //                 option.innerHTML = response[index].name;
        //                 // option.onselect = selectinput(this.value_);
        //                 // console.log(option);
        //                 listname.appendChild(option);
        //             }
        //         }
        //     });


        // }

        // function enterValue(id){
        //     console.log(id);
        //     var mainbox = document.getElementById('mainsearchbox');
        //     mainbox.value = id;
        //     console.log(mainbox);
        // }

        function form_submit(product_id) {
            var qty = document.getElementById('input_quantity').value;
            var product_id = product_id;
            window.location.href = "{{ url('buy/now') }}"  + '/' + product_id  + '/' + qty;
        }

    </script>


</body>

</html>
