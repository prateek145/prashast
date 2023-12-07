@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Create User</h4>
            <a href="{{ route('desiners.index') }}" class="btn btn-danger btn-sm">return back</a>
        </div>
        <div class="card-body">
            <p></p>
            <form action="{{ route('desiners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Name</label>
                            <input class="form-control" name="name" placeholder="Enter desiner name" />
                            @error('name')
                                <label id="name-error" class="error text-danger" for="name">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">FeaturedImage</label>
                            <input type="file" name="featured_image" class="form-control">

                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Description</label>
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
