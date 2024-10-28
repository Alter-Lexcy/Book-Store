<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
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
            'img'=>['required'],
            'judul'=>['required',Rule::unique('books','judul')->ignore($this->route('Book'))],
            'penulis'=>['required'],
            'penerbit_id'=>['required'],
            'category_id*'=>['exists:categorie,id'],
            'category_id'=>['required'],
            'tanggal_rilis'=>['required','date'],
        ];
    }
    public function  messages(){
        return[
            'img.required'=>'Gambar Belum Di-isi',
            'judul.required'=>'Judul Buku Belum Di-isi',
            'judul.unique'=>'Judul Sudah Terdaftar',
            'penulis.required'=>'Penulis Belum Di-isis',
            'penerbit_id.required'=>'Penerbit Belum Di-Pilih',
            'category_id.required'=>'Kategori Belum Di-Pilih',
            'tanggal_rilis.required'=>'Tanggal Rilis Belum Di-isi',
            'tanggal__rilis.date'=>'Harus Berformat Tanggal',
        ];
    }
}
