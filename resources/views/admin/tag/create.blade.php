@extends('template_backend.home')
@section('sub-judul', 'Tambah Tag')
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

<form action="{{route('tag.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label>Nama Tag</label>
        <input type="text" class="form-control" name="name">
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Tambah Tag</button>
    </div>

</form>


@endsection