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

            @if ($user_order != [])
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>Zipcode</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_order as $item)

                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $item->order_date }}</td>
                                        <td>{{ $item->order_status }}</td>
                                        <td>{{ $item->customer_name }}</td>
                                        <td>{{ $item->customer_phone }}</td>
                                        <td>{{ $item->customer_email }}</td>
                                        <td>{{ $item->customer_address }}</td>
                                        <td>{{ $item->customer_country }}</td>
                                        <td>{{ $item->customer_state }}</td>
                                        <td>{{ $item->customer_zipcode }}</td>
                                        <td>
                                            <div style="display:flex;">
                                                <a href="{{ route('userorders.details', $item->id) }}" title="show"
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

            @else
                <h4>User Does not have any Order. </h4>

            @endif

        </div>
    </div>

@endsection
