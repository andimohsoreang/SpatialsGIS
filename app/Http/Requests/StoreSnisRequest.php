<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSnisRequest extends FormRequest
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
        $sniId = $this->route('sni') ? $this->route('sni')->id : null;

        return [
            'snis' => 'required|string|max:255|unique:snis,snis,' . $sniId, // Abaikan validasi unique untuk ID yang sedang diedit
            'kategori' => 'required|string|max:255', // Validasi kategori yang benar tanpa menggabungkan $sniId
        ];

    }

    /**
     * Pesan validasi khusus yang ditampilkan jika ada error.
     */

    public function messages(): array
    {
        return [
            'snis.required' => 'SNI harus diisi!',
            'snis.unique' => 'SNI sudah ada!',
            'kategori.required' => 'Kategori harus diisi!',
        ];
    }
}
