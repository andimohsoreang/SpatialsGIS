<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKlasifikasiTanahRequest extends FormRequest
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
        $klasifikasiTanahId = $this->route('klasifikasitanah') ? $this->route('klasifikasitanah')->id : null;

        return [
            // Validasi dengan pengecekan keunikan
            'jenistanah' => 'required|string|max:255|unique:jenistanahs,jenistanah,' . $klasifikasiTanahId,
            'kategori' => 'required|string|max:255',
            'klasifikasikanal' => 'required|string|max:255',
            'karakteristik' => 'required|string|max:255',
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
            'jenistanah.required' => 'Jenis tanah wajib diisi.',
            'jenistanah.unique' => 'Jenis tanah sudah ada!',
            'kategori.required' => 'Kategori wajib diisi.',
            'klasifikasikanal.required' => 'Klasifikasi kanal wajib diisi.',
            'karakteristik.required' => 'Karakteristik wajib diisi.',
        ];
    }
}
