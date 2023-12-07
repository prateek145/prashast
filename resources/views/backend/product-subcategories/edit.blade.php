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
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Update Product Category</h4>
            <a href="{{ route('products-categories.index') }}" class="btn btn-danger btn-sm">return back</a>
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
                                <option value="">Status</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>

                        </div>
                    </div>

                    <input type="hidden" name="updated_by" value="{{ auth()->id() }}">

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            @if ($productcategories->featured_image != null)
                                
                                <img src="{{ asset('productsubcategory/' . $productcategories->featured_image) }}" alt=""
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
    
                    <div class="col-md-6">
                        <div class="form-group">
                            @if ($productcategories->icon_image != null)
                                
                                <img src="{{ asset('productsubcategory/' . $productcategories->icon_image) }}" alt=""
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

                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="control-label font-description-bold">Description</label>
                            <textarea name="description" id="editor">{{ $productcategories->description }}</textarea>
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

    <script>
        var status = "{{ $productcategories->status }}";
        var stat = document.getElementById('status1');
        stat.value = status;
    </script>
@endsection
