@extends('backend.layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Add Category</h5>
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
                                            {{-- <option value="">Status</option> --}}
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                        
                                    </div>
                                </div>
                        
                                <input type="hidden" name="created_by" value="{{ auth()->id() }}">
                        
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="control-label font-weight-bold">Featured Image</label>
                                        <input class="form-control" name="featured_image" type="file"/>
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
                                        <label for="control-label font-description-bold">Description</label><br>
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
        </div>
    </section>
</main><!-- End #main -->
    
@endsection


