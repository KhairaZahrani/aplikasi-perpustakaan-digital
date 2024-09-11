@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3>Edit Buku {{$data->kategori}}</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/kategori/' . $data->id_kategori) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kategori" class="form-label"><strong>Kategori Buku</strong></label>
                    <input type="text" name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{ $data->kategori  }}">
                    @error('kategori')
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
