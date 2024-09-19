<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKlasifikasiTanahRequest;
use App\Models\Klasifikasitanah;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KlasifikasitanahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $klasifikasitanah = Klasifikasitanah::all();

        return view('AdminPage.klasifikasitanahFeatures.index', compact('klasifikasitanah'));
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
    public function store(StoreKlasifikasiTanahRequest $request)
    {
        // dd($request->all());

        Klasifikasitanah::create($request->validated());

        return redirect()->route('klasifikasitanahs.index')->with('success', 'Data Klasifikasi Tanah Berhasil Ditambahkan');


    }

    /**
     * Display the specified resource.
     */
    public function show(Klasifikasitanah $klasifikasitanah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Klasifikasitanah $klasifikasitanah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreKlasifikasiTanahRequest $request, Klasifikasitanah $klasifikasitanah)
    {
        // Validasi data, menggunakan validasi kustom
        $validatedData = $request->validated();

        $klasifikasitanah->update($validatedData);

        return redirect()->route('klasifikasitanahs.index')->with('success', 'Data Klasifikasi Tanah berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Klasifikasitanah $klasifikasitanah)
    {
        $klasifikasitanah->delete();

        return redirect()->route('klasifikasitanahs.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function exportPDF()
    {
        $klasifikasitanah = Klasifikasitanah::all(); // Ambil semua data desa
        $pdf = Pdf::loadView('AdminPage.klasifikasitanahFeatures.pdf.klasifikasitanah', compact('klasifikasitanah')); // Load view dengan data
        // return $pdf->download('data_desa.pdf'); // Download file PDF dengan nama
        return $pdf->stream('data_klasifikasitanah.pdf'); // Stream file PDF
    }
}
