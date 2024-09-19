<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSnisRequest;
use App\Models\Sni;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menampilkan data
        $snis = Sni::all();
        return view('AdminPage.snisFeatures.index', compact('snis'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSnisRequest $request)
    {
        // $data = $request->all();
        // dd($data);

        Sni::create($request->validated());

        return redirect()->route('snis.index')->with('success', 'Data SNI Berhasil Ditambahakan');




    }

    /**
     * Display the specified resource.
     */
    public function show(Sni $sni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sni $sni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSnisRequest $request, Sni $sni)
    {
        // Validasi data, menggunakan validasi kustom
        $validatedData = $request->validated();

        // Update data desa dengan data yang sudah tervalidasi
        $sni->update($validatedData);

        // Redirect kembali ke halaman daftar desa dengan pesan sukses
        return redirect()->route('snis.index')->with('success', 'Data SNI berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sni $sni): RedirectResponse
    {
        $sni->delete();

        return redirect()->route('snis.index')->with('success', 'Data SNI berhasil dihapus.');
    }

    public function exportPDF()
    {
        $snis = Sni::all(); // Ambil semua data desa
        $pdf = Pdf::loadView('AdminPage.snisFeatures.pdf.snis', compact('snis')); // Load view dengan data
        // return $pdf->download('data_desa.pdf'); // Download file PDF dengan nama
        return $pdf->stream('data_snis.pdf'); // Stream file PDF
    }
}
