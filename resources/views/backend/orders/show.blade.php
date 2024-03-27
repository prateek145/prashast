<html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="invoice.css">
</head>

<style>
    * {
        border: 0;
        box-sizing: border-box;

    }

    /* page */

    html {
        overflow: auto;
        padding: 0.5in;
    }

    html {
        background: #999;
        cursor: default;
    }

    body {
        box-sizing: border-box;
        height: 11in;
        margin: 0 auto;
        overflow: hidden;
        padding: 0.5in;
        width: 8.5in;
    }
.address{
    white-space: pre-wrap;
    word-break: break-word;
    overflow: hidden; /* Optionally add to handle long addresses */
    line-height:14px;
    
}

    /* heading */

    h1 {
        font: bold 100% sans-serif;
        letter-spacing: 0.5em;
        text-align: center;
        text-transform: uppercase;

    }

    /* table */

    table {
        font-size: 75%;
        table-layout: fixed;
        width: 100%;
    }

    table {
        border-collapse: separate;
        border-spacing: 2px;
    }

    th,
    td {
        border-width: 1px;
        padding: 0.5em;
        position: relative;
        text-align: left;
    }

    th,
    td {
        border-radius: 0.25em;
        border-style: solid;
    }

    th {
        background: #EEE;
        border-color: #BBB;
    }

    td {
        border-color: #DDD;
    }


    /* header */

    header {
        margin: 0 0 3em;
    }

    header:after {
        clear: both;
        content: "";
        display: table;
    }

    header h1 {
        background: #986633;
        border-radius: 0.25em;
        color: #FFF;
        margin: 0 0 1em;
        padding: 0.5em 0;
    }

    header address {
        float: left;
        font-size: 75%;
        font-style: normal;
        line-height: 1.25;
        margin: 0 1em 0em 0;
    }

    header address p {
        margin: 0 0 0.25em;
    }

    header span,
    header img {
        display: block;
        float: right;
    }

    header span {
        margin: 0 0 1em 1em;
        max-height: 25%;
        max-width: 60%;
        position: relative;
    }

    /* article */

    article,
    article address,
    table.meta,
    table.inventory {
        margin: 0 0 3em;
    }

    article:after {
        clear: both;
        content: "";
        display: table;
    }

    article h1 {
        clip: rect(0 0 0 0);
        position: absolute;
    }

    article address {
        float: left;
        font-size: 125%;
        font-weight: bold;
    }

    /* table meta & balance */

    /* table.meta, table.balance { float: right;  } */
    table.meta:after,
    table.balance:after {
        clear: both;
        content: "";
        display: table;
    }

    /* table meta */

    table.meta th {
        width: 40%;
    }

    table.meta td {
        width: 60%;
    }

    /* table items */

    table.inventory {
        clear: both;
        width: 100%;
    }

    table.inventory th {
        font-weight: bold;
        text-align: center;
        align-items: center;
        justify-content: center;
    }

    table.inventory td:nth-child(1) {
        width: 26%;
    }

    table.inventory td:nth-child(2) {
        width: 38%;
    }

    table.inventory td:nth-child(3) {
        text-align: right;
        width: 12%;
    }

    table.inventory td:nth-child(4) {
        text-align: right;
        width: 12%;
    }

    table.inventory td:nth-child(5) {
        text-align: right;
        width: 12%;
    }

    /* table balance */

    table.balance th,
    table.balance td {
        width: 50%;
    }

    table.balance td {
        text-align: right;
    }

    table.balance tr {
        text-align: right;
        width: 50%;
    }

    /* aside */

    aside h1 {
        border: none;
        border-width: 0 0 1px;
        margin: 0 0 1em;
    }

    aside h1 {
        border-color: #999;
        border-bottom-style: solid;
    }



    @media print {
        * {
            -webkit-print-color-adjust: exact;
        }

        html {
            background: none;
            padding: 0;
        }

        body {
            box-shadow: none;
            margin: 0;
        }

        span:empty {
            display: none;
        }

        .add,
        .cut {
            display: none;
        }
    }

    @page {
        margin: 0;
    }

    .receive .bill {
        line-height: 10px;
        font-size: 14px;
    }

    .receive .ship {
        line-height: 15px;
        font-size: 14px;
    }

    .balance {
        width: 40%;
        float: right;
    }
</style>

