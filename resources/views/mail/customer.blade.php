<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>


<div style="background: #fff">
    <a href="{{ route('frontend.home') }}">
        <img src="https://prashast.co.in/public/frontend/images/Regalia-logo-light.png" alt="Regalia">
    </a>
</div>



<div class="card" style="width:90%; margin:auto;">

    {{-- {{ dd($order) }} --}}

    @php
        $productdetails = json_decode($order['product_details']);
    @endphp

    <div>
        Order Id : {{ $order['order_id'] ?? '' }}<br>
        Total Amount : {{ $order['amount'] ?? '' }}<br>
        Bill Download link : {{ url('download-bill', $order->order_id) }}
    </div>

    <div>
        <h3>Order Details</h3>
        Customer Mail After Payment
        <table>
            <tr>
                <th style="border:1px solid black">Product Name</th>
                <th style="border:1px solid black">Product Sku</th>
                <th style="border:1px solid black">Quantity</th>
                <th style="border:1px solid black">Price</th>
                <th style="border:1px solid black">Sub Total</th>
            </tr>

    
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

    <div>
        This product(s) will shipped to following Address.

            <h3>Billing Address</h3>

            <h3>{{ $order['name'] ?? '' }}</h3>
            {{ $order['billing_address'] ?? '' }}<br>

            <h3>Shipping Address</h3>
            <h3>{{ $order['shipping_name'] == '' ? $order['name'] : $order['shipping_name']}}</h3>
            {{ $order['shipping_address'] ?? $order['billing_address'] }}<br>

    </div>
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
                        <p>+91 9625 663737</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row m0 copyRight">
        <div class="container">
            <div class="row">
                <div class="fleft">&copy; 2023 Prashast All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
</footer>
