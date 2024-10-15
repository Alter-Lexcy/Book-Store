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
    <div class="container d-flex justify-content-between mb-3">
        <h4 class="fs-semibold">Kategori Buku</h4>
        <a href="{{ route('Category.create') }}" class="btn btn-success" title="Tambah Kategori"><i class="bi bi-plus-square-fill fs-5"></i></a>
    </div>

    <div class="container">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori Buku</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = ($data->currentPage() - 1) * $data->perPage() + 1;
                @endphp
                @foreach ($data as $category)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $category->category }}</td>
                        <td>
                            <a href="{{ route('Category.edit', $category->id) }}" class="btn btn-warning btn-sm"><i
                                    class="bi bi-pencil-fill"></i></a>
                            <form action="{{ route('Category.destroy', $category->id) }}" method="POST"
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
@endsection
