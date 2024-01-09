@extends('backend.layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pages</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Pages</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Add Pages</h5>
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
                                        <textarea name="content" id="editor1"></textarea>
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
