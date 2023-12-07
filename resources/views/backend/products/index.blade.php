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
                <h4>Products</h4>
                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Add New Product</a>
            </div>

            <div class="">

                <!-- Single Widget -->
                <section class="single-widget widget-search">
                    <form action="{{ route('products.index') }}" method="GET" class="float-right col-md-3 mt-3">
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
                                <th> Name</th>
                                <th>Created_at</th>
                                <th>Actions</th>
                                <th>Attribute</th>
                                <th>Variance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)

                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    {{-- <td>{{ $item->role }}</td> --}}
                                    <td>
                                        <div style="display:flex;">
                                            {{-- <a href="{{ route('products.show', $item->id) }}" title="show"
                                                class="dynamicModal">
                                                <button class="btn btn-success btn-sm">show</button>
                                            </a> --}}
                                            &nbsp;
                                            <a href="{{ route('products.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            &nbsp;
                                            <form id="delete_form{{ $item->id }}" method="POST"
                                                action="{{ route('products.destroy', $item->id) }}"
                                                onclick="return confirm('Are you sure?')">
                                                @csrf
                                                @method('Delete')

                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                            </form>
                                        </div>

                                    </td>

                                    @if ($item->product_type == 'variable_product')
                                        <td><a href="{{ route('product.attr', $item->id) }}"> <button
                                                    class="btn btn-warning btn-sm">set
                                                    attributes</button>
                                            </a></td>

                                        <td><a href="{{ route('product-variance', $item->id) }}"> <button
                                                    class="btn btn-warning btn-sm">set
                                                    variance</button>
                                            </a></td>

                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $products->links() }}
        </div>
    </div>

@endsection
