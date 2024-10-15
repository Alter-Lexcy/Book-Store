<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
            'category'=>[
            'required',
            'string',
            Rule::unique('categories','category')
            ->ignore($this->Category->id)
            ]
        ];
    }
    public function messages()
    {
        return [
            'category.required'=>'Kategori Belum Di-isi',
            'category.string'=>'Kategori Harus Berfomat Text',
            'category.unique'=>'Kategori Sudah ada'
        ];
    }
}