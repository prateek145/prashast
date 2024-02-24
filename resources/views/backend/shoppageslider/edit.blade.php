@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Shop Page Slider</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Shop</a></li>
                    <li class="breadcrumb-item active">Shop Page Slider</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Add Shop Page Slider</h5>
                            <form class="row g-3" action="{{ route('slider.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    @php
                                        if (!is_null($shop_slider)) {
                                            # code...
                                            $images = json_decode($shop_slider->images) ?? null;
                                            $links = json_decode($shop_slider->links) ?? null;
                                        } else {
                                            $images = null;
                                            $links = null;
                                        }
                                    @endphp
                                    @if ($images)
                                        @foreach ($images as $key => $item)
                                            <div class="col-md-6">
                                                {{$links[$key] ?? ""}}
                                                <img src="{{ asset('public/shopslider/' . $item) }}" width="100%"
                                                    class="mt-4">
                                            </div>
                                        @endforeach

                                    @endif

                                </div>

                                <div class="container">
                                    <div class="row sub_container">
                                        <div class="col-md-6">
                                            <label for="">Images</label>
                                            <input type="file" name="images[]"
                                                class="form-control @error('images') is-invalid @enderror" required>
        
                                        </div>
    
                                        <div class="col-md-6">
                                            <label for="">Links</label>
                                            <input type="text" class="form-control" name="links[]" placeholder="Enter Links" required>
                                        </div>
    
                                    </div>

                                </div>
                                <div class="row d-flex">
                                    <div class="col-md-2 mt-3">
                                        <input type="button" onclick="addmore()" value="Add" class="btn btn-success btn-sm">
                                        <input type="button" onclick="remove()" value="Remove" class="btn btn-danger btn-sm">

                                    </div>
                                </div>
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

    <script>
        var container = document.getElementsByClassName("container")[0];
        
        function addmore(){
            var sub_container = document.getElementsByClassName("sub_container")[0];
            var data = sub_container.cloneNode(true);
            container.appendChild(data);
        }

        function remove(){
            var length = document.getElementsByClassName("sub_container").length;
            if (length > 1) {
                container.removeChild(container.lastChild);
            }
        }

    </script>
@endsection
