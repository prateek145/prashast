@extends('backend.layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Page Images</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Page Images</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Add Page Images</h5>
                        <form class="row g-3" action="{{route('pages-images.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <label for="inputNanme4" class="form-label ">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" id="inputNanme4">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
    
                                <div class="col-6">
                                    <label for="phone" class="form-label">Status</label>
                                    <select class="form-control form-select @error('status') is-invalid @enderror" name="status">
                                        <option value="">Select</option>
                                        <option {{old('status') == 1 ? 'selected':""}} value="1">Active</option>
                                        <option {{old('status') == 0 ? 'selected':""}} value="0">Inactive</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <label for="">Images</label>
                                <input type="file" name="images" class="form-control @error('images') is-invalid @enderror" required>
                            </div>

                            <div class="col-md-12">
                                <label for="">Specific Images</label>
                                <input type="file" name="specific_image" class="form-control @error('specific_image') is-invalid @enderror" required>
                            </div>
                            {{-- <input type="hidden" name="role" value="user"> --}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Users</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pageImages as $item)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->status == 1 ? 'Active' : 'Inactive'}}</td>
                                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                                    <td><a href="{{route('pages-images.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a></td>
                                </tr>
                                    
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
    
@endsection