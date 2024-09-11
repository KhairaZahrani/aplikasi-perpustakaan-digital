@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3>Detail Buku {{$data->Judul}}</h3>
        </div>
        <div class="card-body">
            <a href="/buku" class="btn btn-secondary mb-3">
                <i class="bi bi-arrow-left"></i>>> Kembali
            </a>
            <h4 class="text-primary">Buku ID: {{$data->BukuID}}</h4>
            <hr>
            <div class="mb-3">
                <h5><strong>Judul</strong></h5>
                <p>{{$data->Judul}}</p>
            </div>
            <div class="mb-3">
                <h5><strong>Penulis</strong></h5>
                <p>{{$data->Penulis}}</p>
            </div>
            <div class="mb-3">
                <h5><strong>Penerbit</strong></h5>
                <p>{{$data->Penerbit}}</p>
            </div>
            <div class="mb-3">
                <h5><strong>Tahun Terbit</strong></h5>
                <p>{{$data->TahunTerbit}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
