@extends('frontend.layouts.app')
{{-- @include('frontend.layouts.header') --}}
@section('content')
    <section class="hero">
    </section>


    <div style="width:60%; margin:auto; margin-top:5%; margin-bottom:5%;">
        {!! $page->content !!}

    </div>
@endsection
