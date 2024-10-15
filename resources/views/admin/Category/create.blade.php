@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="card shadow-lg p-4 bg-body-tertiary rounded">
            <div class="card-body">
                <center>
                    <h1 class="fs-semibold">Tambah Kategori</h1>
                </center>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('Category.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="poster" class="form-label">Kategori</label>
                        <input type="text" class="form-control" name="category" value="{{ old('category') }}">
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('Category.index') }}" class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-success ">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
