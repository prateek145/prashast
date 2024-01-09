@extends('backend.layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <div class="d-flex justify-content-between">
            <h1>Sub Category</h1>
            <a href="{{ route('products-categories.index') }}" class="btn btn-danger btn-sm">return back</a>

        </div>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Sub Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Update Sub Product Category</h4>
        </div>
        <div class="card-body">
            <p></p>
            <form action="{{ route('product-subcategories.update', $productcategories->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Name</label>
                            <input class="form-control" name="name" placeholder="Enter Category Name"
                                value="{{ $productcategories->name }}" required />
                            @error('name')
                                <label id="name-error" class="error text-danger" for="name">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">status</label>
                            <select name="status" id="status1" class="form-control" required>
                                {{-- <option value="">Status</option> --}}
                                <option value="1" {{$productcategories->status == 1 ? 'selected':''}}>Active</option>
                                <option value="0" {{$productcategories->status == 0 ? 'selected':''}}>Inactive</option>
                            </select>

                        </div>
                    </div>

                    <input type="hidden" name="updated_by" value="{{ auth()->id() }}">

                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            @if ($productcategories->featured_image != null)
                                
                                <img src="{{ asset('public/productsubcategory/' . $productcategories->featured_image) }}" alt=""
                                    width="90%" height="90%" class="p-5">
    
                            @else
                                <h4>Featured Image is not available</h4>
                            @endif
                            <label for="control-label font-weight-bold">Featured Image</label>
                            <input class="form-control" name="featured_image" type="file" />
                            @error('featured_image')
                                <label id="featured_image-error" class="error text-danger"
                                    for="featured_image">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
    
                    <div class="col-md-3">
                        <div class="form-group">
                            @if ($productcategories->icon_image != null)
                                
                                <img src="{{ asset('public/productsubcategory/' . $productcategories->icon_image) }}" alt=""
                                    width="90%" height="90%" class="p-5">
    
                            @else
                                <h4>icon Image is not available</h4>
                            @endif
                            <label for="control-label font-weight-bold">icon Image</label>
                            <input class="form-control" name="icon_image" type="file" />
                            @error('icon_image')
                                <label id="icon_image-error" class="error text-danger"
                                    for="icon_image">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            @if ($productcategories->dark_icon != null)
                                
                                <img src="{{ asset('public/productsubcategory/' . $productcategories->dark_icon) }}" alt=""
                                    width="90%" height="90%" class="p-5">
    
                            @else
                                <h4>Dark icon is not available</h4>
                            @endif
                            <label for="control-label font-weight-bold">Dark icon</label>
                            <input class="form-control" name="dark_icon" type="file" />
                            @error('dark_icon')
                                <label id="dark_icon-error" class="error text-danger"
                                    for="dark_icon">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="control-label font-description-bold">Description</label>
                            <textarea name="description" id="editor1">{{ $productcategories->description }}</textarea>
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
