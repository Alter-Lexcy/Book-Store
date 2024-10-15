<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Database\QueryException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::simplePaginate(5);
        return view('admin.Category.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('Category.index')->with('Berhasil', 'Category Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.Category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category) {
        $category->update($request->all());
        return redirect()->route('Category.index')->with('Berhasil','Kategori Berhasil Di-ubah / Di-Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $hapus = Category::findOrFail($id);
            $hapus->delete();
            return redirect()->route('Category.index')->with('Berhasil', 'Kategori berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors('Kategori Tidak bisa Dihapus Karena Masih Digunakan');
        }
    }
}
