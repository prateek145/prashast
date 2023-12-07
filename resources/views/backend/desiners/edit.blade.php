@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Edit Desiners</h4>
            <a href="{{ route('desiners.index') }}" class="btn btn-danger btn-sm">return back</a>
        </div>
        <div class="card-body">
            <p></p>
            <form action="{{ route('desiners.update', $desiner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Name</label>
                            <input class="form-control" name="name" placeholder="Enter desiner name"
                                value="{{ $desiner->name }}" />
                            @error('name')
                                <label id="name-error" class="error text-danger" for="name">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">FeaturedImage</label>
                            <td><img src="{{ asset('desiners/' . $desiner->featured_image) }}" alt="" width="80%"
                                    height="80%"></td>
                            <input type="file" name="featured_image" class="form-control">

                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Description</label>
                            <textarea name="description" id="editor">{{ $desiner->description }}</textarea>
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
