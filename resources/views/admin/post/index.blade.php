@extends('template_backend.home')
@section('sub-judul', 'Post')
@section('content')

<a href="{{route('post.create')}}" class="btn btn-info mb-3">Tambah Post</a>
<br>

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

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Post</th>
            <th>Kategori</th>
            <th>Tags</th>
            <th>Publisher</th>
            <th>Thumbnail</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($post as $result => $hasil)
        <tr>
            <td>{{$result + $post->firstitem()}}</td>
            <td>{{$hasil->judul}}</td>
            <td>{{$hasil->category->name}}</td>

            <td>
            @foreach($hasil->tags as $tag)
               <h6><span class="badge badge-info mt-2">{{$tag->name}}</span></h6>
            @endforeach
            <td>{{$hasil->users->name}}</td>
            </td>
            <td> <img src="{{asset($hasil->gambar)}}" class="img-fluid" style="width:50px"></td>
            <td>
                <form action="{{ route('post.destroy', $hasil->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('post.edit',$hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
{{$post->links()}}



@endsection
