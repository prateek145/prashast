@extends('backend.layouts.app')
@section('content')

    <style>
        .col {
            font-size: 1.1vw;
            background-color: #5A5D60;
            color: aliceblue;
            padding: 2%;
            width: 50%;
            display: flex;
            justify-content: center;
            margin-left: 30%;

        }

    </style>

    <div style="height: 5vw">
        <a href="{{ route('users.index') }}" class="btn btn-danger btn-sm float-right m-5">return back</a>

    </div>
    <div class="col">
        Name -> {{ $productcategories->name }}<br><br>
        Description -> {{ $productcategories->description }}<br><br>
        Created_at -> {{ $productcategories->created_at }}<br><br>
        @if ($productcategories->featured_image != null)
            Logo -> <img src="{{ asset('productcategory/' . $productcategories->featured_image) }}" alt="" width="200px"
                height="200px" style="margin-top: 200px">

        @endif

    </div>


@endsection
