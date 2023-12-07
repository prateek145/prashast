@extends('frontend.layouts.app')
@section('content')
<section id="breadcrumbRow" class="row">
    <h2>Login</h2>
    {{-- {{ dd(Session::get('cart')) }} --}}
    <div class="row pageTitle m0">
        <div class="container">
            <h4 class="fleft">Login</h4>
            <ul class="breadcrumb">
                <li><a href="{{ route('frontend.home') }}">home</a></li>

                <li class="active">login</li>
            </ul>
        </div>
    </div>
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
