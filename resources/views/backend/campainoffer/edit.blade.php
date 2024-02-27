@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>CampainOffer</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">CampainOffer</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Add CampainOffer</h5>
                            <form class="row g-3" action="{{ route('campaign-offer.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="control-label font-weight-bold">Description</label>
                                        <textarea name="description" id="editor" cols="30" rows="10">{{$c_offer->description ?? ""}}</textarea>
                                        @error('description')
                                            <label id="description-error" class="error text-danger"
                                                for="description">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="control-label font-weight-bold">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{isset($c_offer->status) == 1 ? 'selected':''}}>Active</option>
                                            <option value="0" {{isset($c_offer->status) == 0 ? 'selected':''}}>InActive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                {{-- <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title">CampainOffer Logs</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($c_offer as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <div style="display:flex;">
                                                <a href="{{ route('campaign-offer.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                &nbsp;
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>
        </section>
    </main><!-- End #main -->

@endsection
