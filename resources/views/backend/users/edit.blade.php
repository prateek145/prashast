@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Create User</h4>
            <a href="{{ route('users.index') }}" class="btn btn-danger btn-sm">return back</a>
        </div>
        <div class="card-body">
            <p></p>
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Name</label>
                            <input class="form-control" name="name" value="{{ $user->name }}" />
                            @error('name')
                                <label id="name-error" class="error text-danger" for="name">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Email</label>
                            <input class="form-control" name="email" type="email" value="{{ $user->email }}" />
                            @error('email')
                                <label id="email-error" class="error text-danger" for="email">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="control-label font-weight-bold">Role</label>
                            <select name="role" id="select_role" class="form-control">
                                <option value="">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="customer">customer</option>
                            </select>

                        </div>
                    </div>

                </div>


                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        var test = "{{ $selectedRole }}";
        console.log(test);
        if (test != '') {
            document.getElementById('select_role').value = test;
        }
    </script>



@endsection
