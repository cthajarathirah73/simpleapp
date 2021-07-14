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
                <div>Dashboard</div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Developers
                </div>
                <div class="card-body">
                    @if (Auth::user()->role == "Admin")

                        <a href="{{route('newUser')}}" class="mb-2 mr-2 btn btn-primary">Add New Developer</a>
                        <a href="" class="mb-2 mr-2 btn btn-danger" id="deleteAllSelected">Delete Selected</a>

                        <table class="mb-0 table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center"><input type="checkbox" id="checkAll"></th>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($developers as $developer)
                                    <tr id="did{{$developer->id}}">
                                        <td class="text-center">
                                            {{-- <input name='id[]' type="checkbox" id="checkItem" value="{{$developer->id}}"> --}}
                                            <input type="checkbox" name="ids" class="checkBox" value="{{$developer->id}}">
                                        </td>
                                        <td>{{$developer->id}}</td>
                                        <td> 
                                            @if (empty($developer->avatar))
                                                -
                                            @else
                                                <a class="cart-item-thumb" href="#" style="text-center: left;">
                                                    <img src="{{$developer->avatar}}" alt="Avatar" style="height: 100px;">
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{$developer->first_name}}</td>
                                        <td>{{$developer->last_name}}</td>
                                        <td>{{$developer->email}}</td>
                                        <td>{{$developer->phone_number}}</td>
                                        <td>{{$developer->address}}</td>
                                        <td>
                                            <a href="{{route('edituser', $developer->id)}}" class="mb-2 mr-2 btn btn-alternate">Edit</a>
                                            <a href="{{route('deleteuser', $developer->id)}}" onclick="return confirm('Are you sure?')" class="mb-2 mr-2 btn btn-alternate">
                                                <i class="mr-1" data-feather="trash-2"></i>Delete
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    @elseif (Auth::user()->role == "Developer")
                        test dev
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
$(function(e){

    $("#checkAll").click(function () {
		$(".checkBox").prop('checked', $(this).prop('checked'));
	});

    $("#deleteAllSelected").click(function (e) {
        e.preventDefault();

        var allids = [];

		$("input:checkbox[name=ids]:checked").each(function(){
            allids.push($(this).val());
        });

        $.ajax({
            url:"{{route('deleteAll')}}",
            type:"DELETE",
            data:{
                _token:$("input[name=_token]").val(),
                ids:allids
            },
            success:function(response){
                $.each(allids, function(key,val){
                    $("#did"+val).remove();
                })
            }
        })
	});
    

});
    
    
</script>

@endsection
