@extends('backend.layouts.app')
@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in show col-md-12">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade in show col-md-12">
            <strong>Success!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Edit Product</h4>
            <a href="{{ route('products.index') }}" class="btn btn-danger btn-sm">return back</a>
        </div>
        <div class="card-body">
            <p></p>
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Name</label>
                            <input class="form-control" name="name" placeholder="Enter Name" value="{{ $product->name }}"
                                required />
                            @error('name')
                                <label id="name-error" class="error text-danger" for="name">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Product Type</label>
                            <select name="product_type" id="product_type" onchange="ptype(this.vlaue)" class="form-control"
                                disabled>
                                <option value="">Select Role</option>
                                <option value="simple_product">Simple product</option>
                                <option value="variable_product">variable product</option>
                            </select>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">SKU</label>
                            <input class="form-control" name="sku" placeholder="Enter SKU" value="{{ $product->sku }}"
                                required />
                            @error('sku')
                                <label id="sku-error" class="error text-danger" for="sku">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>


                </div>


                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Regular Price</label>
                            <input class="form-control" name="regular_price" placeholder="Enter Regular Price"
                                value="{{ $product->regular_price }}" required />
                            @error('regular_price')
                                <label id="regular_price-error" class="error text-danger"
                                    for="regular_price">{{ $message }}</label>
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
                    {{-- 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Weight</label>
                            <input class="form-control" name="weight" type="text" value="{{ $product->weight }}"
                                placeholder="Enter wight in grams" />
                            @error('weight')
                                <label id="weight-error" class="error text-danger" for="weight">{{ $message }}</label>
                            @enderror
                        </div>

                    </div> --}}
                </div>

                <div class="row">

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Care Instructions</label>
                            <textarea class="form-control" name="height" id="" cols="6" rows="2">{{ $product->height }}</textarea>

                            @error('height')
                                <label id="height-error" class="error text-danger" for="height">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="control-label font-width-bold">Frontend Product Type</label>
                            <input class="form-control" name="width" type="text" placeholder="Frontend Product type"
                                value="{{ $product->width }}" />
                            @error('width')
                                <label id="width-error" class="error text-danger" for="height">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    {{-- 
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="control-label font-length-bold">Length</label>
                            <input class="form-control" name="length" type="text" value="{{ $product->length }}"
                                placeholder="Enter length in inches" />
                            @error('length')
                                <label id="length-error" class="error text-danger" for="length">{{ $message }}</label>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Desiner</label>
                            <select name="desiner_id" id="desiner_select" class="form-control" required>
                                <option value="0">Select Desiner</option>
                                @foreach ($desiners as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
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
                                <div class="row ml-2 mb-2">
                                    @foreach ($images as $item)
                                        <img class="ml-2" src="{{ asset('public/product/' . $item) }}" alt=""
                                            width="10%" height="10%">
                                    @endforeach

                                </div>
                            @endif
                            <input class="form-control" id="featuredimage" name="featured_image[]" type="file"
                                multiple />
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
                                <img class="ml-2" src="{{ asset('public/product/' . $item) }}" alt="" width="100%" height="100%">
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Image</label>
                            <input class="form-control" id="featuredimage" name="image" type="file" />
                            @error('image')
                                <label id="image-error" class="error text-danger" for="image">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12" id="description">
                        <div class="form-group">
                            <label for="control-label font-description-bold">Description</label>
                            <textarea name="description" id="editor">{{ $product->description }}</textarea>
                            @error('description')
                                <label id="description-error" class="error text-danger"
                                    for="description">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Product Category</label>
                            <select name="product_categories[]" id="" class="form-control" required multiple>
                                {{-- <option value="">Select Categories</option> --}}
                                @php
                                    $pcat = json_decode($product->product_categories);
                                @endphp
                                @foreach ($productcategories as $item)
                                    @if (in_array($item->id, $pcat))
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Product Subcategory</label>
                            <select name="product_subcategories[]" id="" class="form-control" required multiple>
                                @php
                                    $psubcat = json_decode($product->product_subcategories);
                                @endphp
                                {{-- <option value="">Select SubCategories</option> --}}
                                @foreach ($productsubcategories as $item)
                                    @if (in_array($item->id, $psubcat))
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="control-label font-meta_title-bold">Meta Title</label>
                            <input class="form-control" name="meta_title" value="{{ $product->meta_title }}"
                                type="text" />
                            @error('meta_title')
                                <label id="meta_title-error" class="error text-danger"
                                    for="meta_title">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="control-label font-meta_keyword-bold">Meta Keyword</label>
                            <input class="form-control" name="meta_keywords" value="{{ $product->meta_keywords }}"
                                type="text" />
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
                                <option value="">Status</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Show product in Featured Product</label>
                            <select name="show_in_featuredproduct" id="" class="form-control" required>
                                <option value="0">OFF</option>
                                <option value="1">ON</option>
                            </select>

                        </div>
                    </div>

                    <input type="hidden" name="created_by" value="{{ auth()->id() }}">

                </div>

                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

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
