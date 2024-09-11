@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
<a href="/kategori/create" class="btn btn-primary">+ Tambah Data</a>
<a href="/sesi/logout" class="btn btn-secondary">Logout</a>


</div>

<div>
    @if (Session('pesan'))
    <div class="alert alert-success" role="alert">{{Session('pesan')}}</div>
    @endif
</div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$item->kategori}}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="/kategori/{{$item->id_kategori}}/edit">Edit</a>
                    <form class="d-inline" action="{{'/kategori/'.$item->id_kategori}}" method="post">
                     @csrf
                     @method('DELETE')
                     <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/admin" class="btn btn-primary">>>kembali</a>
@endsection