@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Orders</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">

                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Orders</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Billing Address</th>
                                    <th>Shipping to</th>
                                    <th>Shipping Name</th>
                                    <th>Shipping Address</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        {{-- <td>{{ $item->_token }}</td> --}}
                                        <td>{{ $item->order_id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->billing_address ?? "" }}</td>
                                        <td>{{ $item->shipping_address_button ?? "off" }}</td>
                                        <td>{{ $item->shipping_name ?? "" }}</td>
                                        <td>{{ $item->shipping_address ?? "" }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <div style="display:flex;">
                                                <a href="{{ route('orders.edit', $item->id) }}" title="show"
                                                    class="dynamicModal">
                                                    <button class="btn btn-success btn-sm">Order Details</button>
                                                </a>
                                            </div>
                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>

@endsection



