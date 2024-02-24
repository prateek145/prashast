@extends('frontend.layouts.app')
{{-- @include('frontend.layouts.header') --}}
@section('content')
    <section class="hero-contact">
    </section>
    <section class="contact py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="{{asset('public/frontend/images/cat-icon-dark.png')}}" class="d-block mx-auto">
                    <img src="{{asset('public/frontend/images/line_separator_01.png')}}" class="my-5">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <h1 class="text-center mb-5">We would love
                        to hear from you!</h1>
                    <form class="text-center" action="{{ route('bulk.order.page.save') }}" method="POST">
                        @csrf
                        <div class="mb-3">

                            <input type="text" class="form-control" id="name" name="name" placeholder="Name *" required>

                        </div>
                        <div class="mb-3">

                            <input type="email" class="form-control" id="email" name="email" placeholder="Email *" required>

                        </div>
                        <div class="mb-3">

                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone *">

                        </div>
                        <div class="mb-3">

                            <textarea class="form-control" name="message" placeholder="Message"></textarea>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                {{-- <div class="col-lg-2 text-center">
                    <h1 class="text-center mb-5">Bulk Order</h1>

                    <h4>ADDRESS</h4>
                    <p>c-98, Gr ound floor,<br>
                        Sector-10, Noida,<br>
                        Uttar Pradesh- 201301</p>

                    <h4>EMAIL</h4>
                    <p>info@eprashast.co.in</p>

                    <h4>PHONE</h4>
                    <p>+91 7982512636</p>

                </div> --}}
                <div class="col-lg-3"></div>


            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <img src="{{asset('public/frontend/images/line_separator_01.png')}}" class="my-5">
                </div>
            </div>


        </div>
    </section>


@endsection

