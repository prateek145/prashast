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
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Name</label>
                                            <input class="form-control" name="name" placeholder="Enter Name"
                                                value="{{ old('name') }}" required />
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
                                                value="{{ old('sku') }}" required />
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
                                                value="{{ old('sale_price') }}" />

                                            @error('sale_price')
                                                <label id="sale_price-error" class="error text-danger"
                                                    for="sale_price">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Featured Image</label>
                                            <input class="form-control" id="featuredimage" name="featured_image[]" multiple
                                                type="file" required />
                                            @error('featured_image')
                                                <label id="featured_image-error" class="error text-danger"
                                                    for="featured_image">{{ $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Image</label>
                                            <input class="form-control" id="featuredimage" name="image" multiple
                                                type="file" required />
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
                                            <textarea name="description" id="editor1">{{ old('description') }}</textarea>
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
                                            <select name="product_subcategories[]" id="" class="form-control"
                                                required multiple>
                                                {{-- <option value="">Select SubCategories</option> --}}
                                                @foreach ($productsubcategories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Tags</label><br>
                                            <div class="tags-input">
                                                <ul id="tags"></ul>
                                                <input type="text" id="input-tag" onkeyup="find_tag(this.value)"
                                                    list="datalistname" placeholder="Enter tag name" />

                                                <datalist id="datalistname"></datalist>
                                            </div>

                                            <select name="tag_selection[]" id="" class="d-none" multiple>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="control-label font-meta_title-bold">Meta Title</label>
                                            <input class="form-control" name="meta_title" type="text"
                                                value="{{ old('meta_title') }}" placeholder="Meta Title" />
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
                                                value="{{ old('meta_keywords') }}" type="text"
                                                placeholder="Meta Keyword" />
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
                                            <textarea class="form-control" name="meta_description" id="" cols="4" rows="2"
                                                placeholder="Meta Description">{{ old('meta_description') }}</textarea>
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
                                            <select name="status" id="" class="form-control" required>
                                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive
                                                </option>
                                            </select>

                                        </div>
                                    </div>

                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="control-label font-weight-bold">Show product in Featured
                                                Product</label>
                                            <select name="show_in_featuredproduct" id="" class="form-control"
                                                required>
                                                <option value="0">OFF</option>
                                                <option value="1">ON</option>
                                            </select>

                                        </div>
                                    </div> --}}

                                    <input type="hidden" name="created_by" value="{{ auth()->id() }}">

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

        function ptype(type) {
            if (type == 'variable_product') {
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

            if (type == 'simple_product') {
                var sku = document.getElementsByName('sku')[0];
                sku.style.display = 'block';
                sku.required = true;

                var regular_price = document.getElementsByName('regular_price')[0];
                regular_price.style.display = 'block';
                regular_price.required = true;

                var sale_price = document.getElementsByName('sale_price')[0];
                sale_price.style.display = 'block';
                // sale_price.required = true;


                document.getElementsByName('weight')[0].style.display = 'block';
                document.getElementsByName('height')[0].style.display = 'block';
                document.getElementsByName('width')[0].style.display = 'block';
                document.getElementsByName('length')[0].style.display = 'block';
                document.getElementById('description').style.display = 'block';
            }
        }

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
