<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReganganRequest;
use App\Models\Regangan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReganganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regangans =  Regangan::all();

        return view('AdminPage.reganganFeatures.index', compact('regangans'));
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
    public function store(StoreReganganRequest $request)
    {
        // dd($request->all());

        Regangan::create($request->validated());

        return redirect()->route('regangans.index')->with('success', 'Data Regangan Tanah Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(REgangan $rEgangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(REgangan $rEgangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreReganganRequest $request, Regangan $regangan)
    {
        // Validasi data, menggunakan validasi kustom
        $validatedData = $request->validated();

        $regangan->update($validatedData);

        return redirect()->route('regangans.index')->with('success', 'Data Regangan Geser Tanah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regangan $regangan)
    {
        $regangan->delete();

        return redirect()->route('regangans.index')->with('success', 'Data Berhasil Dihapus');



    }

    public function exportPDF()
    {
        $regangan = Regangan::all(); // Ambil semua data desa
        $pdf = Pdf::loadView('AdminPage.reganganFeatures.pdf.regangan', compact('regangan')); // Load view dengan data
        // return $pdf->download('data_desa.pdf'); // Download file PDF dengan nama
        return $pdf->stream('data_klasifikasitanah.pdf'); // Stream file PDF
    }
}
