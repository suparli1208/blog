@extends('template_backend.home')
@section('sub-judul', 'Tambah Post')
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

<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Judul</label>
        <input type="text" class="form-control" name="judul">
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="category_id">
            <option value=""> Pilih Kategori </option>
            @foreach ($category as $hasil)
            <option value="{{$hasil->id}}"> {{$hasil->name}} </option>
            @endforeach

        </select>
    </div>
    <div class="form-group">
        <label>Kontent</label>
        <textarea type="text" class="form-control" name="content"></textarea>
    </div>
    <div class="form-group">
        <label>Thubnail</label>
        <input type="file" class="form-control" name="gambar">
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Tambah Post</button>
    </div>

</form>


@endsection