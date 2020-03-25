@extends('template_backend.home')
@section('sub-judul', 'Tag')
@section('content')

<a href="{{route('tag.create')}}" class="btn btn-info mb-3">Tambah Tag</a>
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
            <th>Nama Tag</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tag as $result => $hasil)
        <tr>
            <td>{{$result + $tag->firstitem()}}</td>
            <td>{{$hasil->name}}</td>
            <td>
                <form action="{{ route('tag.destroy', $hasil->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('tag.edit',$hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
{{$tag->links()}}



@endsection