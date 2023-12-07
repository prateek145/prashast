@extends('frontend.layouts.app')
{{-- @include('frontend.layouts.header') --}}
@section('content')
    <section id="breadcrumbRow" class="row">
        <h2>Vendor page</h2>
        <div class="row pageTitle m0">
            <div class="container">
                <h4 class="fleft">Become a Vendor</h4>
                <ul class="breadcrumb">
                    <li><a href="index2.html">home</a></li>
                    <li class="active">Vendor page</li>
                </ul>
            </div>
        </div>
    </section>
    <section id="contactRow" class="row contentRowPad">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row m0">
                        <h4 class="contactHeading heading">Become a Vendor</h4>
                    </div>
                    <div class="row m0 contactForm">
                        <form class="row m0" id="contactForm" method="post"
                            action="{{ route('become.a.vendor') }}" name="contact">
                            @csrf

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="row m0">
                                <label for="subject">subject *</label>
                                <input type="text" class="form-control" name="subject" id="subject" required>
                            </div>
                            <div class="row m0">
                                <label for="message">your message</label>
                                <textarea name="message" id="message" class="form-control" required></textarea>
                            </div>

                            <button class="btn btn-primary btn-lg filled" type="submit">send message</button>
                        </form>

                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade in show col-md-12">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row m0">
                        <h4 class="contactHeading heading">Reach Us</h4>
                    </div>
                    <div class="media contactInfo">
                        <div class="media-left">
                            <i class="fas fa-map-marker"></i>
                        </div>
                        <div class="media-body">
                            <h5 class="heading">where to reach us</h5>
                            <p>You can reach us at the following address:</p>
                            <h5>C-98, Ground Floor, Sector-10, Noida, Uttar Pradesh 201301</h5>
                        </div>
                    </div>
                    <!--contactInfo-->
                    <div class="media contactInfo">
                        <div class="media-left">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="media-body">
                            <h5 class="heading">Email us @</h5>
                            <p>Email your issues and suggestion for the following email addresses: </p>
                            <h5>prashastinnovations@gmail.com</h5>
                        </div>
                    </div>
                    <!--contactInfo-->
                    <div class="media contactInfo">
                        <div class="media-left">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <h5 class="heading">need to call us?</h5>
                            <p> Monday to Friday,10:00 AM - 6:00 PM, call us at:</p>
                            <h5>+91-77018 60046</h5>
                        </div>
                    </div>
                    <!--contactInfo-->
                    {{-- <div class="media contactInfo">
                        <div class="media-left">
                            <i class="fas fa-question"></i>
                        </div>
                        <div class="media-body">
                            <h5 class="heading">we have great support</h5>
                            <p>We provide the best Quality of products to you.We are always here to help our lovely
                                customers.We ship our products anywhere with more secure. We provide the best Quality of
                                products to you.</p>
                        </div>
                    </div> --}}
                    <!--contactInfo-->
                </div>
            </div>
        </div>
    </section>
@endsection
