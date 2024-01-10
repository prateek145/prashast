@extends('frontend.layouts.app')
@section('content')

<main>
    <div class="container">
      
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email
                                    Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->

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
