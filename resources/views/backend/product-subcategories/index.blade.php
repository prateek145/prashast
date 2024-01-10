@extends('backend.layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <div class="d-flex justify-content-between">
            <h1>Category</h1>
            <a href="{{route('product-subcategories.create')}}"> <button class="btn btn-primary">Add Category</button> </a>
        </div>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Category</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Name</th>
                                    {{-- <th>Description</th> --}}
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productcategories as $item)
                            
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $item->subcategory_created_by->name ?? "" }}</td>
                                        <td>{{ $item->subcategory_created_by->name ?? "" }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        
                                        <td>
                                            <div style="display:flex;">
                                                <a href="{{route('product-subcategories.edit', $item->id)}}">
                                                    <button class="btn btn-warning btn-sm">Edit</button>
                                                </a>
   
                                            </div>
                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
