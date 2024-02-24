@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <div class="d-flex justify-content-between">
                <h1>Tags</h1>
                <div class="col-md-2">
                    <Button class="btn btn-danger" onclick="delete_btn()">Delete Tags</Button>
                    <a href="{{ route('tags.create') }}"><Button class="btn btn-primary">Add Tags</Button></a>

                </div>

            </div>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Tags</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Tags</h5>
                            <table class="table table-striped datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col"> Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $item)
                                        <tr>
                                            <th scope="row">{{ $count++ }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            {{-- <td>Delhi</td> --}}
                                            <td> <a href="{{ route('tags.edit', $item->id) }}">
                                                    <button class="btn btn-warning btn-sm">Update</button>
                                                </a>

                                            </td>
                                            <td>
                                                <input type="checkbox" class="danger{{ $item->id }}"
                                                    onclick="delete_tag({{ $item->id }})">
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


    </main><!-- End #main -->

    <script>
        var array = [];

        function delete_tag(value) {
            var checkbox = document.getElementsByClassName('danger' + value)[0];
            if (checkbox.checked == true) {
                array.push(value);
            } else if (checkbox.checked == false) {
                array.pop(value);
            }

        }

        function delete_btn(){
            $.ajax({
                url: "{{ route('tags.delete') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "array": array,
                },
                success: function(response) {
                    console.log(response);
                    if (response.success == "true") {
                        alert('tags deleted successfully');
                        window.location.reload();
                    }else{
                        alert(response.success);
                    }

                }
            });
        }
    </script>
@endsection
