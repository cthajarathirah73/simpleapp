@extends('projects.body')

@section('content')

@if($errors->any())
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ $errors->first() }}
    </div>
@endif

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="container">
    <div class="account-form-inner">
        <div class="account-container">
            <div class="heading-bx left">
                <h2 class="title-head">Register</h2>
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>	
            <form class="contact-bx" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <input id="role" type="hidden" class="form-control" name="role" value="Developer">

                <div class="row placeani">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <label for="first_name">First Name</label>

                                <input id="first_name" type="text" class="form-control" name="first_name" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <label for="last_name">Last Name</label>

                                <input id="last_name" type="text" class="form-control" name="last_name" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <label for="email">Email</label>
                                
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                
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
                                <label for="phone_number">Phone Number</label>

                                <input id="phone_number" type="text" class="form-control" name="phone_number" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" id="avatar" class="form-control" accept="image/*" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control" cols="30" rows="5" required autofocus></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="input-group"> 
                                <label for="password">Password</label>
                                
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            
                                @error('password')
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
                                <label for="conf_password">Confirm Password</label>
                                
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 m-b30">
                        <button name="submit" type="submit" value="Submit" class="btn button-md">Register</button>
                    </div>
                    <br>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
