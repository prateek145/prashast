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
                            <h5 class="card-title">Edit Coupons</h5>
                            <form action="{{ route('coupon.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row mt-4">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Code</label>
                                            <input class="form-control" name="code" value="{{$coupon->code ?? ""}}"/>
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
                                                <option value="percent" {{$coupon->type == 'percent' ? 'selected' : ''}}>Percent</option>
                                                <option value="fixed" {{$coupon->type == 'fixed' ? 'selected' : ''}}>Fixed</option>
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
                                                <option {{$coupon->type == 2 ? 'selected' : ''}} value="2">Multiple</option>
                                                <option {{$coupon->type == 1 ? 'selected' : ''}} value="1">Single</option>
                                                <option {{$coupon->type == 0 ? 'selected' : ''}} value="0">Inactive</option>
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
                                            <input type="text" name="value" value="{{$coupon->value ?? ''}}" class="form-control">
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
                                                    <option value="{{$item->id}}" {{$coupon->category == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
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
            </div>
        </section>
    </main><!-- End #main -->
@endsection
