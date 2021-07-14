@extends('dashboard.body')

@section('content')

@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

@if(\Session::has('success'))
<div class="alert alert-success">
    <p>{{ \Session::get('success')}}</p>
</div>
@endif

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Create Developer</div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">New Developers</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('createUser') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="position-relative row form-group">
                            <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                            <div class="col-sm-10">
                                <input name="first_name" id="first_name" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                <input name="last_name" id="last_name" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" id="email" type="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input name="password" id="password" type="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="phone_number" class="col-sm-2 col-form-label">Phone Name</label>
                            <div class="col-sm-10">
                                <input name="phone_number" id="phone_number" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea name="address" id="address" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                            <div class="col-sm-10">
                                <input type="file" name="avatar" id="avatar" required>
                            </div>
                        </div>
                        <div class="position-relative row form-check">
                            <div class="col-sm-10 offset-sm-2">
                                <button class="btn btn-secondary" name="submit" type="submit" value="Submit">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
