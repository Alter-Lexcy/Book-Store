@extends('layouts.app')
@section('content')
    {{-- Link Style --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Content --}}
    <div class="container">
        <div class="card mb-2">
            <div class="card-body">
                <a href="{{ route('Book.index') }}" class="btn btn-;l[puytrq    ]"><i class="bi bi-caret-left-fill"></i></a>
                <div class="content">
                    @foreach ($buku as $book)
                        <div class="image">
                            <img src="{{ asset('storage/' . $book->img) }}" id="preview-selected-image"
                                class="img-thumbnail shadow p-1 bg-body-tertiary" style="width: 250px; height: auto;" />
                        </div>
                        <div class="text">
                            <p class="publisher fw-semibold">{{ $book->penulis }}</p>
                            <h1 class="book-title fw-bold">{{ $book->judul }}</h1>
                            <div class="content2">
                                <p class="fw-bold">Penerbit : &nbsp; <span
                                        class="fw-medium">{{ $book->penerbit->nama_perusahaan }}</span></p>
                                <p class="fw-bold">Kategory : &nbsp; <span
                                        class="fw-medium">{{ $book->categorybook->pluck('category')->implode(', ') }}</span>
                                </p>
                                <p class="fw-bold">Tanggal : &nbsp; <span
                                        class="fw-medium">{{ \Carbon\Carbon::parse($book->tanggal_rilis)->translatedFormat('d F Y') }}</span>
                                </p>
                            </div>
                        </div>
                </div>
                <div class="deskripsi">
                    <p class="text-deskripsi fw-bold">Deskripsi : </p>
                    <span class=" fw-medium">{{ $book->deskripsi_buku }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
