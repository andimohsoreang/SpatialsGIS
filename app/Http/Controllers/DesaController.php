<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDesaRequest;
use App\Models\Desa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class DesaController extends Controller
{

    public function index()
    {
        // Tampilkan daftar desa
        $desas = Desa::all();
        return view('AdminPage.desaFeatures.index', compact('desas'));
    }

    public function create()
    {
        // Tampilkan form untuk membuat desa baru
        return view('desa.create');
    }

    public function store(StoreDesaRequest $request)
    {
        // dd($request->all());

        Desa::create($request->validated());
        return redirect()->route('desas.index')->with('success', 'Data Desa berhasil ditambahkan.');

    }

    public function update(StoreDesaRequest $request, Desa $desa): RedirectResponse
    {
        // Validasi data, menggunakan validasi kustom
        $validatedData = $request->validated();

        // Update data desa dengan data yang sudah tervalidasi
        $desa->update($validatedData);

        // Redirect kembali ke halaman daftar desa dengan pesan sukses
        return redirect()->route('desas.index')->with('success', 'Data Desa berhasil diperbarui.');
    }

    public function destroy(Desa $desa): RedirectResponse
    {
        // Hapus data desa
        $desa->delete();

        // Redirect ke halaman daftar desa dengan pesan sukses
        return redirect()->route('desas.index')->with('success', 'Data Desa berhasil dihapus.');
    }

    public function exportPDF()
    {
        $desas = Desa::all(); // Ambil semua data desa
        $pdf = Pdf::loadView('AdminPage.desaFeatures.pdf.desas', compact('desas')); // Load view dengan data
        // return $pdf->download('data_desa.pdf'); // Download file PDF dengan nama
        return $pdf->stream('data_desa.pdf'); // Stream file PDF
    }


}
