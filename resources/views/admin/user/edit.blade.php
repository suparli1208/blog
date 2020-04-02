@extends('template_backend.home')
@section('sub-judul', 'Edit User')
@section('content')



@if (count($errors)>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {{$error}}
    </div>
</div>
@endforeach
@endif

@if (Session::has('success'))

<div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {{Session('success')}}
    </div>
</div>

@endif

<form action="{{route('user.update', $user->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label>Nama User</label>
    <input type="text" class="form-control" name="name" value="{{$user->name}}">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="{{$user->email}}" readonly>
    </div>
    <div class="form-group">
        <label>Level</label>
        <select class="form-control" name="level" id="level">
            <option value="" holder>Pilih Level</option>
            <option value="1" holder @if($user->id == 1) selected @endif>Administrator</option>
            <option value="0" holder @if($user->id == 0) selected @endif>Author</option>
        </select>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Update User</button>
    </div>

</form>


@endsection
