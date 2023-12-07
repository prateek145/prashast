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
                    <form action="{{ route('orders.index') }}" method="GET" class="float-right col-md-3 mt-3">
                        <input type="text" name="search" placeholder="Search Keyword Use Enter" class="form-control">
                    </form>
                </section>
                <!--// Single Widget -->
            </div>

            @if ($orders != [])
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    {{-- <th>Token</th> --}}
                                    <th>Order Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>Pincode</th>
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
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->country }}</td>
                                        <td>{{ $item->state }}</td>
                                        <td>{{ $item->pincode }}</td>
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
                    {{$orders->links()}}
                </div>
            @else
                <h4>User Does not have any Order. </h4>
            @endif

        </div>
    </div>

@endsection
