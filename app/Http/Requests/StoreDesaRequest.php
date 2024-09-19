<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDesaRequest extends FormRequest
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
        // Dapatkan ID desa jika tersedia, digunakan untuk pengecekan unik
        $desaId = $this->route('desa') ? $this->route('desa')->id : null;

        return [
            'nama_desa' => 'required|string|max:255',
            'kode_desa' => 'required|string|max:50|unique:desas,kode_desa,' . $desaId,
            'gelombang_geser' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_desa.required' => 'Nama desa harus diisi!',
            'kode_desa.required' => 'Kode desa harus diisi!',
            'kode_desa.unique' => 'Kode desa sudah ada!',
            'gelombang_geser.required' => 'Kecepatan gelombang geser harus diisi.',
            'gelombang_geser.numeric' => 'Kecepatan gelombang geser harus berupa angka.',
        ];
    }
}
