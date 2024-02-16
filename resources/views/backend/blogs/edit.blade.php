@extends('backend.layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Blog</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Blog</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Add Blog</h5>
                        <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="control-label font-weight-bold">Name</label>
                                        <input class="form-control" name="name" value="{{$blog->name ?? ''}}"/>
                                        @error('name')
                                            <label id="name-error" class="error text-danger" for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="control-label font-weight-bold">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{$blog->status == 1 ? 'selected':''}}>Active</option>
                                            <option value="0" {{$blog->status == 0 ? 'selected':''}}>InActive</option>
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
                                        <textarea name="short_description" class="form-control">{{$blog->short_description ?? ""}}</textarea>
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
                                        <textarea name="description" id="editor1">{!! $blog->description ?? "" !!}</textarea>
                                        @error('content')
                                            <label id="content-error" class="error text-danger" for="content">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="control-label font-weight-bold">Image</label>
                                    @if ($blog->image)
                                        <img src="{{asset('public/blogs/' . $blog->image)}}" width="100%" alt="">
                                    @endif
                                    <input class="form-control" name="image" type="file"/>
                                    @error('image')
                                        <label id="image-error" class="error text-danger" for="name">{{ $message }}</label>
                                    @enderror
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

