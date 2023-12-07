@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Create Product</h4>
            <a href="{{ route('products.index') }}" class="btn btn-danger btn-sm">return back</a>
        </div>
        <div class="card-body">
            <p></p>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Name</label>
                            <input class="form-control" name="name" placeholder="Enter Name" required />
                            @error('name')
                                <label id="name-error" class="error text-danger" for="name">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Product Type</label>
                            <select name="product_type" onchange="ptype(this.value)" id="" class="form-control" required>
                                <option value="">Select Type</option>
                                <option value="simple_product">Simple product</option>
                                <option value="variable_product">variable product</option>
                            </select>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">SKU</label>
                            <input class="form-control" name="sku" placeholder="Enter SKU" required />
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
                            <input class="form-control" name="regular_price" placeholder="Enter Regular Price" required />
                            @error('regular_price')
                                <label id="regular_price-error" class="error text-danger"
                                    for="regular_price">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Sale Price</label>
                            <input class="form-control" name="sale_price" placeholder="Enter Sale Price"/>
                        </div>
                    </div>
{{-- 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Weight</label>
                            <input class="form-control" name="weight" type="text" placeholder="Enter wight in grams" />
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
                            <textarea class="form-control" name="height" id="" cols="6" rows="2"></textarea>

                            @error('height')
                                <label id="height-error" class="error text-danger" for="height">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="control-label font-width-bold">Frontend Product Type</label>
                            <input class="form-control" name="width" type="text" placeholder="Frontend Product type" />
                            @error('width')
                                <label id="width-error" class="error text-danger" for="height">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
{{-- 
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="control-label font-length-bold">Length</label>
                            <input class="form-control" name="length" type="text" placeholder="Enter length in inches" />
                            @error('length')
                                <label id="length-error" class="error text-danger" for="length">{{ $message }}</label>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Desiner</label>
                            <select name="desiner_id" id="" class="form-control" required>
                                <option value="0">Select Desiner</option>
                                @foreach ($desiners as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Featured Image</label>
                            <input class="form-control" id="featuredimage" name="featured_image[]" multiple type="file"
                                required />
                            @error('featured_image')
                                <label id="featured_image-error" class="error text-danger"
                                    for="featured_image">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Image</label>
                            <input class="form-control" id="featuredimage" name="image" multiple type="file"
                                required />
                            @error('image')
                                <label id="image-error" class="error text-danger"
                                    for="image">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12" id="description">
                        <div class="form-group">
                            <label for="control-label font-description-bold">Description</label>
                            <textarea name="description" id="editor"></textarea>
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
                            <select name="product_categories[]" id=""  class="form-control"
                                required multiple>
                                {{-- <option value="">Select Categories</option> --}}
                                @foreach ($productcategories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Product Subcategory</label>
                            <select name="product_subcategories[]" id=""  class="form-control"
                                required multiple>
                                {{-- <option value="">Select SubCategories</option> --}}
                                @foreach ($productsubcategories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="control-label font-meta_title-bold">Meta Title</label>
                            <input class="form-control" name="meta_title" type="text" />
                            @error('meta_title')
                                <label id="meta_title-error" class="error text-danger"
                                    for="meta_title">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="control-label font-meta_keyword-bold">Meta Keyword</label>
                            <input class="form-control" name="meta_keywords" type="text" />
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
                            <textarea class="form-control" name="meta_description" id="" cols="4" rows="2"></textarea>
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
    </script>
@endsection
