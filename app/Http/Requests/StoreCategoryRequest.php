<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'category'=>'required|string|unique:categories,category'
        ];
    }
    public function messages()
    {
        return [
            'category.required'=>'Category Belum Di-isis',
            'category.string'=>'Category Harus Berformat Text',
            'category.unique'=>'Category Sudah ada'
        ];
    }
}
