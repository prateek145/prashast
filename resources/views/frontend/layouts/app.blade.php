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

<style>
    .announcement {
        background-color: #ffc107;
        color: white;
        text-align: center;
        padding: 1px;
    }
</style>

<body>
    @php
        $annoucment = App\Models\backend\FlashDeal::where('status', 1)->latest()->first();
        // dd($annoucment);
    @endphp
    @if ($annoucment)
    <div class="announcement">
        {!! $annoucment->description ?? '' !!}
    </div>
        
    @endif
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
                    } else if (response.result == 'product_found') {
                        alert('Product Already In Cart');

                    } else {
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
            window.location.href = "{{ url('buy/now') }}" + '/' + product_id + '/' + qty;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;

            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                autoplay: false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
                navText: [
                    '<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
                    '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
                ],
            }).on('changed.owl.carousel', syncPosition);

            sync2
                .on('initialized.owl.carousel', function() {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100
                }).on('changed.owl.carousel', syncPosition2);

            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;

                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }

                //end block

                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });
        });
    </script>


</body>

</html>
