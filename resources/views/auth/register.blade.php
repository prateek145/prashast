@extends('frontend.layouts.app')
@section('content')
    <section class="hero-signin">
    </section>

    <section class="contact py-5">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-4 mx-auto text-center">
                    <img src="{{ asset('public/frontend/images/homeicon.png') }}" class="d-block mx-auto">
                    <img src="{{ asset('public/frontend/images/line_separator_01.png') }}">
                    <h4>Register</h4>
                    <br>
                    <form class="form" action="{{ route('register') }}" method="POST">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-3">
                            <input type="text" id="form2Example1" name="name"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Full Name" value="{{old('name')}}"/>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-3">
                            <input type="email" id="form2Example1" name="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email')}}"/>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-3">
                            <input type="text" id="form2Example1" name="phone"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Phone Number" value="{{old('phone')}}"/>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-outline mb-3">
                            <input type="text" id="form2Example1"
                                class="form-control @error('pincode') is-invalid @enderror" name="pincode" placeholder="Pincode" value="{{old('pincode')}}"/>
                            @error('pincode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-outline mb-5">
                            <textarea class="form-control form-text @error('address') is-invalid @enderror" name="address"
                                placeholder="Flat, House no, Buildings, Company, Apartment" rows="5">{{old('address')}}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-outline mb-5">
                            <textarea class="form-control form-text @error('address1') is-invalid @enderror"
                                placeholder="Area, Street, Sector, Villages" name="address1"  rows="5">{{old('address1')}}</textarea>
                            @error('address1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-outline mb-3">
                            <input type="text" id="form2Example1"
                                class="form-control @error('landmark') is-invalid @enderror" name="landmark" value="{{old('landmark')}}" placeholder="Landmark" />
                            @error('landmark')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-outline mb-3">
                            <input type="text" id="form2Example1"
                                class="form-control @error('city') is-invalid @enderror" name="city" placeholder="Town/City" value="{{old('city')}}" name="city"/>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-outline mb-3">
                            <input type="text" id="form2Example1"
                                class="form-control @error('state') is-invalid @enderror" name="state" value="{{old('state')}}" placeholder="State" />
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="form2Example2" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Set password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-3">
                            <input type="password" id="form2Example2" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                placeholder="Confirm password" />
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block my-4">Register</button>


                    </form>
                </div>


            </div>
        </div>
    </section>
@endsection
