@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3>Edit Buku {{$data->judul}}</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/buku/' . $data->id_buku) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="judul" class="form-label"><strong>Judul Buku</strong></label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ $data->judul  }}">
                    @error('judul')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label"><strong>Penulis</strong></label>
                    <input type="text" name="penulis" id="penulis" class="form-control @error('penulis') is-invalid @enderror" value="{{ $data->penulis }}">
                    @error('penulis')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="penerbit" class="form-label"><strong>Penerbit</strong></label>
                    <input type="text" name="penerbit" id="penerbit" class="form-control @error('penerbit') is-invalid @enderror" value="{{ $data->penerbit }}">
                    @error('penerbit')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label"><strong>Deskripsi</strong></label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ $data->deskripsi }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tahun_terbit" class="form-label"><strong>Tahun Terbit</strong></label>
                    <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror" value="{{ $data->tahun_terbit }}">
                    @error('tahun_terbit')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Edit Buku</button>
                <a href="/buku" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
