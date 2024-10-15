@extends('layouts.app')

@section('content')

    {{-- untuk memanggil select2 --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="container mb-3">
        <div class="card shadow-lg p-4 bg-body-tertiary rounded">
            <div class="card-body">
                <center>
                    <h1 class="">Tambah Buku</h1>
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
                <form action="{{ route('Book.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 text-center">
                        <img id="preview-selected-image" class="img-thumbnail shadow p-1 mb-4 bg-body-tertiary"
                            style="max-width: 25%; height: auto;" />
                    </div>

                    <div class="mb-3">
                        <label for="poster" class="form-label">Gambar Buku (Landscape)</label>
                        <input type="file" class="form-control" id="img" name="img" value="{{ old('img') }}"
                            onchange="previewImage(event);">
                    </div>

                    <div class="mb-3">
                        <label for="nama_event" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}"
                            placeholder="Masukkan judul">
                    </div>

                    <div class="mb-3">
                        <label for="nama_event" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis"
                            value="{{ old('penulis') }}" placeholder="Masukkan nama penulis">
                    </div>

                    <div class="mb-3">
                        <label for="categori_id" class="form-label">Penerbit</label>
                        <select class="form-control" id="penerbit_id" name="penerbit_id">
                            <option value="" disabled selected>Pilih Penerbit</option>
                            @foreach ($penerbit as $publisher)
                                <option value="{{ $publisher->id }}"
                                    {{ old('penerbit_id') == $publisher->id ? 'selected' : '' }}>
                                    {{ $publisher->nama_perusahaan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="artis" class="form-label">Kategori Buku</label>
                        <select class="form-control js-example-basic-multiple" id="category_id" name="category_id[]"
                            multiple="multiple">
                            @foreach ($category as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ old('category_id') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <div>
                            <label for="mulai" class="form-label">Tanggal Penerbit</label>
                            <input type="date" class="form-control" id="tanggal_rilis" name="tanggal_rilis"
                                value="{{ old('tanggal_rilis') }}">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok"
                                value="{{ old('stok') }}" placeholder="Masukkan jumlah stok">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Harga/pcs</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                value="{{ old('harga') }}" placeholder="Masukkan jumlah Harga">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Deskripsi Buku</label>
                            <textarea name="deskripsi_buku" id="" class="form-control">{{ old('deskripsi_buku') }}</textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('Book.index') }}" class="btn btn-primary">Kembali</a>
                            <button type="submit" class="btn btn-success ">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- script untuk preview dan select 2 --}}
    <script>
        const previewImage = (event) => {
            const files = event.target.files;
            if (files.length > 0) {
                const imgUrl = URL.createObjectURL(files[0]);
                const imageElement = document.getElementById("preview-selected-image");
                imageElement.src = imgUrl;
            }
        }
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Pilih Kategori Buku",
                allowClear: true
            });
        });
    </script>
@endsection
