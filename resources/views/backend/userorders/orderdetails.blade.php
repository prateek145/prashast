@extends('backend.layouts.app')
@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in show col-md-12">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>

    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade in show col-md-12">
            <strong>Success!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>

    @endif
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Orders</h4>
                {{-- <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Add New User</a> --}}
            </div>

            <div class="">

                <!-- Single Widget -->
                <section class="single-widget widget-search">
                    <form action="{{ route('userorders') }}" method="GET" class="float-right col-md-3 mt-3">
                        <input type="text" name="search" placeholder="Search Keyword Use Enter" class="form-control">
                    </form>
                </section>
                <!--// Single Widget -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sku</th>
                                <th>Order Id</th>
                                <th>Order Price</th>
                                <th>Order quantity</th>
                                <th>Total amt</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderdetails as $item)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->order_sku }}</td>
                                    @php
                                        $product = App\Models\backend\Product::where('sku', $item->order_sku)->first();
                                        if ($product == null) {
                                            # code...
                                            $product = App\Models\backend\ProductVariance::where('sku', $item->order_sku)->first();
                                        }
                                        
                                        if ($product->sale_price == null) {
                                            # code...
                                            $price = $product->regular_price;
                                        } else {
                                            $price = $product->sale_price;
                                        }
                                    @endphp
                                    <td>{{ $item->order_id }}</td>
                                    <td>{{ $price }}</td>
                                    <td>{{ $item->order_quantity }}</td>
                                    <td>{{ $price * $item->order_quantity }} </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection
