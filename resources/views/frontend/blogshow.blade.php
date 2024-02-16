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

    <div class="col-md-8">
        <div class="col-md-12">
            <img src="{{asset('public/blogs/' . $blog->image)}}" width="100%" alt="">
            <h3>{{$blog->name ?? ""}}</h3>
            <p>{{$blog->short_description ?? ""}}</p>
            <p>{{$blog->description ?? ""}}</p>
        </div>
            
    </div>
@endsection
