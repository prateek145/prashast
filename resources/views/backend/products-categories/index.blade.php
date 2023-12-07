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
                <h4>Product Category</h4>
                <a href="{{ route('products-categories.create') }}" class="btn btn-primary btn-sm">Add New
                    ProductCategory</a>
            </div>

            <div class="">

                <!-- Single Widget -->
                <section class="single-widget widget-search">
                    <form action="{{ route('products-categories.index') }}" method="GET"
                        class="float-right col-md-3 mt-3">
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
                                <th>Actions</th>
                                <th>Sub-Categories</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productcategories as $item)

                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <div style="display:flex;">
                                            <a href="{{ route('products-categories.show', $item->id) }}" title="show"
                                                class="dynamicModal">
                                                <button class="btn btn-success btn-sm">show</button>
                                            </a>
                                            &nbsp;
                                            <a href="{{ route('products-categories.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            &nbsp;
                                            {{-- <form id="delete_form{{ $item->id }}" method="POST"
                                                action="{{ route('products-categories.destroy', $item->id) }}"
                                                onclick="return confirm('Are you sure?')">
                                                @csrf
                                                @method('Delete')

                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                            </form> --}}
                                        </div>

                                    </td>
                                    <td>
                                        <a href="{{ route('product.sub.cat.index', $item->slug) }}"> <button
                                                class="btn btn-primary btn-sm">Sub-category</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $productcategories->links() }}
        </div>
    </div>

@endsection
