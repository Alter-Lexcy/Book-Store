@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="card shadow-lg p-4 bg-body-tertiary rounded">
            <div class="card-body">
                <center>
                    <h1 class="fs-semibold">Ubah Penerbit</h1>
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
                <form action="{{ route('Publisher.update',$publisher->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="poster" class="form-label">Nama Penerbit</label>
                        <input type="text" class="form-control" name="nama_perusahaan" value="{{$publisher->nama_perusahaan}}">
                    </div>
                    <div class="mb-3">
                        <label for="poster" class="form-label">Alamat Penerbit</label>
                        <textarea name="alamat_perusahaan" id="alamat_perusahaan"class="form-control">{{$publisher->alamat_perusahaan}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="poster" class="form-label">Deskripsi Penerbit</label>
                        <textarea name="deskripsi_perusahaan" id="deskripsi_perusahaan"class="form-control">{{$publisher->deskripsi_perusahaan}}</textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('Publisher.index') }}" class="btn btn-primary">Kembali</a>
                        <button type="submit" class="btn btn-success ">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
