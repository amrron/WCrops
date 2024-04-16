<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class StoreProdukRequest extends FormRequest
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
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'required|mimes:jpg,jpeg,png|max:10000',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'kategori_id' => 'required|string',
            'status' => 'nullable|boolean',
        ];
    }
}
