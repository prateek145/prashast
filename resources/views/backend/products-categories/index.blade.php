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
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    {{-- <th scope="col">Description</th> --}}
                                    <th scope="col">Created By</th>
                                    <th scope="col">Updated By</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$item->name ?? ""}}</td>
                                    <td>{{$item->status == 1 ? 'Active' : 'Inactive'}}</td>
                                    {{-- <td>{!! $item->description ?? "" !!}</td> --}}
                                    <td>{{$item->category_created_by->name ?? ""}}</td>
                                    <td>{{$item->category_created_by->name ?? ""}}</td>
                                    <td>{{$item->created_at->format('d-m-Y') ?? ""}}</td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a href="{{route('product.sub.cat.create', $item->id)}}" class="btn btn-primary btn-sm">Create Sub-Category</a>
                                            <a href="{{route('products-categories.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>

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
</main><!-- End #main -->
    
@endsection