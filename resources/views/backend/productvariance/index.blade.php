    @extends('backend.layouts.app')
    @section('content')

        <head>
            <title>Bootstrap Example</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        </head>

        <body>

            <div class="container">
                {{-- <h2>Product Variance Table</h2> --}}
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade in show col-md-12">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                @if (Session::has('error'))
                    <!-- Error Alert -->
                    <div class="alert alert-danger alert-dismissible fade in show col-md-12">
                        <strong>Error!</strong> {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                {{-- <form action="{{ route('product.variance.save') }}" method="post">
            @csrf
            <div class="field_wrapper">
                <div>
                  

                    @php
                        $description_length = count($description);
                      
                    @endphp

                    @foreach ($description as $key => $node)


                        <select class="form-control" style="margin: 1%;" name="selected_values[]" id="">

                            @php
                                $explode = explode('|', $node);
                               
                            @endphp

                            @foreach ($explode as $key => $des)
                                <option class="form-control" value="{{ $des }}">{{ $des }}</option>

                            @endforeach
                        </select>
                    @endforeach


                </div>

                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input style="margin: 1%;" class="btn btn-success btn-sm" type="submit" value="Create">

            </div>


        </form> --}}

                <h2 style="margin-top: 4%;">Product Variance Index Table <small class="text-danger">(All Status Fields Is
                        Required and Image Also )</small> </h2>



                <h4 id="updateStatus" class="text-success" style="display: none;"> Successfully Updated </h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Id</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Image Upload</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($product_vari as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->product_id }}</td>
                                @php
                                    $selected_val = implode('|', json_decode($item->selected_values));
                                    //dd($selected_val);
                                @endphp
                                <td>{{ $selected_val }}</td>

                                @php
                                    $data = App\Models\backend\ProductVariance::find($item->id);
                                    
                                @endphp
                                <td>
                                    @if ($data->regular_price == null)
                                        <p class="text-danger">Regular Price</p>
                                    @else
                                        <p class="text-success">Regular Price</p>
                                    @endif

                                    @if ($data->sale_price == null)
                                        <p class="text-danger">Sale Price</p>
                                    @else
                                        <p class="text-success">Sale Price</p>
                                    @endif

                                    @if ($data->weight == null)
                                        <p class="text-danger">Weight</p>
                                    @else
                                        <p class="text-success">Weight</p>
                                    @endif

                                    @if ($data->dimension == null)
                                        <p class="text-danger">Dimension</p>
                                    @else
                                        <p class="text-success">Dimension</p>
                                    @endif

                                    @if ($data->description == null)
                                        <p class="text-danger">Description</p>
                                    @else
                                        <p class="text-success">Description</p>
                                    @endif
                                </td>

                                <td>
                                    @if (!$data->image)
                                        <form action="{{ route('product.variance.image.upload') }}" method="POST"
                                            enctype="multipart/form-data" style="margin-top: 2%;">
                                            @csrf
                                            <div class="input-group-addon">Image Upload</div>
                                            <input type="file" name="image" id="" class="form-control">
                                            <input type="hidden" name="attribute_id" value="{{ $data->id }}">
                                            <input class="btn btn-success btn-sm" type="submit" value="Submit">
                                        </form>
                                    @else
                                        <img src="{{ asset($data->image) }}" alt="" width="120px" height="150px">
                                    @endif
                                </td>

                                <td>

                                    <button onclick="showcontent()" class="btn btn-warning btn-sm">Edit</button>
                                    &nbsp

                                    <button onclick="addcontent({{ $item->id }}, {{ $product->id }})"
                                        class="btn btn-success btn-sm">update</button>
                                    &nbsp
                                    {{-- <button class="btn btn-danger btn-sm">delete</button> --}}

                                </td>


                            </tr>
                        @endforeach

                        <div id="variance_form" class="form-group" style="display: none;">
                            <div class="input-group col-md-12 ">
                                <div class="input-group-addon">Regular Price</div>
                                <input type="text" class="form-control" id="regular_price" placeholder="Regular Price">

                                <div class="input-group-addon">Sales Price</div>
                                <input type="text" class="form-control" id="sales_price" placeholder="Sales Price">

                                <div class="input-group-addon">Sku</div>
                                <input type="text" class="form-control" id="sku" placeholder="Sku">

                            </div>

                            &nbsp
                            <div class="input-group col-md-12">
                                <div class="input-group-addon">Weight</div>
                                <input type="text" class="form-control" id="weight" placeholder="Weight (kg)">

                                <div class="input-group-addon">Dimension</div>
                                <input type="text" class="form-control" id="dimension"
                                    placeholder="Dimension(cm) use | serial L x B x H">

                            </div>

                            &nbsp
                            <div class="input-group col-md-12">
                                <textarea class="form-control" placeholder="Enter Descripton" name="" id="description" cols="5" rows="3"></textarea>
                            </div>

                            {{-- <button type="submit " onclick="submit_form()" class="col-md-2 btn btn-success btn-sm pull-right">Confirm Update</button> --}}
                        </div>

            </div>

            </tbody>
            </table>
            </div>

        </body>

        </html>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            function showcontent() {
                document.getElementById('variance_form').style.display = "block";


            }

            function addcontent(variance_id, product_id) {
                var regular_price = document.getElementById('regular_price').value;
                var sales_price = document.getElementById('sales_price').value;
                var sku = document.getElementById('sku').value;
                var weight = document.getElementById('weight').value;
                var dimension = document.getElementById('dimension').value;
                var image = $("#variance_form input[name=image]").val();
                var description = document.getElementById('description').value;

                $.ajax({
                    url: "{{ route('variance.ajax') }}",
                    method: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        "variance_id": variance_id,
                        "product_id": product_id,
                        "regular_price": regular_price,
                        'sales_price': sales_price,
                        'sku': sku,
                        'weight': weight,
                        'dimension': dimension,
                        'image': image,
                        'description': description
                    },
                    success: function(response) {
                        document.getElementById('updateStatus').style.display = "block";


                    }
                });
            }
        </script>
    @endsection
