<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePublisherRequest extends FormRequest
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
            'nama_perusahaan' => ['required', Rule::unique('publishers', 'nama_perusahaan')->ignore($this->route('Publisher'))],
            'alamat_perusahaan' => ['required', Rule::unique('publishers', 'alamat_perusahaan')->ignore($this->route('Publisher'))]
        ];
    }
    public function messages()
    {
        return[
            'nama_perusahaan.required' => 'Nama Perusahaan Belum Di-isi',
            'nama_perusahaan.unique'=>'Nama Perusahaan terdaftar',
            'alamat_perusahaan.required'=>'Alamat Belum Di-isi',
            'alamat_perusahaan.unique'=>'ALamat Perusahaan Sudah Terdaftar'
        ];
    }
}
