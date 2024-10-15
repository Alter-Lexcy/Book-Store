<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request; // Ganti dengan ini
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) // Menggunakan Request dari Illuminate\Http
    {
        $search = $request->input('search');
        $data = Book::with(['categorybook', 'penerbit'])
            ->whereHas('categorybook', function ($query) use ($search) {
                $query->where('category', 'like', '%' . $search . '%');
            })
            ->orWhereHas('penerbit', function ($query) use ($search) {
                $query->where('nama_perusahaan', 'like', '%' . $search . '%');
            })
            ->orWhere('judul', 'like', '%' . $search . '%')
            ->simplePaginate(3)->withQueryString();
        return view('admin.Book.index', compact('data', 'search'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penerbit = Publisher::all();
        $category = Category::all();
        return view('admin.Book.create', compact('penerbit', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $img = $request->img->store('Buku', 'public');
        $buku = Book::create([
            'img' => $img,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penulis' => $request->penulis,
            'penerbit_id' => $request->penerbit_id,
            'tanggal_rilis' => $request->tanggal_rilis,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'deskripsi_buku' => $request->deskripsi_buku
        ]);

        $buku->categorybook()->attach($request->category_id);

        return redirect()->route('Book.index')->with('Berhasil', 'Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('admin.Book.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $filename = $book->img;
        $book->delete();
        Storage::disk('public')->delete($filename);
        return redirect()->route('Book.index')->with('Berhasil', 'Buku Berhasil Dihapus');
    }
}
