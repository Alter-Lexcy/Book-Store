<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'img' => 'required|max:2048',
            'judul'=> 'required|unique:books,judul',
            'penulis'=>'required',
            'penerbit_id'=>'required',
            'category_id'=>'required',
            'category_id.*'=>'exists:categories,id',
            'tanggal_rilis'=>'required|date',
            'stok'=>'required|numeric|min:0',
            'harga'=>'required|numeric|min:0',
            'deskripsi_buku'=>'unique:books,deskripsi_buku'
        ];
    }
    public function messages()
    {
        return[
            'img.required'=>'Gambar Buku Belum Di-isi',
            'img.max'=>'Gambar Tidak Boleh melebihi 2 MB',
            'judul.required'=>'Judul Belum Di-isi',
            'judul.unique'=>'Judul Sudah Terdaftar',
            'penulis.required'=>'Nama Penulis Belum Di-isi',
            'penerbit_id.required'=>'Penerbit Belum Di-pilih',
            'category_id.required'=>'Kategori Belum Di-pilih',
            'tanggal_rilis.required'=>'Tanggal Rilis Belum Di-isi',
            'tanggal_rilis.date'=>'Tanggal Rilis Harus Berformat Tanggal',
            'stok.required'=>'Stok belum Di-isi',
            'stok.numeric'=>'Stok Harus Berformat Angka',
            'stok.min'=>'Stok Tidak Bisa Mines',
            'harga.required'=>'Harga belum Di-isi',
            'harga.numeric'=>'Harga Harus Berformat Angka',
            'harga.min'=>'Harga Tidak Bisa Mines',
            'deskripsi_buku.unique'=>'Deskripsi Buku Sudah Ada',
        ];
    }
}
