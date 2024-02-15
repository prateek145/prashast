@extends('backend.layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Blogs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Blogs</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Add Blogs</h5>
                        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-4">
                        
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="control-label font-weight-bold">Name</label>
                                        <input class="form-control" name="name" />
                                        @error('name')
                                            <label id="name-error" class="error text-danger" for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="control-label font-weight-bold">Image</label>
                                        <input class="form-control" name="image" type="file"/>
                                        @error('image')
                                            <label id="image-error" class="error text-danger" for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="control-label font-weight-bold">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                        @error('status')
                                            <label id="status-error" class="error text-danger" for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                        
                            </div>
                        
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="control-label font-weight-bold">Short Description</label>
                                        <textarea name="short_description" class="form-control"></textarea>
                                        @error('content')
                                            <label id="content-error" class="error text-danger" for="content">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="control-label font-weight-bold">Description</label>
                                        <textarea name="description" id="editor1"></textarea>
                                        @error('content')
                                            <label id="content-error" class="error text-danger" for="content">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
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
