@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3>Tambah Kategori Baru</h3>
        </div>
        <div class="card-body">
            <form action="/kategori" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kategori" class="form-label"><strong>Nama Kategori</strong></label>
                    <input type="text" name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}">
                    @error('kategori')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan Kategori</button>
                <a href="/kategori" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
