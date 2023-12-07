@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Create product Categories</h4>
            <a href="{{ route('products-categories.index') }}" class="btn btn-danger btn-sm">return back</a>
        </div>
        <div class="card-body">
            <p></p>
            <form action="{{ route('products-categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Name</label>
                            <input class="form-control" name="name" placeholder="Enter Category Name" required />
                            @error('name')
                                <label id="name-error" class="error text-danger" for="name">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">status</label>
                            <select name="status" id="" class="form-control" required>
                                <option value="">Status</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>

                        </div>
                    </div>

                    <input type="hidden" name="created_by" value="{{ auth()->id() }}">

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
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="control-label font-description-bold">Description</label>
                            <textarea name="description" id="editor"></textarea>
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

@endsection
