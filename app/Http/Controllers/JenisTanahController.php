<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJenisTanahRequest;
use App\Models\Jenistanah;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class JenisTanahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenistanahs = Jenistanah::all();
        return view('AdminPage.jenistanahFeatures.index', compact('jenistanahs'));

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
    public function store(StoreJenisTanahRequest $request)
    {
        // $data = $request->all();
        // dd($data);

        Jenistanah::create($request->validated());

        return redirect()->route('jenistanahs.index')->with('success', 'Data Jenis Tanah Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Jenistanah $jenistanah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenistanah $jenistanah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreJenisTanahRequest $request, Jenistanah $jenistanah)
    {
        // Validasi data, menggunakan validasi kustom
        $validatedData = $request->validated();

        $jenistanah->update($validatedData);

        return redirect()->route('jenistanahs.index')->with('success', 'Data Jenis Tanah berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenistanah $jenistanah)
    {
        $jenistanah->delete();

        return redirect()->route('jenistanahs.index')->with('success', 'Data Jenis Tanah berhasil dihapus.');

    }


    public function exportPDF()
    {
        $jenistanah = Jenistanah::all(); // Ambil semua data desa
        $pdf = Pdf::loadView('AdminPage.jenistanahFeatures.pdf.jenistanah', compact('jenistanah')); // Load view dengan data
        // return $pdf->download('data_desa.pdf'); // Download file PDF dengan nama
        return $pdf->stream('data_snis.pdf'); // Stream file PDF
    }
}
