<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use PhpParser\Node\Stmt\TryCatch;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Publisher::simplePaginate(5);
        return view('admin.Publisher.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublisherRequest $request)
    {
        Publisher::create($request->all());
        return redirect()->route('Publisher.index')->with('Berhasil','Penerbit Sudah Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $publisher = Publisher::findOrFail($id);
        return view('admin.Publisher.update',compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $publisher->update($request->all());
        return redirect()->route('Publisher.index')->with('Berhasil','Penerbit Sudah Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $publisher = Publisher::findOrFail($id);
            $publisher->delete();
            return redirect()->route('Publisher.index')->with('Berhasil','Penerbit Sudah dihapus');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors('Data Penerbit sedang Digunakan');
        }
    }
}
