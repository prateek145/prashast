@extends('frontend.layouts.app')
{{-- @include('frontend.layouts.top-header') --}}
@section('content')
    {{-- @include('frontend.layouts.slider') --}}
    <section class="hero">
    </section>
    <section class="about py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="{{asset('public/frontend/images/line_separator_01.png')}}" class="my-5">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="maintext">Our products are designed and produced indigenously<br>
                        by workers and artisans belonging to an underpriviledged socioeconomic<br>
                        background, living in remote rural or urban slum settings.</p>
                    <a href="{{route('dynamic.page', 'about-us')}}" class="btn btn-primary shadow">Know More</a>
                </div>
            </div>
        </div>
    </section>
    <section class="featured py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4  text-center py-3 order-2 order-lg-1">
                    <div class=" topsell">
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active text-center">
                                    <img src="{{asset('public/frontend/images/icon-top.png')}}" class="img-fluid d-block mx-auto">
                                    <img src="{{asset('public/frontend/images/top-separator-white.png')}}" class="img-fluid d-block mx-auto">
                                    <p>TOP SELLER</p>
                                    <img src="{{asset('public/frontend/images/product.png')}}" class="d-block w-100" alt="...">
                                    <h6>Handmade Tortoise
                                        Trinket Tray</h6>
                                    <a href="{{route('dynamic.subcategories', 'shop')}}" class="btn btn-secondary">Shop</a>
                                </div>
                                <div class="carousel-item text-center">
                                    <img src="{{asset('public/frontend/images/icon-top.png')}}" class="img-fluid d-block mx-auto">
                                    <img src="{{asset('public/frontend/images/top-separator-white.png')}}" class="img-fluid d-block mx-auto">
                                    <p>TOP SELLER</p>
                                    <img src="{{asset('public/frontend/images/product.png')}}" class="d-block w-100" alt="...">
                                    <h6>Handmade Tortoise
                                        Trinket Tray</h6>
                                    <a href="{{route('dynamic.subcategories', 'shop')}}" class="btn btn-secondary">Shop</a>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 text-center py-3 order-3 order-lg-2">
                    <div class=" newcol">
                        <div id="carouselExampleAutoplayinga" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active text-center">
                                    <img src="{{asset('public/frontend/images/icon-top.png')}}" class="img-fluid d-block mx-auto">
                                    <img src="{{asset('public/frontend/images/top-separator-white.png')}}" class="img-fluid d-block mx-auto">
                                    <p>NEW COLLECTION</p>
                                    <img src="{{asset('public/frontend/images/product.png')}}" class="d-block w-100" alt="...">
                                    <h6>Handmade Tortoise
                                        Trinket Tray</h6>
                                    <a href="{{route('dynamic.subcategories', 'shop')}}" class="btn btn-secondary">Shop</a>
                                </div>
                                <div class="carousel-item text-center">
                                    <img src="{{asset('public/frontend/images/icon-top.png')}}" class="img-fluid d-block mx-auto">
                                    <img src="{{asset('public/frontend/images/top-separator-white.png')}}" class="img-fluid d-block mx-auto">
                                    <p>NEW COLLECTION</p>
                                    <img src="{{asset('public/frontend/images/product.png')}}" class="d-block w-100" alt="...">
                                    <h6>Handmade Tortoise
                                        Trinket Tray</h6>
                                    <a href="{{route('dynamic.subcategories', 'shop')}}" class="btn btn-secondary">Shop</a>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplayinga" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplayinga" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center py-3 order-1 order-lg-3">
                    <div class="collection">
                        <div id="carouselExampleAutoplayinga" style="opacity: 0;" class="carousel slide"
                            data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{asset('public/frontend/images/icon-top.png')}}" class="img-fluid d-block mx-auto">
                                    <img src="{{asset('public/frontend/images/top-separator-white.png')}}" class="img-fluid d-block mx-auto">
                                    <p>NEW COLLECTION</p>
                                    <img src="{{asset('public/frontend/images/product.png')}}" class="d-block w-100" alt="...">
                                    <h6>Handmade Tortoise
                                        Trinket Tray</h6>
                                    <a href="{{route('dynamic.subcategories', 'shop')}}" class="btn btn-secondary" style="cursor:default;">Shop</a>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplayinga" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplayinga" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <!--<div class="col-lg-4 text-center py-3 order-1 order-lg-3">
                    <div class="collection" style="background: url('public/frontend/images/collections.png); background-size: cover; height: 100vh;"></div>
                </div>-->
            </div>
        </div>
    </section>
    
    <section class="category py-5 d-lg-none d-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel cate">
                        @foreach ($sub_categories as $item)
                        <div class="item"> <img src="{{route('dynamic.subcategories', $item->slug)}}"
                            class="img-fluid icon" /> </div>
                            
                        @endforeach
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
                    <a href="{{route('dynamic.subcategories', $item->slug)}}"><img src="{{asset('public/productsubcategory/'.$item->featured_image)}}" class="img-fluid icon m-grid rounded-4" /></a> 
                        
                    @endforeach

                </div>
            </div>

        </div>
    </section>
    <section class="mostviewed text-white text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleAutoplayingb" class="my-lg-5 py-lg-5 carousel slide bg-pattern"
                        data-bs-ride="carousel">
                        <div class="carousel-inner py-lg-5 my-lg-5">
                            <div class="carousel-item active py-5 my-lg-5">
                                <img src="{{asset('public/frontend/images/icon-top.png')}}" class="img-fluid d-block mx-auto">
                                <img src="{{asset('public/frontend/images/top-separator-white.png')}}" class="img-fluid d-block mx-auto">
                                <h4>Kala</h4>
                                <h6>MADHUBANI PAINTING</h6>
                                <h5>TOP SELLER</h5>
                            </div>
                            <div class="carousel-item py-5 my-lg-5">
                                <img src="{{asset('public/frontend/images/icon-top.png')}}" class="img-fluid d-block mx-auto">
                                <img src="{{asset('public/frontend/images/top-separator-white.png')}}" class="img-fluid d-block mx-auto">
                                <h4>Kala</h4>
                                <h6>MADHUBANI PAINTING</h6>
                                <h5>TOP SELLER</h5>
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
    <section class="about py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="{{asset('public/frontend/images/line_separator_01.png')}}" class="my-5">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="maintext">Each of the products are crafted with love, and affection- meticulously<br>
                        and intricately crafted into a unqiue traditional piece.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-3 text-center"></div>
                <div class="col-12 col-lg-2 text-center position-relative fact-height">
                    <div class="fact-box">
                        <h1 class="yellow facts">235</h1>
                        <p>artisans helped</p>
                    </div>
                </div>
                <div class="col-12 col-lg-2 text-center position-relative fact-height">
                    <div class="fact-box">
                        <h1 class="yellow facts">17</h1>
                        <p>cities reached</p>
                    </div>
                </div>
                <div class="col-12 col-lg-2 text-center position-relative fact-height">
                    <div class="fact-box">
                        <h1 class="yellow facts">2.5
                            lakh</h1>
                        <p>products sold</p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 text-center"></div>
            </div>
        </div>
    </section>
    <section class="about py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="video">VOICES<br>
                        <em>from the</em><br>
                        FIELD
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 videoplayer mt-5">
                    <iframe width="100%" src="https://www.youtube.com/embed/6d0n1G-vcRM?si=vk6-iWBfJQ15Txws"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <script>
        function switchactive(id) {
            console.log(id);
            var upper = document.getElementsByClassName('switchactive' + id)[0];
            var lower = document.getElementsByClassName('switchactive1' + id)[0];

        }

        function addtocart(productId, productSku) {
            // console.log(productId, productSku);
            // alert();
            var sku = productSku;
            var qty = 1;
            // console.log(sku, qty, productId);

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
                    // console.log(response);
                    // alert();
                    // console.log(response.result[response.var_id].sku);

                    var sku1 = document.getElementsByClassName('skucheck');
                    // console.log(sku[0].innerText, response.result[response.var_id].sku);

                    let req = 'required';
                    // console.log(sku, response);

                    if (response.var_id) {
                        for (let index = 0; index < sku1.length; index++) {
                            if (sku1[index].innerText == response.result[response.var_id].sku) {
                                var value1 = document.getElementsByClassName('setquantity')[index].value;
                                value1++;
                                document.getElementsByClassName('setquantity')[index].value = value1;
                                req = 'not_required';
                                break;
                            }

                        }

                        if (req == 'required') {
                            // console.log('prateek');
                            var tr = document.createElement("tr");
                            tr.setAttribute("class", "parentclass");
                            tr.ClassName = "alert";
                            tr.role = "alert";

                            var td = document.createElement("td");
                            td.ClassName = "productImage";

                            var img = document.createElement("img");
                            img.src = 'https://omegawebdemo.com.au/ecommerceprashast/' + response.result[
                                response.var_id].image;
                            img.style.width = "90%";
                            img.style.height = "90%";
                            td.appendChild(img);
                            tr.appendChild(td);

                            var td1 = document.createElement("td");
                            td1.setAttribute("class", "skucheck");
                            td1.innerText = response.result[response.var_id].sku;
                            tr.appendChild(td1);

                            var td2 = document.createElement("td");
                            var name = document.createElement("h6");
                            name.innerText = response.result[response.var_id].name;
                            td2.appendChild(name);
                            tr.appendChild(td2);

                            var td3 = document.createElement("td");

                            var div = document.createElement("div");
                            div.setAttribute("class", 'input-group spinner');

                            var input = document.createElement("input");
                            input.setAttribute("type", "text");
                            input.setAttribute("class", 'form-control setquantity');
                            input.setAttribute("value", response.qty);
                            input.readOnly = true;

                            var div2 = document.createElement("div");
                            div2.setAttribute('class', 'input-group-btn-vertical');

                            var button = document.createElement("button");
                            button.setAttribute("class", 'btn btn-default');



                            var button1 = document.createElement("button");
                            button1.setAttribute("class", 'btn btn-default');


                            var i = document.createElement("i");
                            i.setAttribute("class", 'fas fa-angle-up');
                            i.setAttribute("onclick", 'add("add", ' + response.result[response.var_id].sku +
                                ')');


                            var i1 = document.createElement("i");
                            i1.setAttribute("class", 'fas fa-angle-down');
                            i1.setAttribute("onclick", 'remove("remove", ' + response.result[response
                                    .var_id]
                                .sku +
                                ')');


                            button.appendChild(i);
                            button1.appendChild(i1);
                            // div2.appendChild(button);
                            // div2.appendChild(button1);
                            div.appendChild(input);
                            // div.appendChild(div2);
                            td3.appendChild(div);
                            tr.appendChild(td3);

                            var td4 = document.createElement('td');
                            button3 = document.createElement('button');
                            button3.setAttribute('class', 'edit');
                            button3.setAttribute('aria-label', 'Close');

                            var i2 = document.createElement('i');
                            i2.setAttribute('class', 'far fa-trash-alt');
                            i2.setAttribute('onclick', 'delete1("delete", ' + "'" + response.result[response
                                    .var_id]
                                .sku + "'" + ')');

                            button3.appendChild(i2);
                            td4.appendChild(button3);
                            tr.appendChild(td4);

                            // if (response.result[response.var_id].sale_price) {
                            //     td1.innerText = response.result[response.var_id].sale_price;
                            // } else {
                            //     td1.innerText = response.result[response.var_id].regular_price;
                            // }
                            document.getElementsByClassName("addptocart")[0].appendChild(tr);

                            var sessioncount = document.getElementsByClassName('sessioncount')[0];
                            var session_count = parseInt(sessioncount.innerText);
                            var value = session_count + 1;
                            // console.log(typeof(value), value);
                            sessioncount.innerText = value;
                        }

                    }

                    if (response.product_id) {

                        console.log(response);
                        for (let index = 0; index < sku1.length; index++) {

                            if (sku1[index]) {
                                if (sku1[index].innerText == response.result[response.product_id].sku) {
                                    var value1 = document.getElementsByClassName('setquantity')[index]
                                        .value;
                                    value1++;
                                    document.getElementsByClassName('setquantity')[index].value = value1;
                                    req = 'not_required';
                                    break;
                                }
                            }

                        }

                        if (req == 'required') {
                            // console.log('prateek');
                            var tr = document.createElement("tr");
                            tr.setAttribute("class", "parentclass");
                            tr.ClassName = "alert";
                            tr.role = "alert";

                            var td = document.createElement("td");
                            td.ClassName = "productImage";

                            var img = document.createElement("img");
                            img.src = 'https://omegawebdemo.com.au/ecommerceprashast/' + response.result[
                                    response.product_id]
                                .image;
                            img.style.width = "90%";
                            img.style.height = "90%";
                            td.appendChild(img);
                            tr.appendChild(td);

                            var td1 = document.createElement("td");
                            td1.setAttribute("class", "skucheck");
                            td1.innerText = response.result[response.product_id].sku;
                            tr.appendChild(td1);

                            var td2 = document.createElement("td");
                            var name = document.createElement("h6");
                            name.innerText = response.result[response.product_id].name;
                            td2.appendChild(name);
                            tr.appendChild(td2);

                            var td3 = document.createElement("td");

                            var div = document.createElement("div");
                            div.setAttribute("class", 'input-group spinner');

                            var input = document.createElement("input");
                            input.setAttribute("type", "text");
                            input.setAttribute("class", 'form-control setquantity');
                            input.setAttribute("value", response.qty);
                            input.readOnly = true;

                            var div2 = document.createElement("div");
                            div2.setAttribute('class', 'input-group-btn-vertical');

                            var button = document.createElement("button");
                            button.setAttribute("class", 'btn btn-default');



                            var button1 = document.createElement("button");
                            button1.setAttribute("class", 'btn btn-default');


                            var i = document.createElement("i");
                            i.setAttribute("class", 'fas fa-angle-up');
                            i.setAttribute("onclick", 'add("add", ' + response.result[response.product_id]
                                .sku +
                                ')');


                            var i1 = document.createElement("i");
                            i1.setAttribute("class", 'fas fa-angle-down');
                            i1.setAttribute("onclick", 'remove("remove", ' + response.result[response
                                    .product_id]
                                .sku +
                                ')');


                            button.appendChild(i);
                            button1.appendChild(i1);
                            // div2.appendChild(button);
                            // div2.appendChild(button1);
                            div.appendChild(input);
                            // div.appendChild(div2);
                            td3.appendChild(div);
                            tr.appendChild(td3);

                            var td4 = document.createElement('td');
                            button3 = document.createElement('button');
                            button3.setAttribute('class', 'edit');
                            button3.setAttribute('aria-label', 'Close');

                            var i2 = document.createElement('i');
                            i2.setAttribute('class', 'far fa-trash-alt');
                            i2.setAttribute('onclick', 'delete1("delete", ' + "'" + response.result[response
                                    .product_id]
                                .sku + "'" +
                                ')');

                            button3.appendChild(i2);
                            td4.appendChild(button3);
                            tr.appendChild(td4);

                            // if (response.result[response.product_id].sale_price) {
                            //     td1.innerText = response.result[response.product_id].sale_price;
                            // } else {
                            //     td1.innerText = response.result[response.product_id].regular_price;
                            // }
                            document.getElementsByClassName("addptocart")[0].appendChild(tr);

                            var sessioncount = document.getElementsByClassName('sessioncount')[0];
                            var session_count = parseInt(sessioncount.innerText);
                            var value = session_count + 1;
                            // console.log(typeof(value), value);
                            sessioncount.innerText = value;
                        }
                    }


                }
            });


        }
    </script>
@endsection
