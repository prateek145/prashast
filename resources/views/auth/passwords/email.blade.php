@extends('frontend.layouts.app')
@section('content')

<div class="container" style="margin-top: 5%; margin-bottom:10%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="#">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6 mb-3">
                                <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="passwordc"  style="display: none;">

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">

                                    <input type="text" name="password" class="form-control" placeholder="Enter Password" required>
                                </div>

                            </div>

                            {{-- <div class="form-group row">
                                <label for="password1" class="col-md-4 col-form-label text-md-right">{{ __('Re-password') }}</label>

                                <div class="col-md-6">                               
                                        <input type="text" name="password1" class="form-control" placeholder="Enter Re-Password">

                                </div>
                            </div> --}}
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="button" onclick="passwordchange()" class="btn btn-primary sendlink" value="Chnage Password">
                                <button type="button" onclick="changethepassword()" style="display: none;" class="btn btn-primary btn-xs changepass">cchnage Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script>
    function passwordchange(){
        var email = document.getElementsByName('email')[0].value;
        console.log('prateek');
        if (email == '') {
            alert('Please Enter the Email.');
        }
        $.ajax({
        url: "{{ route('password.change') }}",
        method: "POST",
        data: {
            '_token': "{{ csrf_token() }}",
            "email": email
        },
        success:function(response){
            console.log(response);
            if (response.user == 'found') {
                document.getElementsByClassName('passwordc')[0].style.display = 'block';
                document.getElementsByName('email')[0].setAttribute('readonly', true);
                document.getElementsByClassName('changepass')[0].style.display = 'block';
                document.getElementsByClassName('sendlink')[0].style.display = 'none';
            } else {
                
            }
        }
    });
    }

    function changethepassword(){
        var email = document.getElementsByName('email')[0].value;
        var password = document.getElementsByName('password')[0].value;

        $.ajax({
        url: "{{ route('password.change1') }}",
        method: "POST",
        data: {
            '_token': "{{ csrf_token() }}",
            "email": email,
            "password": password,
        },
        success:function(response){
            if (response.result == 'done') {
                alert('password changed.');
                window.location.href = '/login';
            }
            if (response.result == 'empty') {
                alert('Please Enter password and Try again');
            }
        }
    });
    }
</script>
