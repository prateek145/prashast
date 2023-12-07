@extends('backend.layouts.app')
@section('content')

    <style>
        .col {
            font-size: 1.1vw;
            background-color: #5A5D60;
            color: aliceblue;
            padding: 2%;
            width: 50%;
            display: flex;
            justify-content: center;
            margin-left: 30%;

        }

    </style>

    <div style="height: 5vw">
        <a href="{{ route('products.index') }}" class="btn btn-danger btn-sm float-right m-5">return back</a>

    </div>
    <div class="col">
        Name -> {{ $product->name }}<br><br>
        Sku -> {{ $product->sku }}<br><br>
        Producttype -> {{ $product->product_type }}<br><br>
        Regular Price -> {{ $product->regular_price }}<br><br>
        Sale Price -> {{ $product->sale_price }}<br><br>
        Weight -> {{ $product->weight }}<br><br>
        Height -> {{ $product->height }}<br><br>
        Width -> {{ $product->width }}<br><br>
        Length -> {{ $product->length }}<br><br>
        Description -> {{ $product->description }}<br><br>
        Meta Title -> {{ $product->meta_title }}<br><br>
        Meta Description -> {{ $product->meta_description }}<br><br>
        Keywords -> {{ $product->meta_keywords }}<br><br>
        Created At -> {{ $product->created_at }}<br><br>
        @if ($product->featured_image != null)
            Featured image -> <img src="{{ asset('product/' . $product->featured_image) }}" alt="" width="200px"
                height="200px" style="margin-top: 200px">

        @endif

    </div>


@endsection
