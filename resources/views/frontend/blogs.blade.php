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
        @foreach ($blogs as $item)
        <div class="col-md-12">
            <a href="{{route('blogs.show', $item->id)}}">
                <img src="{{asset('public/blogs/' . $item->image)}}" width="100%" alt="">
            </a> 
            <h3>{{$item->name ?? ""}}</h3>
            <p>{{$item->short_description ?? ""}}</p>
        </div>
            
        @endforeach
    </div>
@endsection
