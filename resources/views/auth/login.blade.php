@extends('projects.body')

@section('content')

<div class="container">
    <div class="account-form-inner">
        <div class="account-container">
            <div class="heading-bx left">
                <h2 class="title-head">{{ __('Login') }} to your <span>Account</span></h2>
                <p>Don't have an account? <a href="{{ route('register') }}">Create one here</a></p>
            </div>	
            <form class="contact-bx" method="POST" action="{{ route('login') }}">
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
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group"> 
                                <label for="password">{{ __('Password') }}</label>
                                
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
							    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group form-forget">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                
                                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                
                            </div>

                            @if (Route::has('password.request'))
								<a class="ml-auto" href="{{ route('password.request') }}">
									{{ __('Forgot Password?') }}
								</a>
							@endif

                        </div>
                    </div>
                    <div class="col-lg-12 m-b30">
                        <button name="submit" type="submit" value="Submit" class="btn button-md">{{ __('Login') }}</button>
                    </div>
                    <br>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
