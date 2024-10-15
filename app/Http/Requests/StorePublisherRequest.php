<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePublisherRequest extends FormRequest
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
            'nama_perusahaan'=>'required|unique:publishers,nama_perusahaan',
            'alamat_perusahaan'=>'required|unique:publishers,alamat_perusahaan',
            'deskripsi_perusahaan'=>''
        ];
    }
    public function messages()
    {
        return [
            'nama_perusahaan.required'=>'Nama Perusahaan Belum Di-isi',
            'nama_perusahaan.unique'=>'Nama Perusahaan Sudah Terdaftar',
            'alamat_perusahaan.required'=>'Alamat Perusahaan Belum Di-isi',
            'alamat_perusahaan.unique'=>'Alamat Perusahaan Sudah Ada',
        ];
    }
}
