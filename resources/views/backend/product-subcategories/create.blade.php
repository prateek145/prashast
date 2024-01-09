@extends('backend.layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <div class="d-flex justify-content-between">
            <h1>Sub Category</h1>
            <a href="{{route('product.sub.cat.index', $id)}}"> <button class="btn btn-primary">Index Sub-Category</button> </a>
        </div>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Sub Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="card">
        <div class="card-body">
            <p></p>
            <form action="{{ route('product-subcategories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Name</label>
                            <input class="form-control" name="name" placeholder="Enter Category Name" required />
                            @error('name')
                                <label id="name-error" class="error text-danger" for="name">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">status</label>
                            <select name="status" id="" class="form-control" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>

                        </div>
                    </div>

                    <input type="hidden" value="{{ $id }}" name="parent_id">

                    <input type="hidden" name="created_by" value="{{ auth()->id() }}">

                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Featured Image</label>
                            <input class="form-control" name="featured_image" type="file" required />
                            @error('featured_image')
                                <label id="featured_image-error" class="error text-danger"
                                    for="featured_image">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Icon Image</label>
                            <input class="form-control" name="icon_image" type="file" required />
                            @error('icon_image')
                                <label id="icon_image-error" class="error text-danger"
                                    for="icon_image">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Dark Icon Image</label>
                            <input class="form-control" name="dark_icon" type="file" required />
                            @error('dark_icon')
                                <label id="dark_icon-error" class="error text-danger"
                                    for="dark_icon">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="">
                            <label for="control-label font-description-bold">Description</label>
                            <textarea name="description" id="editor1"></textarea>
                            @error('description')
                                <label id="description-error" class="error text-danger"
                                    for="description">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    </div>
</main>
@endsection
