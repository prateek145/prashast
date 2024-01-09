@extends('backend.layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Contact Form</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Contact Form</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Manage Contact Form</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($forms as $item)
                        
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{$item->email}}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{!! $item->message !!}</td>
                                <td>
                                    <div style="display:flex;">
                                        <form id="delete_form{{ $item->id }}" method="get" action="{{ route('contactform.destroy', $item->id) }}" onclick="return confirm('Are you sure?')">
                                            @csrf
                                            @method('Delete')
                        
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
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

