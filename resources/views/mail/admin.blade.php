<header class="row" id="header">
    <div class="row m0 logo_line">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 logo">
                    <a href="{{ route('frontend.home') }}" class="logo_a">
                        <img src="{{ asset('prashast/images/Regalia-logo-2.png') }}" alt="Regalia">

                    </a>
                </div>

            </div>
        </div>
    </div>
</header>

<div class="card" style="width:70%; margin:auto;">

    Admin Mail After Customer Payment

    Customer Details !!. <br>

    Customer Name : {{ $cdetails['name'] ?? ""}}<br>
    Customer Phone : {{ $cdetails['phone'] ?? ""}}<br>
    Customer Email : {{ $cdetails['email'] ?? ""}}<br>
    Customer Address :{{ $cdetails['address'] ?? ""}}<br>
    Customer Country : {{ $cdetails['country'] ?? ""}}<br>
    Customer State : {{ $cdetails['state'] ?? ""}}<br>
    Customer Pincode : {{ $cdetails['pincode'] ?? ""}}<br>
    Order Id :{{ $cdetails['order_id'] ?? ""}}<br>
    Amount : {{ $cdetails['amount'] ?? ""}}<br><br><br>


    PRODUCT DETAILS:<br><br>
    @for ($i = 0; $i < count($pdetails); $i++)
        Product Name : {{ $pdetails[$i]['name'] ?? ""}}<br>
        Product Sku : {{ $pdetails[$i]['sku'] ?? ""}}<br>
        Product Qty : {{ $pdetails[$i]['pqty'] ?? ""}}<br>
        Product Price : {{ $pdetails[$i]['pprice'] ?? ""}}<br><br>
    @endfor
</div>

<footer class="row footer2">
    <div class="row m0 topFooter">
        <div class="container line2">
            <div class="row">
                {{-- <div class="col-sm-3 widget">
                        <div class="row m0">
                            <h4>About Prashast</h4>
                            <p>We provide the best Quality of products to you.We are always here to help our lovely
                                customers.</p>
                            <ul class="list-inline">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div> --}}

                <div class="col-sm-4 widget">
                    <div class="row m0">
                        <h4>Address</h4>
                        <a href="https://goo.gl/maps/JyU9byk1YRUhx9Z36">
                            <p style="color:azure;">Map</p>
                        </a>
                        <p>Prashast innovation Private Limited
                            C-98, Sector 10, Noida, Uttar Pradesh - 201301</p>
                        <p>+91-77018 60046</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row m0 copyRight">
        <div class="container">
            <div class="row">
                <div class="fleft">&copy; 2021 <a href="index2.html">Prashast</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
</footer>
