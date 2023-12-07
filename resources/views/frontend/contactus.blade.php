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
                <div class="col-lg-4">
                    <h1 class="text-center mb-5">We would love
                        to hear from you!</h1>
                    <form class="text-center" action="{{ route('contact.us') }}" method="POST">
                        @csrf
                        <div class="mb-3">

                            <input type="text" class="form-control" id="name" name="name" placeholder="Name *">

                        </div>
                        <div class="mb-3">

                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject *">

                        </div>
                        <div class="mb-3">

                            <input type="email" class="form-control" id="email" name="email" placeholder="Email *">

                        </div>
                        <div class="mb-3">

                            <textarea class="form-control" name="message" placeholder="Message"></textarea>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-lg-2 text-center">
                    <h1 class="text-center mb-5">Reach Us</h1>

                    <h4>ADDRESS</h4>
                    <p>c-98, Gr ound floor,<br>
                        Sector-10, Noida,<br>
                        Uttar Pradesh- 201301</p>

                    <h4>EMAIL</h4>
                    <p>info@eprashast.co.in</p>

                    <h4>PHONE</h4>
                    <p>+91 7982512636</p>

                </div>
                <div class="col-lg-3"></div>


            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <img src="{{asset('public/frontend/images/line_separator_01.png')}}" class="my-5">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="mx-auto text-center col-lg-3">
                    <h5>PLACE BULK ORDER</h5>
                    <div class="col-lg-12">
                        <h1 class="text-center mb-5">We would love
                            to hear from you!</h1>
                        <form class="text-center" action="{{ route('bulk.order.page.save') }}" method="POST">
                            @csrf
                            <div class="mb-3">
    
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name *">
    
                            </div>
                            <div class="mb-3">
    
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject *">
    
                            </div>
                            <div class="mb-3">
    
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email *">
    
                            </div>
                            <div class="mb-3">
    
                                <textarea class="form-control" name="message" placeholder="Message"></textarea>
    
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="mx-auto text-center col-lg-3">
                    <h5>SCHEDULE A PURCHASE</h5>
                    <div class="col-lg-12">
                        <h1 class="text-center mb-5">We would love
                            to hear from you!</h1>
                        <form class="text-center" action="{{ route('schedule.a.purchase') }}" method="POST">
                            @csrf
                            <div class="mb-3">
    
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name *">
    
                            </div>
                            <div class="mb-3">
    
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email *">
    
                            </div>

                            <div class="mb-3">
    
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone *">
    
                            </div>

                            <div class="mb-3">
                                <label for="">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start *">
    
                            </div>

                            <div class="mb-3">
                                <label for="">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" placeholder="End Date *">
    
                            </div>

                            <div class="mb-3">
    
                                <textarea class="form-control" name="address" placeholder="Address"></textarea>
    
                            </div>

                            <div class="mb-3">
    
                                <textarea class="form-control" name="message" placeholder="Message"></textarea>
    
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>

        </div>
    </section>
    <section class="category py-5 d-lg-none d-block">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel cate">
                        <div class="item"> <img src="{{asset('public/frontend/images/zevar.png')}}" class="img-fluid icon" /> </div>
                        <div class="item"> <img src="{{asset('public/frontend/images/baans.png')}}" class="img-fluid icon" /> </div>
                        <div class="item"> <img src="{{asset('public/frontend/images/soot.png')}}" class="img-fluid icon" /> </div>
                        <div class="item"> <img src="{{asset('public/frontend/images/maati.png')}}" class="img-fluid icon" /> </div>
                        <div class="item"> <img src="{{asset('public/frontend/images/kala.png')}}" class="img-fluid icon" /> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="category py-5 d-none d-lg-block">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center mx-auto position-relative">
                    @foreach ($sub_categories as $item)
                    <a href="{{route('dynamic.subcategories', $item->slug)}}"><img src="{{asset('public/productsubcategory/'.$item->featured_image)}}" class="img-fluid icon m-grid rounded-4" /></a> 
                        
                    @endforeach

                </div>
            </div>

        </div>
    </section>
    
    <section class="mostviewed text-white text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleAutoplayingb" class="my-lg-5 py-lg-5 carousel slide bg-pattern"
                        data-bs-ride="carousel">
                        <div class="carousel-inner py-lg-5 my-lg-5">
                            <div class="carousel-item active py-lg-5 my-lg-5">
                                <img src="{{asset('public/frontend/images/icon-top.png')}}" class="img-fluid d-block mx-auto">
                                <img src="{{asset('public/frontend/images/top-separator-white.png')}}" class="img-fluid d-block mx-auto">
                                <h4>Kala</h4>
                                <h6>MADHUBANI PAINTING</h6>
                                <h5>TOP SELLER</h5>
                            </div>
                            <div class="carousel-item py-lg-5 my-lg-5">
                                <img src="{{asset('public/frontend/images/icon-top.png')}}" class="img-fluid d-block mx-auto">
                                <img src="{{asset('public/frontend/images/top-separator-white.png')}}" class="img-fluid d-block mx-auto">
                                <h4>Kala</h4>
                                <h6>MADHUBANI PAINTING</h6>
                                <h5>TOP SELLER</h5>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleAutoplayingb" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleAutoplayingb" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
