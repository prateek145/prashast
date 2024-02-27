@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Coupons</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Coupons</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Add Coupons</h5>
                            <form action="{{ route('coupon.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-4">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Code</label>
                                            <input class="form-control" name="code" />
                                            @error('code')
                                                <label id="code-error" class="error text-danger"
                                                    for="code">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Type</label>
                                            <select name="type" id="" class="form-control">
                                                <option value="">Select</option>
                                                <option value="percent">Percent</option>
                                                <option value="fixed">Fixed</option>
                                            </select>
                                            @error('type')
                                                <label id="type-error" class="error text-danger"
                                                    for="name">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Single/Multiple Times</label>
                                            <select name="count" class="form-control">
                                                <option value="2">Multiple</option>
                                                <option value="1">Single</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            @error('count')
                                                <label id="count-error" class="error text-danger"
                                                    for="name">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Value</label>
                                            <input type="text" name="value" class="form-control">
                                            @error('value')
                                                <label id="value-error" class="error text-danger"
                                                    for="value">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Category</label>
                                            <select name="category" id="" class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <label id="category-error" class="error text-danger"
                                                    for="category">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Product</label>
                                            <select name="product" id="" class="form-control">
                                                <option value="">Select</option>
                                            </select>
                                            @error('product')
                                                <label id="product-error" class="error text-danger"
                                                    for="product">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="form-group mt-3">
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title">Manage Coupons</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>code</th>
                                    <th>Type</th>
                                    <th>value</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $item->code }}</td>
                                        <td>{!! $item->type !!}</td>
                                        <td>{{ $item->value }}</td>
                                        <td>{{ $item->categoryName->name ?? '' }}</td>
                                        <td>
                                            <div style="display:flex;">
                                                <a href="{{ route('coupon.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                &nbsp;
                                                {{-- <form id="delete_form{{ $item->id }}" method="POST"
                                                action="{{ route('blog.destroy', $item->id) }}"
                                                onclick="return confirm('Are you sure?')">
                                                @csrf
                                                @method('Delete')
                        
                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                            </form> --}}
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
