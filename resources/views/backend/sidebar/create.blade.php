@extends('backend.layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <div class="d-flex justify-content-between">
            <h1>Frontend SideBar</h1>
        </div>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Frontend SideBar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="card">
        <div class="card-body">
            <p></p>
            <form action="{{ route('sidebar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="">
                            <label for="control-label font-description-bold">Description</label>
                            <textarea name="description" id="editor1">{{$sidebar->description ?? ""}}</textarea>
                            @error('description')
                                <label id="description-error" class="error text-danger"
                                    for="description">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    </div>
</main>
@endsection
