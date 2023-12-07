    @extends('backend.layouts.app')
    @section('content')

        <head>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        </head>

        <div class="container mt-5">
            <div class="d-flex justify-content-between">
                <h2>Product Attribute Table</h2>
                <a href="{{ route('product-variance', $id) }}"><button class="btn btn-warning btn-sm">set
                        variance</button></a>
            </div>


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

            <form action="{{ route('product.attribute.save') }}" method="post" style="margin-top:3%;">
                @csrf
                <div class="field_wrapper">
                    <div>
                        <input class="form-control" type="text" name="name[]" placeholder="Name" value="" required />
                        <textarea style="margin-bottom: 1%;" class="form-control mb-5" name="description[]"
                            placeholder="Description use | for description values" id="" cols="5" rows="2"></textarea>
                        <a href="javascript:void(0);" class="add_button" title="Add field"> <input
                                class="pull-right btn btn-warning btn-sm" type="button" value="Add"></a>
                    </div>

                </div>
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button title="Form Submit" class="btn btn-success btn-sm">Submit</button>

            </form>

            <h2 style="margin-top: 4%;">Product Attribute Index Table</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        
                    @endphp

                    @foreach ($product_attr as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td> <a href="{{ route('product.attribute.delete', $item->id) }}"> <button
                                        class="btn btn-danger btn-sm">delete</button></a></td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                var maxField = 10; //Input fields increment limitation
                var addButton = $('.add_button'); //Add button selector
                var wrapper = $('.field_wrapper'); //Input field wrapper
                var fieldHTML =
                    '<div><input class="form-control"  type="text" name="name[]" placeholder="Name" value="" required/> <textarea style="margin-bottom: 1%;" class="form-control mb-5" name="description[]" placeholder="Description use | for description values" id="" cols="5" rows="2"></textarea> <a href="javascript:void(0);" class="remove_button"><input type="button" class="pull-right btn btn-danger btn-sm" value="Remove"></a></div>'; //New input field html 
                var x = 1; //Initial field counter is 1

                //Once add button is clicked
                $(addButton).click(function() {
                    //Check maximum number of input fields
                    if (x < maxField) {
                        x++; //Increment field counter
                        $(wrapper).append(fieldHTML); //Add field html
                    }
                });

                //Once remove button is clicked
                $(wrapper).on('click', '.remove_button', function(e) {
                    e.preventDefault();
                    $(this).parent('div').remove(); //Remove field html
                    x--; //Decrement field counter
                });
            });
        </script>
    @endsection
