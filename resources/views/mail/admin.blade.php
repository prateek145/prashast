<header class="row" id="header">
    <div class="row m0 logo_line">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 logo">
                    <a href="{{ route('frontend.home') }}" class="logo_a">
                        <img src="https://prashast.co.in/public/frontend/images/Regalia-logo-light.png" alt="Regalia">

                    </a>
                </div>

            </div>
        </div>
    </div>
</header>

<div class="card" style="width:70%; margin:auto;">

    Admin Mail After Customer Payment

    Customer Details !!. <br>

    Customer Name : {{ $order['name'] ?? '' }}<br>
    Customer Phone : {{ $order['phone'] ?? '' }}<br>
    Customer Email : {{ $order['email'] ?? '' }}<br>
    Customer Billing Address :{{ $order['billing_address'] ?? '' }}<br>
    Customer Shipping :{{ $order['shipping_address_button'] ?? 'off' }}<br>
    Customer Shipping Name :{{ $order['shipping_name'] ?? '' }}<br>
    Customer Shipping Address : {{ $order['shipping_address'] ?? '' }}<br>
    Order Id :{{ $order['order_id'] ?? '' }}<br>
    Amount : {{ $order['amount'] ?? '' }}<br><br><br>

    @php
        $productdetails = json_decode($order['product_details']);

    @endphp

    <h3>Order Details</h3>
    <div>
        Order Id : {{ $order['order_id'] ?? '' }}<br>
        Total Amount : {{ $order['amount'] ?? '' }}<br>
        Bill Download link : {{url('download-bill', $order->order_id)}} 
    </div>

    <div>
        <h3>Order Details</h3>
        <table>
            <tr>
                <th style="border:1px solid black">Product Name</th>
                <th style="border:1px solid black">Product Sku</th>
                <th style="border:1px solid black">Quantity</th>
                <th style="border:1px solid black">Price</th>
                <th style="border:1px solid black">Sub Total</th>
            </tr>

            Customer Mail After Payment
            @foreach ($productdetails as $item)
                <tr>
                    <td style="border:1px solid black">{{ $item->name ?? '' }}</td>
                    <td style="border:1px solid black">{{ $item->sku ?? '' }}</td>
                    <td style="border:1px solid black">{{ $item->qty ?? '' }}</td>
                    <td style="border:1px solid black">₹ {{ $item->price ?? '' }}</td>
                    <td style="border:1px solid black">₹ {{ $item->qty * $item->price ?? '' }}</td>
                </tr>
            @endforeach
        </table><br>

    </div>
</div>

<footer class="row footer2">
    <div class="row m0 topFooter">
        <div class="container line2">
            <div class="row">

                <div class="col-sm-4 widget">
                    <div class="row m0">
                        <h4>Address</h4>
                        <a href="https://goo.gl/maps/JyU9byk1YRUhx9Z36">
                            <p style="color:azure;">Map</p>
                        </a>
                        <p>Prashast innovation Private Limited
                            C-98, Sector 10, Noida, Uttar Pradesh - 201301</p>
                        <p>+91 9625 663737</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row m0 copyRight">
        <div class="container">
            <div class="row">
                <div class="fleft">&copy; 2023 <a href="index2.html">Prashast</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
</footer>
