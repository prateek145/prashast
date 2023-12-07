@extends('frontend.layouts.app')
@include('frontend.layouts.header')
@section('content')
    <section id="breadcrumbRow" class="row">
        <h2>{{ $product->name }}</h2>
        <div class="row pageTitle m0">
            <div class="container">
                <h4 class="fleft">{{ $product->name }}</h4>
                <ul class="breadcrumb">
                    <li><a href="{{ route('frontend.home') }}">home</a></li>
                    <li class="active">{{ $product->name }}</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="row contentRowPad">
        <div class="container">
            <div class="row singleProduct">
                <div class="col-sm-7">
                    <div class="row m0 flexslider" id="productImageSlider">
                        <ul class="slides">

                            @if ($product->product_type == 'simple_product')
                                @php
                                    $images = json_decode($product->featured_image);
                                    
                                @endphp
                                @for ($i = 0; $i < count($images); $i++)
                                    <li><img src="{{ asset('product/' . $images[$i]) }}" alt=""></li>
                                @endfor
                            @endif


                            @if ($product->product_type == 'variable_product')
                                @php
                                    $images = json_decode($product->featured_image);
                                    
                                @endphp
                                @for ($i = 0; $i < count($images); $i++)
                                    <li><img src="{{ asset('product/' . $images[$i]) }}" alt=""></li>
                                @endfor
                                @foreach ($variance as $item)
                                    @if ($item->image != null)
                                        <li><img src="{{ asset($item->image) }}" alt=""></li>
                                    @endif
                                @endforeach
                            @endif

                        </ul>
                    </div>
                    <div class="row m0 flexslider" id="productImageSliderNav">
                        <ul class="slides">

                            @if ($product->product_type == 'simple_product')
                                @for ($i = 0; $i < count($images); $i++)
                                    <li><img class="img-thumbnail" src="{{ asset('product/' . $images[$i]) }}" alt="">
                                    </li>
                                @endfor
                            @endif

                            @if ($product->product_type == 'variable_product')
                                @for ($i = 0; $i < count($images); $i++)
                                    <li><img class="img-thumbnail" src="{{ asset('product/' . $images[$i]) }}" alt="">
                                    </li>
                                @endfor
                                @foreach ($variance as $item)
                                    @if ($item->image != null)
                                        <li><img class="img-thumbnail" src="{{ asset($item->image) }}" alt=""></li>
                                    @endif
                                @endforeach
                            @endif


                        </ul>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="row m0">
                        <h4 class="heading">{{ $product->name }}</h4>

                        @if ($product->sale_price)
                            <h3 class="heading price" id="sale_price">
                                <del>₹{{ $product->regular_price }}</del>₹{{ $product->sale_price }}
                            </h3>
                        @else
                            <h3 class="heading price" id="regular_price"></del>₹{{ $product->regular_price }}</h3>
                        @endif

                        <div class="row descList m0">
                            <dl class="dl-horizontal">
                                <dt>manufacturer :</dt>
                                <dd>Tartaan & Co</dd>
                                <dt>availability :</dt>
                                <dd>In Stock 20 Item(s)</dd>
                                <dt>product code :</dt>
                                <dd id="sku">{{ $product->sku }}</dd>
                            </dl>
                        </div>
                        <div class="row m0 shortDesc" id="description1">
                            {!! $product->description !!}
                        </div>
                        <div class="row m0 form-inline">
                            <div class="form-group">
                                @if ($product->product_type == 'variable_product')
                                    @foreach ($attr as $item)
                                        <label class="heading proAttr">{{ $item->name }} :</label>

                                        @php
                                            $attributes = explode('|', $item->description);
                                        @endphp
                                        <select class="selectpicker sizeSelect form-control attrselected"
                                            onchange="selector({{ $product->id }})">
                                            @for ($i = 0; $i < count($attributes); $i++)
                                                <option value="{{ $attributes[$i] }}">
                                                    {{ $attributes[$i] }}</option>
                                            @endfor
                                        </select>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="row m0 qtyAtc">
                            <div class="fleft quantity">
                                <div class="fleft">Qty <span>=</span></div>
                                <div class="input-group spinner">
                                    <input type="number" class="form-control" id="qty" value="1">
                                </div>
                            </div>

                            <button class="fleft btn btn-default" onclick="addtocart({{ $product->id }})">add to
                                cart</button>
                            {{-- <a href=" cart.html"><img src="images/icons/cart3.png" alt=""> add
                                to cart</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m0 tabRow">
                <ul class="nav nav-tabs" role="tablist" id="shortcodeTab">
                    <li role="presentation" class="active"><a href="#description" aria-controls="description"
                            role="tab" data-toggle="tab">
                            <i class="fas fa-align-left"></i> description
                        </a></li>
                    <!--<li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <i class="fas fa-thumbs-up"></i> review (1)
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </a></li>-->
                    <li role="presentation"><a href="#additionInfo" aria-controls="additionInfo" role="tab"
                            data-toggle="tab">
                            <i class="fas fa-user"></i> Know the designer
                        </a></li>
                </ul>
                <div class="tab-content shortcodeTabContent">
                    <div role="tabpanel" class="tab-pane row m0 active" id="description">
                        <div class="fleft desc">
                            <h5 class="heading">Product Details</h5>
                            <p>{!! $product->description !!}</p>
                        </div>
                    </div>
                    <!-- <div role="tabpanel" class="tab-pane row m0" id="review">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="row m0 reviewCount">1 review for this product</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          </div> -->
                    <div role="tabpanel" class="tab-pane row m0" id="additionInfo">
                        <div class="row m0 additionInfoRow">
                            <div class="fleft infoTitle">Material</div>
                            <div class="fleft infos">Gold</div>
                        </div>
                        <div class="row m0 additionInfoRow">
                            <div class="fleft infoTitle">Stone </div>
                            <div class="fleft infos">Diamond</div>
                        </div>
                        <div class="row m0 additionInfoRow">
                            <div class="fleft infoTitle">Resizable? </div>
                            <div class="fleft infos">No</div>
                        </div>
                        <div class="row m0 additionInfoRow">
                            <div class="fleft infoTitle">Item Height </div>
                            <div class="fleft infos">4.3 Millimeters </div>
                        </div>
                        <div class="row m0 additionInfoRow">
                            <div class="fleft infoTitle">Item Width</div>
                            <div class="fleft infos">2.5 Millimeters </div>
                        </div>
                        <div class="row m0 additionInfoRow">
                            <div class="fleft infoTitle">Item Width</div>
                            <div class="fleft infos">2.5 Millimeters </div>
                        </div>
                        <div class="row m0 additionInfoRow">
                            <div class="fleft infoTitle">Ring Size</div>
                            <div class="fleft infos">7</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Tabs Row-->
            <div class="row shortcodesRow m0">
                <div class="row sectionTitle">
                    <h3>latest products</h3>
                    <h5>know more about our latest collection</h5>
                </div>

                @foreach ($latestproduct as $item)
                    <div class="col-sm-3 product">
                        <div class="productInner row m0">
                            <div class="row m0 imgHov">

                                @php
                                    $images = json_decode($item->featured_image);
                                @endphp
                                <img src="{{ asset('product/' . $images[0]) }}" alt="">
                                <div class="row m0 hovArea">
                                    <div class="row m0 icons">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fas fa-shopping-cart-alt"></i></a></li>
                                            <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="row m0 proType"><a href="#">Baccarat</a></div>
                                    <div class="row m0 proRating">
                                        <i class="fas fa-star-o"></i>
                                        <i class="fas fa-star-o"></i>
                                        <i class="fas fa-star-o"></i>
                                        <i class="fas fa-star-o"></i>
                                        <i class="fas fa-star-o"></i>
                                    </div>
                                    <div class="row m0 proPrice"><i class="fas fa-usd"></i>{{ $item->regular_price }}
                                    </div>
                                </div>
                            </div>
                            <div class="row m0 proName"><a
                                    href="{{ route('product.detail', $item->slug) }}">{{ $item->name }}</a></div>
                            <div class="row m0 proBuyBtn">
                                <button class="addToCart btn">add to
                                    cart</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
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
                    // console.log(response.variance[0], response.variance[0]['regular_price']);

                    if (response.variance[0]['sale_price'] != null && response.variance[0]['regular_price'] !=
                        null) {
                        document.getElementById("sale_price").innerHTML =
                            '<del>₹' + response.variance[0]['regular_price'] + '</del>₹' + response.variance[0][
                                'sale_price'
                            ];

                    } else {
                        document.getElementById("regular_price").innerHTML =
                            '<del>₹' + response.variance[0]['regular_price'];
                    }

                    document.getElementById("sku").innerText = response.variance[0]['sku'];
                    document.getElementById("description").innerHTML = response.variance[0]['description'];
                    var des = document.getElementById("description1").innerHTML = response.variance[0][
                        'description'
                    ];

                }
            });
        }

        function addtocart(productId) {
            var sku = document.getElementById("sku").innerText;
            var qty = document.getElementById("qty").value;
            console.log(productId, sku, qty, 'prateek');

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
                    console.log(response);
                    // console.log(response.result[response.var_id].sku);

                    var sku = document.getElementsByClassName('skucheck');
                    // console.log(sku[0].innerText, response.result[response.var_id].sku);

                    let req = 'required';
                    console.log(sku, response);

                    if (response.var_id) {
                        for (let index = 0; index < sku.length; index++) {
                            if (sku[index].innerText == response.result[response.var_id].sku) {
                                var value1 = document.getElementsByClassName('setquantity')[index].value;
                                value1++;
                                document.getElementsByClassName('setquantity')[index].value = value1;
                                req = 'not_required';
                                break;
                            }

                        }

                        if (req == 'required') {
                            console.log('prateek');
                            console.log(window.location.href);

                            var tr = document.createElement("tr");
                            tr.ClassName = "alert";
                            tr.role = "alert";

                            var td = document.createElement("td");
                            td.ClassName = "productImage";

                            var img = document.createElement("img");
                            img.src = 'http://127.0.0.1/ecommerce/' + response.result[
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
                            i1.setAttribute("onclick", 'remove("remove", ' + response.result[response.var_id]
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
                            i2.setAttribute('onclick', 'delete1("delete", ' + response.result[response.var_id]
                                .sku +
                                ')');

                            button3.appendChild(i2);
                            td4.appendChild(button3);
                            tr.appendChild(td4);

                            // if (response.result[response.var_id].sale_price) {
                            //     td1.innerText = response.result[response.var_id].sale_price;
                            // } else {
                            //     td1.innerText = response.result[response.var_id].regular_price;
                            // }
                            document.getElementsByClassName("addptocart")[0].appendChild(tr);
                        }

                    }

                    if (response.product_id) {

                        console.log(sku[0]);
                        for (let index = 0; index < sku.length; index++) {

                            if (sku[index]) {
                                if (sku[index].innerText == response.result[response.product_id].sku) {
                                    var value1 = document.getElementsByClassName('setquantity')[index].value;
                                    value1++;
                                    document.getElementsByClassName('setquantity')[index].value = value1;
                                    req = 'not_required';
                                    break;
                                }
                            }

                        }

                        if (req == 'required') {
                            console.log('prateek');
                            var tr = document.createElement("tr");
                            tr.ClassName = "alert";
                            tr.role = "alert";

                            var td = document.createElement("td");
                            td.ClassName = "productImage";

                            var img = document.createElement("img");
                            img.src = 'http://127.0.0.1/ecommerce/' + response.result[
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
                            i.setAttribute("onclick", 'add("add", ' + response.result[response.product_id].sku +
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
                            i2.setAttribute('onclick', 'delete1("delete", ' + response.result[response
                                    .product_id]
                                .sku +
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
                        }
                    }


                }
            });

        }
    </script>

@endsection
