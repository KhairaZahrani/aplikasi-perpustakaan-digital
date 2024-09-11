@extends('layouts.app')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Login</h1>
        <form action="/sesi/login" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{old('email')}}">
            @error('email')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" value="{{old('password')}}">
            @error('password')
            <div class="text-danger">{{$message}}</div>
        @enderror
        </div>

        <div class="mb-3 d-grid">
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </div>
        </form>
    </div>
@endsection