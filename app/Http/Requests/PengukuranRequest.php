<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengukuranRequest extends FormRequest
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
        return [
            'desa_id' => 'required|exists:desas,id', // validasi desa harus ada di tabel desas
            'frekuensi_natural' => 'required|numeric|min:0|max:1000', // validasi numerik, minimal 0, maksimum sesuai kebutuhan
            'faktor_aplifikasi_tanah' => 'required|numeric|min:0|max:1000', // validasi numerik
            'percepatan_tanah' => 'required|numeric|min:0|max:1000', // validasi numerik
            'lat' => 'required|numeric|between:-90,90', // validasi latitude harus numerik dan antara -90 dan 90
            'long' => 'required|numeric|between:-180,180', // validasi longitude harus numerik dan antara -180 dan 180
            'ukuran_regangan' => 'nullable|in:10^-6,10^-5,10^-4,10^-3,10^-2,10^-1', // validasi nilai ukuran regangan
        ];
    }

    public function messages()
    {
        return [
            'desa_id.required' => 'Desa harus dipilih.',
            'desa_id.exists' => 'Desa yang dipilih tidak valid.',
            'frekuensi_natural.required' => 'Frekuensi natural harus diisi.',
            'frekuensi_natural.numeric' => 'Frekuensi natural harus berupa angka.',
            'frekuensi_natural.min' => 'Frekuensi natural tidak boleh kurang dari 0.',
            'frekuensi_natural.max' => 'Frekuensi natural terlalu besar.',
            'faktor_aplifikasi_tanah.required' => 'Faktor aplifikasi tanah harus diisi.',
            'faktor_aplifikasi_tanah.numeric' => 'Faktor aplifikasi tanah harus berupa angka.',
            'faktor_aplifikasi_tanah.min' => 'Faktor aplifikasi tanah tidak boleh kurang dari 0.',
            'faktor_aplifikasi_tanah.max' => 'Faktor aplifikasi tanah terlalu besar.',
            'percepatan_tanah.required' => 'Percepatan tanah harus diisi.',
            'percepatan_tanah.numeric' => 'Percepatan tanah harus berupa angka.',
            'percepatan_tanah.min' => 'Percepatan tanah tidak boleh kurang dari 0.',
            'percepatan_tanah.max' => 'Percepatan tanah terlalu besar.',
            'lat.required' => 'Latitude harus diisi.',
            'lat.numeric' => 'Latitude harus berupa angka.',
            'lat.between' => 'Latitude harus di antara -90 hingga 90.',
            'long.required' => 'Longitude harus diisi.',
            'long.numeric' => 'Longitude harus berupa angka.',
            'long.between' => 'Longitude harus di antara -180 hingga 180.',
            'ukuran_regangan.in' => 'Ukuran regangan tidak valid. Pilihan yang valid adalah: 10^-6, 10^-5, 10^-4, 10^-3, 10^-2, 10^-1.',

            // Validasi untuk file gambar
            'file_gambar.required' => 'File gambar harus diupload.',
            'file_gambar.image' => 'File gambar harus berupa gambar.',
            'file_gambar.mimes' => 'File gambar harus berformat: jpeg, png, jpg, gif, atau svg.',
            'file_gambar.max' => 'File gambar tidak boleh lebih dari 2MB.',
        ];
    }
}
