@extends('frontend.layouts.app')
{{-- @include('frontend.layouts.header') --}}
@section('content')
    @if ($page_image)
    <section class="hero1" style="background-image:url({{asset('public/pageimages/' . $page_image->images)}})">
    </section>
    @else
    <section class="hero">
    </section>
        
    @endif

    <div style="width:60%; margin:auto; margin-top:5%; margin-bottom:5%;">
        {!! $page->content !!}

    </div>
@endsection
