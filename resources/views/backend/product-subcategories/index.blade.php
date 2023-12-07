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
                <h4>Product Sub-Category</h4>
                <a href="{{ route('product.sub.cat.create', $id) }}" class="btn btn-primary btn-sm">Add New
                    ProductSubCategory</a>
            </div>

            <div class="">

                <!-- Single Widget -->
                {{-- <section class="single-widget widget-search">
                    <form action="{{ route('product-subcategories.index') }}" method="GET"
                        class="float-right col-md-3 mt-3">
                        <input type="text" name="search" placeholder="Search Keyword Use Enter" class="form-control">
                    </form>
                </section> --}}
                <!--// Single Widget -->
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                <th>Description</th>
                                <th>image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productcategories as $item)

                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{!! $item->description !!}</td>
                                    <td>
                                        @if ($item->featured_image != null)
                                            <img src="{{ asset('productsubcategory/' . $item->featured_image) }}" alt=""
                                                height="20%" width="20%" />

                                        @else

                                        @endif

                                    </td>
                                    <td>
                                        <div style="display:flex;">
                                            <a href="{{route('product.sub.cat.edit', $item->id)}}">
                                                <button class="btn btn-warning btn-sm">Edit</button>
                                            </a>
                                            <form id="delete_form{{ $item->id }}" method="POST"
                                                action="{{ route('product-subcategories.destroy', $item->id) }}"
                                                onclick="return confirm('Are you sure?')">
                                                @csrf
                                                @method('Delete')

                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                            </form>
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

@endsection
