@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Footer Images</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Footer Images</li>
                </ol>
            </nav>
        </div><!-- End Footer Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Add Footer Images</h5>
                            <form class="row g-3" action="{{ route('footer.image.save') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- {{dd($footer_image)}} --}}
                                @if ($footer_image)
                                    <div class="col-md-12">
                                        <div>
                                            <img src="{{asset('public/pageimages/' . $footer_image->image)}}" alt="">
                                        </div>
                                        <label for="">Images</label>
                                        <input type="file" name="images"
                                            class="form-control @error('images') is-invalid @enderror" required>
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <label for="">Images</label>
                                        <input type="file" name="images"
                                            class="form-control @error('images') is-invalid @enderror" required>
                                    </div>
                                @endif


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
