@extends('frontend.layouts.app')
@section('content')
@if ($page_image)
<section class="hero1" style="background-image:url({{ asset('public/pageimages/' . $page_image->images) }})">
</section>
@else
<section class="hero-signin">
</section>
@endif

<section class="contact py-5">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-4 mx-auto text-center">
                <img src="{{asset('public/frontend/images/homeicon.png')}}" class="d-block mx-auto">
                <img src="{{asset('public/frontend/images/line_separator_01.png')}}">
                <h4>Login</h4>
                <br>
                <form class="signin text-center" action="{{route('login')}}" method="POST">
                    @csrf
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    <div class="col-md-12">
                        <input type="email" name="email" class="form-control mb-2 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" name="">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
            
                    <div class="col-md-12">
                        <input type="password" class="form-control mb-4  @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Passwowrd" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <strong>Google recaptcha :</strong>
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                   
                    <input type="submit" class="btn btn-primary mb-4" value="Sign-in" />
                    <a class="d-block text-white" href="{{ route('password.request') }}">Forgot Password?</a>
                </form>
            </div>


        </div>
    </div>
</section>


@endsection
