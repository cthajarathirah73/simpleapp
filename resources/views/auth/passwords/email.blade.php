@extends('projects.body')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="container">
    <div class="account-form-inner">
        <div class="account-container">
            <div class="heading-bx left">
                <h2 class="title-head">Reset Password</h2>
                <p>Don't have an account? <a href="{{ route('register') }}">Create one here</a></p>
            </div>

            <form class="contact-bx" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row placeani">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 m-b30">
                        <button type="submit" class="btn button-md">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                    <br>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
