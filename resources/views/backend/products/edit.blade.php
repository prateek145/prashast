@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Add Product</h5>
                            <form action="{{ route('products.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Name</label>
                                            <input class="form-control" name="name" placeholder="Enter Name"
                                                value="{{ $product->name }}" required />
                                            @error('name')
                                                <label id="name-error" class="error text-danger"
                                                    for="name">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>


                                    <input type="hidden" name="product_type" value="simple_product">


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">SKU</label>
                                            <input class="form-control" name="sku" placeholder="Enter SKU"
                                                value="{{ $product->sku }}" required />
                                            @error('sku')
                                                <label id="sku-error" class="error text-danger"
                                                    for="sku">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Sale Price</label>
                                            <input class="form-control" name="sale_price" placeholder="Enter Sale Price"
                                                value="{{ $product->sale_price }}" />
                                            @error('sale_price')
                                                <label id="sale_price-error" class="error text-danger"
                                                    for="sale_price">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>


                                </div>



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Featured Image</label>
                                            @php
                                                if ($product->featured_image != null) {
                                                    # code...
                                                    $images = json_decode($product->featured_image);
                                                }
                                            @endphp

                                            @if ($product->featured_image != null)
                                                <div class="col-md-12 ml-2 mb-2">
                                                    @foreach ($images as $item)
                                                        <img class="ml-2" src="{{ asset('public/product/' . $item) }}"
                                                            alt="" width="10%" height="10%">
                                                    @endforeach

                                                </div>
                                            @endif
                                            <input class="form-control" id="featuredimage" name="featured_image[]"
                                                type="file" multiple />
                                            @error('featured_image')
                                                <label id="featured_image-error" class="error text-danger"
                                                    for="featured_image">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        @if ($product->image != null)
                                            <div class="row ml-2 mb-2">
                                                <img class="ml-2" src="{{ asset('public/product/' . $item) }}"
                                                    alt="" width="100%" height="100%">
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Image</label>
                                            <input class="form-control" id="featuredimage" name="image" type="file" />
                                            @error('image')
                                                <label id="image-error" class="error text-danger"
                                                    for="image">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12" id="description">
                                        <div class="form-group">
                                            <label for="control-label font-description-bold">Description</label>
                                            <textarea name="description" id="editor1">{{ $product->description }}</textarea>
                                            @error('description')
                                                <label id="description-error" class="error text-danger"
                                                    for="description">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Product Category</label>
                                            <select name="product_categories[]" id="" class="form-control"
                                                required multiple>
                                                {{-- <option value="">Select Categories</option> --}}

                                                @foreach ($productcategories as $item)
                                                    <option value="{{ $item->id }}" {{in_array($item->id, json_decode($product->product_categories)) == true ? 'selected' : ''}}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Product Subcategory</label>
                                            <select name="product_subcategories[]" id="" class="form-control"
                                                required multiple>

                                                {{-- <option value="">Select SubCategories</option> --}}
                                                @foreach ($productsubcategories as $item12)
                                                    <option value="{{ $item12->id }}" {{in_array($item12->id, json_decode($product->product_subcategories)) == true ? 'selected' : ''}}>{{ $item12->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="control-label font-meta_title-bold">Meta Title</label>
                                            <input class="form-control" name="meta_title"
                                                value="{{ $product->meta_title }}" type="text" />
                                            @error('meta_title')
                                                <label id="meta_title-error" class="error text-danger"
                                                    for="meta_title">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="control-label font-meta_keyword-bold">Meta Keyword</label>
                                            <input class="form-control" name="meta_keywords"
                                                value="{{ $product->meta_keywords }}" type="text" />
                                            @error('meta_keyword')
                                                <label id="meta_keyword-error" class="error text-danger"
                                                    for="meta_keyword">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="control-label font-description-bold">Meta Description</label>
                                            <textarea class="form-control" name="meta_description" id="" cols="4" rows="2">{{ $product->meta_description }}</textarea>
                                            @error('meta_description')
                                                <label id=" meta_description-error" class="error text-danger"
                                                    for="meta_description">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">status</label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>

                                        </div>
                                    </div>

                                    <input type="hidden" name="updated_by" value="{{ auth()->id() }}">

                                </div>

                                <div class="form-group mt-3">
                                    <input type="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <script>
        function category(id) {
            $.ajax({
                url: "{{ route('product.subcategory') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "category_id": id
                },
                success: function(response) {

                    console.log(response.result);
                    if (response.result == "Create sub category first.") {
                        var subcat = document.getElementsByName('product_subcategories')[0];
                        subcat.innerHTML = "";
                        var option = document.createElement('option');
                        option.innerText = "Please create sub category";
                        subcat.appendChild(option);
                    } else {
                        var subcat = document.getElementsByName('product_subcategories')[0];
                        subcat.innerHTML = "";
                        for (let index = 0; index < response.result.length; index++) {
                            var option = document.createElement('option');
                            option.value = response.result[index]['id'];
                            option.innerText = response.result[index]['name'];
                            subcat.appendChild(option);
                        }
                    }

                }
            });
        }

        var ptype = "{{ $product->product_type }}";
        document.getElementById('product_type').value = ptype;

        var status = "{{ $product->status }}";
        document.getElementById('status').value = status;

        var show_in_featuredproduct = "{{ $product->show_in_featuredproduct }}";
        console.log(show_in_featuredproduct);
        document.getElementsByName('show_in_featuredproduct')[0].value = show_in_featuredproduct;

        var pcategories = "{{ $product->product_categories }}";
        document.getElementById('product_categories').value = pcategories;

        var psubcategories = "{{ $product->product_subcategories }}";
        document.getElementById('psubcategories').value = psubcategories;


        var desiner = "{{ $product->desiner_id }}";
        document.getElementById('desiner_select').value = desiner;

        if (ptype == 'variable_product') {
            var sku = document.getElementsByName('sku')[0];
            sku.style.display = 'none';
            sku.required = false;

            var regular_price = document.getElementsByName('regular_price')[0];
            regular_price.style.display = 'none';
            regular_price.required = false;

            var sale_price = document.getElementsByName('sale_price')[0];
            sale_price.style.display = 'none';
            sale_price.required = false;

            document.getElementsByName('weight')[0].style.display = 'none';
            document.getElementsByName('height')[0].style.display = 'none';
            document.getElementsByName('width')[0].style.display = 'none';
            document.getElementsByName('length')[0].style.display = 'none';
            document.getElementById('description').style.display = 'none';

            // console.log(des);
            // document.getElementsByName('featured_image')[0].style.display = 'none';
        }
    </script>

@endsection
