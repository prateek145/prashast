@extends('backend.layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <div class="d-flex justify-content-between">
            <h1>Blogs</h1>
            <a href="{{route('blog.create')}}"> <button class="btn btn-primary">Add Blog</button> </a>
        </div>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Blogs</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Manage Blogs</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                <th>Sub Description</th>
                                <th>Created_at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $item)
                        
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{!! $item->short_description !!}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <div style="display:flex;">
                                            <a href="{{ route('blog.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            &nbsp;
                                            {{-- <form id="delete_form{{ $item->id }}" method="POST"
                                                action="{{ route('blog.destroy', $item->id) }}"
                                                onclick="return confirm('Are you sure?')">
                                                @csrf
                                                @method('Delete')
                        
                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                            </form> --}}
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
