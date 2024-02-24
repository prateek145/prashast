@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <div class="d-flex justify-content-between">
                <h1>Product</h1>
                <a href="{{ route('products.create') }}"> <button class="btn btn-primary">Add Product</button> </a>
            </div>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Product</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Name</th>
                                    <th> Sku</th>
                                    <th>Status</th>
                                    <th>Created_at</th>
                                    <th>Actions</th>
                                    {{-- <th>Attribute</th>
                                <th>Variance</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->sku }}</td>
                                        <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <div style="display:flex;">
                                                {{-- <a href="{{ route('products.show', $item->id) }}" title="show"
                                                class="dynamicModal">
                                                <button class="btn btn-success btn-sm">show</button>
                                            </a> --}}
                                                &nbsp;
                                                <a href="{{ route('products.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                            </div>

                                        </td>

                                        {{-- @if ($item->product_type == 'variable_product')
                                        <td><a href="{{ route('product.attr', $item->id) }}"> <button
                                                    class="btn btn-warning btn-sm">set
                                                    attributes</button>
                                            </a></td>
                        
                                        <td><a href="{{ route('product-variance', $item->id) }}"> <button
                                                    class="btn btn-warning btn-sm">set
                                                    variance</button>
                                            </a></td>
                        
                                    @endif --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Export Products</h5>
                            <form action="{{ route('products.export') }}" method="get" id="selectCategory">
                                <div class="row">
                                    <div class="col-md-1">
                                        <label for="">Categories</label>

                                    </div>
                                    <input type="hidden" name="category" value="">
                                    <div class="col-md-11">
                                        <select id="" class="form-control" onchange="selectCategory(this.value)">
                                            <option value="">Select</option>
                                            @foreach ($categories as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                
                                            @endforeach
                                        </select>

                                    </div>

                                </div>


                                <div class="form-group mt-3">
                                    <input type="submit" value="Export" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        function selectCategory(value){
            document.getElementsByName('category')[0].value = value;
            // document.getElementById('selectCategory').submit();
        }
    </script>
@endsection
