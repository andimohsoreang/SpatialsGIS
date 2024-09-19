<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReganganRequest extends FormRequest
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
    public function rules()
    {
        // Ambil ID dari parameter route jika tersedia
        $reganganId = $this->route('regangan') ? $this->route('regangan')->id : null;

        return [
            // Validasi dengan pengecualian ID yang sedang di-update
            'ukuranregangan' => 'required|string|max:255|unique:regangans,ukuranregangan,' . $reganganId . ',id',
            'fenomena' => 'required|string|max:255|unique:regangans,fenomena,' . $reganganId . ',id',
            'propertidinamis' => 'required|string|max:255|unique:regangans,propertidinamis,' . $reganganId . ',id',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'ukuranregangan.required' => 'Ukuran Regangan wajib diisi.',
            'ukuranregangan.unique' => 'Ukuran Regangan sudah ada!',
            'fenomena.required' => 'Fenomena wajib diisi.',
            'fenomena.unique' => 'Fenomena sudah ada!',
            'propertidinamis.required' => 'Properti Dinamis wajib diisi.',
            'propertidinamis.unique' => 'Properti Dinamis sudah ada!',
        ];
    }
}
