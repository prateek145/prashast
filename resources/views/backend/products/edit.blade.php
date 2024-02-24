@extends('backend.layouts.app')
@section('content')
    <style>
        .tags-input {
            display: inline-block;
            position: relative;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
            box-shadow: 2px 2px 5px #00000033;
            width: 100%;
        }

        .tags-input ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .tags-input li {
            display: inline-block;
            background-color: #f2f2f2;
            color: #333;
            border-radius: 20px;
            padding: 5px 10px;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .tags-input input[type="text"] {
            border: none;
            outline: none;
            padding: 5px;
            font-size: 14px;
        }

        .tags-input input[type="text"]:focus {
            outline: none;
        }

        .tags-input .delete-button {
            background-color: transparent;
            border: none;
            color: #999;
            cursor: pointer;
            margin-left: 5px;
        }
    </style>

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

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="control-label font-weight-bold">Quantity</label>
                                        <input class="form-control" placeholder="Product Quantity" id="featuredimage" name="quantity" 
                                            type="number" value="{{$product->quantity}}" required />
                                        @error('quantity')
                                            <label id="quantity-error" class="error text-danger"
                                                for="quantity">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12" id="description">
                                        <div class="form-group">
                                            <label for="control-label font-description-bold">Description</label>
                                            <textarea name="description" id="editor" class="form-control">{{ $product->description }}</textarea>
                                            @error('description')
                                                <label id="description-error" class="error text-danger"
                                                    for="description">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-md-12" id="specification">
                                        <div class="form-group">
                                            <label for="control-label font-specification-bold">Product Specification</label>
                                            <textarea name="specification" id="editor1">{{ $product->specification }}</textarea>
                                            @error('specification')
                                                <label id="specification-error" class="error text-danger"
                                                    for="specification">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Product Category</label>
                                            <select name="product_subcategories[]" id="" class="form-control"
                                                required multiple>
                                                {{-- <option value="">Select Categories</option> --}}

                                                @foreach ($productsubcategories as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ in_array($item->id, json_decode($product->product_subcategories)) == true ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Tags</label><br>
                                            <div class="tags-input">
                                                <ul id="tags">
                                                    @foreach ($tags as $item)
                                                    <li value="{{$item->id}}">{{$item->name}} <button class="delete-button">X</button></li>
                                                    @endforeach
                                                </ul>
                                                <input type="text" id="input-tag" onkeyup="find_tag(this.value)"
                                                    list="datalistname" placeholder="Enter tag name" />

                                                <datalist id="datalistname"></datalist>
                                            </div>

                                            <select name="tag_selection[]" class="d-none" id="" multiple>
                                                @foreach ($tags as $item)
                                                    <option value="{{$item->id}}" selected>{{$item->name}}</option>
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
        // Get the tags and input elements from the DOM 
        const tags = document.getElementById('tags');
        const input = document.getElementById('input-tag');
        var tag_array = [];
        // Add an event listener for keydown on the input element 
        input.addEventListener('keydown', function(event) {

            // Check if the key pressed is 'Enter' 
            if (event.key === 'Enter') {

                // Prevent the default action of the keypress 
                // event (submitting the form) 
                event.preventDefault();

                // Create a new list item element for the tag 
                const tag = document.createElement('li');

                // Get the trimmed value of the input element 
                const tagContent = input.value.trim();

                // If the trimmed value is not an empty string 
                if (tagContent !== '') {
                    $.ajax({
                        url: "{{ route('tag.create') }}",
                        method: "POST",
                        data: {
                            '_token': "{{ csrf_token() }}",
                            "name": tagContent,
                        },
                        success: function(response) {
                            // console.log(response);
                            var input = document.getElementById('input-tag');
                            tag_array.push(response.data.id);

                            // Set the text content of the tag to  
                            // the trimmed value 
                            tag.innerText = tagContent;
                            tag.value = response.data.id;

                            // Add a delete button to the tag 
                            tag.innerHTML += '<button class="delete-button">X</button>';

                            // Append the tag to the tags list 
                            tags.appendChild(tag);

                            // Clear the input element's value 
                            input.value = '';

                            var tag_selection = document.getElementsByName('tag_selection[]')[0];
                            // console.log(tag_selection);
                            var option = document.createElement('option');
                            option.value = response.data.id;
                            option.selected = true;
                            option.innerText = response.data.name;
                            tag_selection.appendChild(option);
                        }
                    });
                }
            }
        });

        // Add an event listener for click on the tags list 
        tags.addEventListener('click', function(event) {

            // If the clicked element has the class 'delete-button' 
            if (event.target.classList.contains('delete-button')) {
                // console.log();
                tag_array.pop(event.target.parentNode.value);
                // Remove the parent element (the tag) 
                event.target.parentNode.remove();
                var tag_selection = document.getElementsByName('tag_selection[]')[0];
                for (let index = 0; index < tag_selection.length; index++) {
                    console.log();
                    if (tag_selection[index].value == event.target.parentNode.value) {
                        tag_selection[index].remove();
                    }

                }
                // console.log(tag_selection);
            }

        });

        // console.log(array123);

        function find_tag(value) {
            // console.log(value);

            $.ajax({
                url: "{{ route('tag.search') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "key": value,
                },
                success: function(response) {
                    // console.log(response);
                    if (response.status == 200) {
                        var listname = document.getElementById('datalistname');
                        listname.innerHTML = '';
                        for (let index = 0; index < response.data.length; index++) {
                            const option = document.createElement('option');
                            option.setAttribute('id', response.data[index].id);
                            option.innerHTML = response.data[index].name;
                            listname.appendChild(option);
                        }
                    }
                }
            });
        }
    </script>

@endsection
