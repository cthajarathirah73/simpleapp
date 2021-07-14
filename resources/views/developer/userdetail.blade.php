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
                <div>User Detail</div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Developers</div>
                <div class="card-body">
                    <form method="POST" action="{{route('updateuser',[$user_details->id])}}" enctype="multipart/form-data">
                        @csrf
                        <input name="user_id" id="user_id" type="hidden" class="form-control" value="{{$user_details->id}}">
                        <div class="position-relative row form-group">
                            <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                            <div class="col-sm-10">
                                <input name="first_name" id="first_name" type="text" class="form-control" value="{{$user_details->first_name}}">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                <input name="last_name" id="last_name" type="text" class="form-control" value="{{$user_details->last_name}}">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="phone_number" class="col-sm-2 col-form-label">Phone Name</label>
                            <div class="col-sm-10">
                                <input name="phone_number" id="phone_number" type="text" class="form-control" value="{{$user_details->phone_number}}">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea name="address" id="address" class="form-control">{{$user_details->address}}</textarea>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                            <div class="col-sm-10">
                                @if (empty($user_details->avatar))
                                    <input type="file" name="avatar" id="avatar" required>
                                @elseif ($user_details->avatar)
                                    <input type="file" name="avatar" id="avatar">
                                    <a class="cart-item-thumb" href="#" style="text-center: left;">
                                        <img src="{{ asset($user_details->avatar) }}" alt="Avatar" style="height: 100px;">
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="position-relative row form-check">
                            <div class="col-sm-10 offset-sm-2">
                                <button class="btn btn-secondary" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
