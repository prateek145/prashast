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
                            <form class="row g-3" action="{{ route('slider.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    @php
                                        if (!is_null($shop_slider)) {
                                            # code...
                                            $images = json_decode($shop_slider->images) ?? null;
                                        } else {
                                            $images = null;
                                        }
                                    @endphp
                                    @if ($images)
                                        @foreach ($images as $item)
                                            <div class="col-md-6">
                                                <img src="{{ asset('public/shopslider/' . $item) }}" width="100%"
                                                    class="mt-4">
                                            </div>
                                        @endforeach
                                    @endif

                                </div>

                                <div class="col-md-12">
                                    <label for="">Images</label>
                                    <input type="file" name="images[]"
                                        class="form-control @error('images') is-invalid @enderror" multiple>

                                </div>

                                {{-- <div class="col-6">
                                    <label for="phone" class="form-label">Status</label>
                                    <select class="form-control form-select @error('status') is-invalid @enderror"
                                        name="status">
                                        <option value="">Select</option>
                                        <option {{ old('status') == 1 ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Inactive
                                        </option>
                                    </select>
                                </div> --}}

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
