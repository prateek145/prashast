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
            <a href="{{ route('pages.index') }}" class="btn btn-danger btn-sm ">return back</a>
        </div>
        <div class="card-body">
            <p></p>
            <form action="{{ route('pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Name</label>
                            <input class="form-control" name="name" value="{{ $page->name }}" />
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
                            <textarea name="content" id="editor">{{ $page->content }}</textarea>
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