<body>

    <!-- Logo section  -->
    <div class="text-center mb-3">
        <img src="{{ asset('public/frontend/images/iconuppr.png') }}" alt="">

    </div>

    <!-- Header Section  -->
    <header>

        <div class="head">
            <h1>Invoice</h1>

        </div>
        <address>
            <p class="fs-6 fw-bold mb-2">Sender:</p>
            <p><b>Prashast Innovation Private Limited</b></p>
            <p><b>C-98, Sector-10, Noida, Gautam Buddha Nagar, (09) Uttar Pradesh-201301</b></p>
            <p><b>GSTIN: 09AALCP2948L1ZQ</b></p>
            <hr style="width: 60%; ">

        </address>

    </header>

    <!-- Bill Section  -->

    <div class="row mb-3">

        <div class="col col-6 receive py-2">

            <div class="bill">
                <p><b>Bill To:</b> </p>
                <p>Name: <span>{{ $order->name ?? '' }}</span> </p>
                <p>Email: <span>{{ $order->email ?? '' }}</span> </p>
                <p>Phone: <span>{{ $order->phone ?? '' }}</span> </p>
                <p>Billing Address: <span class="address"> {{ $order->billing_address ?? '' }}</span> </p>
            </div>

            <div class="ship mt-4">
                <p><b>Ship To:</b></p>
                <p>Shipping Name: <span>{{ $order->shipping_name == '' ? $order->name : $order->shipping_name }}</span>
                </p>
                <p>Shipping Address: <span class="address"> {{ $order->shipping_address ?? $order->billing_address }}</span> </p>

            </div>



        </div>

        <div class="col col-5">

            <table class="meta">

                <h6 class="text-center">Prashast Innovation Private Limited</h6>


                <tr>
                    <th class="text-center"><span><b>Order No</b></span></th>
                    <td><span>{{ $order->order_id }}</span></td>
                </tr>
                <tr>
                    <th class="text-center"><span><b>Order Date</b></span></th>
                    <td><span>{{ $order->created_at->format('d-m-Y') ?? '' }}</span></td>
                </tr>
                <tr>
                    <th class="text-center"><span><b>Payment Mode</b></span></th>
                    <td><span>Prepaid</span></td>
                </tr>
                <tr>
                    <th class="text-center"><span><b>Amount Total</b></span></th>
                    <td><span id="prefix">₹</span><span>{{ $order->amount }}</span></td>
                </tr>
            </table>


        </div>

    </div>



    <article>


        <!-- Bill Table Section  -->

        <table class="inventory">
            <thead>
                <tr>
                    <th><span>Sr. No.</span></th>
                    <th colspan="3"><span>Product Name</span></th>
                    <th><span>Product SKU</span></th>
                    <th><span>Product Qty</span></th>
                    <th><span>Product Price</span></th>
                    <th><span>Product Total Price</span></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $bd_price = 0;
                @endphp
                @for ($i = 0; $i < count($order_details); $i++)
                    @php
                        $bd_price =+ $order_details[$i]->price;
                    @endphp
                    <tr>
                        <td class="text-center"><span>{{ $i + 1 }}</span></td>
                        <td colspan="3"><span>{{ $order_details[$i]->name ?? '' }}</span></td>
                        <td class="text-center"><span>{{ $order_details[$i]->sku ?? '' }}</span></td>
                        <td class="text-center"><span>{{ $order_details[$i]->qty ?? '' }}</span></td>
                        <td class="text-center"><span data-prefix></span><span>₹{{ $order_details[$i]->price }}</span>
                        </td>
                        <td class="text-center"><span data-prefix></span><span>₹{{ $order_details[$i]->qty * $order_details[$i]->price }}</span>
                        </td>
                    </tr>
                @endfor


            </tbody>
        </table>

        <!-- Bill Total Section  -->


        <table class="balance ">

            <tr>
                <th class="text-center"><span>Paid Amount</span></th>
                <td><span data-prefix>₹</span><span>{{ $order->amount }}</span></td>
            </tr>
            
            @if ($order->coupon_code)
            <tr>
                <th class="text-center"><span>Total Amount</span></th>
                <td><span data-prefix>₹</span><span>{{ $bd_price ?? "" }}</span></td>

            </tr>

            <tr>
                <th class="text-center"><span>Code</span></th>
                <td><span>{{ $order->coupon_code ?? "" }}</span></td>

            </tr>


                
            @endif

        </table>
    </article>

</body>

</html>
