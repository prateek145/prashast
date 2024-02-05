@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Page Images</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
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
                            <form class="row g-3" action="{{ route('pages-images.update', $pageImage->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-6">
                                        <label for="inputNanme4" class="form-label ">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ $pageImage->name ?? '' }}" id="inputNanme4">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <label for="phone" class="form-label">Status</label>
                                        <select class="form-control form-select @error('status') is-invalid @enderror"
                                            name="status">
                                            <option value="">Select</option>
                                            <option {{ $pageImage->status == 1 ? 'selected' : '' }} value="1">Active
                                            </option>
                                            <option {{ $pageImage->status == 0 ? 'selected' : '' }} value="0">Inactive
                                            </option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    {{-- prateek --}}
                                    <div class="col-md-12 mt-3">
                                        @if ($pageImage->images)
                                            <img src="{{ asset('public/pageimages/' . $pageImage->images) }}"
                                                alt="" style="width: 100%">
                                        @endif
                                    </div>
                                    <label for="">Images</label>
                                    <input type="file" name="images"
                                        class="form-control @error('images') is-invalid @enderror">
                                </div>

                                {{-- <div class="col-md-3">
                                    @if ($pageImage->specific_image)
                                 
                                        @foreach (json_decode($pageImage->specific_image) as $item1)
                                            <div class="col-md-3 mt-3">
                                                <img src="{{ asset('public/pageimages/' . $item1) }}" alt="">
                                            </div>
                                        @endforeach
                                    @endif
                                    <label for="">Specific Images</label>
                                    <input type="file" name="specific_image"
                                        class="form-control @error('specific_image') is-invalid @enderror">
                                </div> --}}
                                {{-- <input type="hidden" name="role" value="user"> --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
