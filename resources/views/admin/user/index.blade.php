@extends('template_backend.home')
@section('sub-judul', 'Users')
@section('content')

<a href="{{route('user.create')}}" class="btn btn-info mb-3">Tambah User</a>
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
            <th>Nama</th>
            <th>Email</th>
            <th>Level</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $result => $hasil)
        <tr>
            <td>{{$result + $user->firstitem()}}</td>
            <td>{{$hasil->name}}</td>
            <td>{{$hasil->email}}</td>
            <td>
                @if($hasil->level == 1)
                <span class="badge badge-warning">Administrator</span>
                @elseif($hasil->level == 0 )
                <span class="badge badge-danger">Author</span>
                @endif
            </td>
            <td>
                <form action="{{ route('user.destroy', $hasil->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('user.edit',$hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
{{$user->links()}}



@endsection
