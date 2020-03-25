@extends('template_backend.home')
@section('sub-judul', 'Ubah Tag')
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



<form action="{{route('tag.update', $tag->id )}}" method="POST">
    @csrf
    @method('patch')
    <div class="form-group">
        <label>Nama Tag</label>
        <input type="text" class="form-control" name="name" value="{{$tag->name}}">
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Ubah Tag</button>
    </div>

</form>


@endsection