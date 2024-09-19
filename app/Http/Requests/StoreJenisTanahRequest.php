<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJenisTanahRequest extends FormRequest
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
        // Ambil ID dari parameter route jika tersedia
        $jenisTanahId = $this->route('jenistanah') ? $this->route('jenistanah')->id : null;

        return [
            // Periksa keunikan berdasarkan ID jika diupdate
            'jenistanah' => 'required|string|max:255|unique:jenistanahs,jenistanah,' . $jenisTanahId,
            'klasifikasi' => 'required|string|max:255',
            'klasifikasikanal' => 'required|string|max:255',
        ];
    }

    /**
     * Pesan validasi khusus yang ditampilkan jika ada error.
     */
    public function messages(): array
    {
        return [
            'jenistanah.required' => 'Jenis tanah harus diisi!',
            'jenistanah.unique' => 'Jenis tanah sudah ada!',
            'klasifikasi.required' => 'Klasifikasi harus diisi!',
            'klasifikasi.unique' => 'Klasifikasi sudah ada!',
            'klasifikasikanal.required' => 'Klasifikasi kanal harus diisi!',
            'klasifikasikanal.unique' => 'klasifikasi kanal sudah ada!'
        ];
    }
}
