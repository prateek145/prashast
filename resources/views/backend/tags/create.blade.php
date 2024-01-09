@extends('backend.layouts.app')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Tags</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Users</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Tags</h5>

                        <form method="POST" action="{{route('tags.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputText" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="refno" class="form-label">Status</label>
                                    <select class="form-control form-select @error('status') is-invalid @enderror" name="status">
                                        <option {{old('status') == 1 ? 'selected':""}} value="1">Active</option>
                                        <option {{old('status') == 0 ? 'selected':""}} value="0">Inactive</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mt-4">Submit Form</button>
                            </div>


                        </form>



                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection