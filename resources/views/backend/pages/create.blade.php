@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Create Pages</h4>
            <a href="{{ route('pages.index') }}" class="btn btn-danger btn-sm">return back</a>
        </div>
        <div class="card-body">
            <p></p>
            <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Name</label>
                            <input class="form-control" name="name" />
                            @error('name')
                                <label id="name-error" class="error text-danger" for="name">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                </div>


                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Content</label>
                            <textarea name="content" id="editor"></textarea>
                            @error('content')
                                <label id="content-error" class="error text-danger" for="content">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Image</label>
                            <input class="form-control" name="featured_image" type="file" />
                            @error('featured_image')
                                <label id="featured_image-error" class="error text-danger"
                                    for="featured_image">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>



                </div> --}}



                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    </div>

@endsection
