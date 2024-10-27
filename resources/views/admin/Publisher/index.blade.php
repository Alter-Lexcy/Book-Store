@extends('layouts.app')
@section('content')
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

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="container d-flex justify-content-between mb-3">
                    <h4 class="fs-bold">Penerbit Buku</h4>
                    <a href="{{ route('Publisher.create') }}" class="btn btn-success" title="Tambah Penerbit"><i
                            class="bi bi-plus-square-fill fs-5"></i></a>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penerbit</th>
                            <th>Alamat Penerbit</th>
                            <th>Deskripsi Penerbit</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = ($data->currentPage() - 1) * $data->perPage() + 1;
                        @endphp
                        @foreach ($data as $publisher)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $publisher->nama_perusahaan }}</td>
                                <td>{{ $publisher->alamat_perusahaan }}</td>
                                <td>{{ $publisher->deskripsi_perusahaan }}</td>
                                <td>
                                    <a href="{{ route('Publisher.edit', $publisher->id) }}"
                                        class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="{{ route('Publisher.destroy', $publisher->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');"><i
                                                class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $data->links('vendor.pagination.simple-bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
