@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        @if (session('Berhasil'))
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('Berhasil') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container d-flex justify-content-between mb-3">
            <h4 class="fs-bold">Daftar Buku</h4>
            <a href="{{ route('Book.create') }}" class="btn btn-success" title="Tambah Buku"><i
                    class="bi bi-plus-square-fill fs-5"></i></a>
        </div>
    @if ($data->isEmpty())
        <div class="text-center mt-5">
            <h3>Buku Tidak Ada</h3>
            <p class="mb-1">Coba Cari Kata Kunci Lain<br>
                Tekan Tombol Kembali Utuk Melihat List Buku yang Ada </p>
            <a href="{{route('Book.index')}}" class="btn btn-primary">Kembali</a>
        </div>
    @endif
            <div class="row">
                @foreach ($data as $row)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded"
                            style="width: 100%; border-radius: 10px; overflow: hidden;">
                            <!-- Image -->
                            <img src="{{ asset('storage/' . $row->img) }}" class="card-img-top"
                                style="height: 300px; object-fit: contain;">

                            <!-- Card Body -->
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">{{ $row->judul }}</h5>
                                <p class="card-text text-muted">{{ $row->penulis }}</p>

                                <!-- Publisher and Category -->
                                <p class="card-text">
                                    Penerbit: {{ $row->penerbit->nama_perusahaan }} <br>
                                    Kategori: {{ $row->categorybook->pluck('category')->implode(', ') }}
                                </p>

                                <!-- Actions -->
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-info" href="{{ route('Book.show', $row->id) }}">Detail</a>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <form action="{{ route('Book.destroy', $row->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                                </form>
                                            </li>
                                            <li><a class="dropdown-item text-warning"
                                                    href="{{ route('Book.edit', $row->id) }}">Ubah</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center mt-3">
                    {{ $data->links('vendor.pagination.simple-bootstrap-4') }}
                </div>
            </div>
    </div>
@endsection
