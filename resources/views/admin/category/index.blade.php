@extends('template_backend.home')
@section('sub-judul', 'Kategori')
@section('content')

<a href="{{route('category.create')}}" class="btn btn-info mb-3">Tambah Kategori</a>
<br>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($category as $result => $hasil)
        <tr>
            <td>{{$result + $category->firstitem()}}</td>
            <td>{{$hasil->name}}</td>
            <td><a href="" class="btn btn-primary btn-sm">Edit</a><a href="" class="btn btn-danger btn-sm">Hapus</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$category->links()}}



@endsection
