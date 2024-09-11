@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
<a href="/buku/create" class="btn btn-primary">+ Tambah Data Buku</a>
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
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Deskripsi</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$item->judul}}</td>
                    <td>{{$item->penulis}}</td>
                    <td>{{$item->penerbit}}</td>
                    <td>{{$item->deskripsi}}</td>
                    <td>{{$item->tahun_terbit}}</td>
                    <td><a class="btn btn-secondary btn-sm" href="/buku/{{$item->id_buku}}">Detail</a>
                    <a class="btn btn-warning btn-sm" href="/buku/{{$item->id_buku}}/edit">Edit</a>
                    <form class="d-inline" action="{{'/buku/'.$item->id_buku}}" method="post">
                     @csrf
                     @method('DELETE')
                     <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                    </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/admin" class="btn btn-primary">>>kembali</a>
@endsection