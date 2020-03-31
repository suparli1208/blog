@extends('template_backend.home')
@section('sub-judul', 'Edit Post')
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

<form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label>Judul</label>
    <input type="text" class="form-control" name="judul" value="{{$post->judul}}">
    </div>
    <div class="form-group">
        <label>Kontent</label>
    <textarea type="text" class="form-control" name="content">{{$post->content}}</textarea>
    </div>
    <div class="form-group">
        <label>Tags</label>
        <select class="form-control select2" multiple="" name="tags[]">
            @foreach ($tag as $tags)

                <option value="{{$tags->id}}"
                @foreach ($post->tags as $value )
                    @if($tags->id == $value->id)
                    selected
                    @endif
                @endforeach
                >{{$tags->name}}</option>

            @endforeach

        </select>
      </div>
    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="category_id">
            <option value=""> Pilih Kategori </option>
            @foreach ($category as $hasil)
            <option value="{{$hasil->id}}"
                @if($post->category_id == $hasil->id)
                selected
                @endif
                > {{$hasil->name}} </option>
            @endforeach

        </select>
    </div>
    <div class="form-group">
        <label>Thubnail</label>
        <input type="file" class="form-control" name="gambar">
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Ubah Post</button>
    </div>

</form>


@endsection
