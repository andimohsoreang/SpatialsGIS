<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengukuranRequest;
use App\Models\Desa;
use App\Models\Jenistanah;
use App\Models\Klasifikasitanah;
use App\Models\Pengukuran;
use App\Models\Sni;
use App\Models\Spatial;
use App\Models\Regangan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class SpatialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengukuran = Pengukuran::with('desa', 'sni', 'jenistanah', 'klasifikasitanah', 'regangan')->get();


        // dd($pengukuran);

        return view('AdminPage.spatialFeatures.index', compact('pengukuran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $desas = Desa::all();

        return view('AdminPage.spatialFeatures.create-page', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PengukuranRequest $request)
    {
        // Validasi dan simpan data
        $validated = $request->validated();
        $desa = Desa::findOrFail($validated['desa_id']);
        $gelombangGeser = $desa->gelombang_geser;

        // Tentukan ID SNI berdasarkan rentang gelombang geser
        $sniId = $this->getSniIdBasedOnGelombangGeser($gelombangGeser);
        $validated['snis_id'] = $sniId;

        // Tentukan ID Jenis Tanah berdasarkan frekuensi natural (A0)
        $frekuensiNatural = $validated['frekuensi_natural'];
        $jenistanahId = $this->getJenisTanahIdBasedOnA0($frekuensiNatural);
        $validated['jenistanah_id'] = $jenistanahId;

        // Tentukan ID Jenis Tanah Berdasarkan Faktor Aplifikasi Tanah (A0)
        $faktoraplifikasitanah = $validated['faktor_aplifikasi_tanah'];
        $klasifikasitanahId = $this->getJenisTanahIdBasedOnFrekuensi($faktoraplifikasitanah);
        $validated['klasifikasitanah_id'] = $klasifikasitanahId;

        // Menentukan Nilai Indeks Kerentanan Sesimik (KG)
        $nilaiA0 = $validated['faktor_aplifikasi_tanah'];
        $nilaiF0 = $validated['frekuensi_natural'];
        $KG = ($nilaiA0 ** 2) / $nilaiF0; // Perhitungan KG

        // Simpan KG ke dalam array validated
        $validated['indeks_kerentanan_sesimik'] = $KG;

        // Menentukan nilai regangan geser tanah (GSS)
        $nilaiPGam = $validated['percepatan_tanah'];
        $nilaiKg = $KG;

        // Hitung GSS = (PGam * KG) * 10^-6
        $GSS = $this->hitungReganganGeserTanah($nilaiPGam, $nilaiKg);

        // Format GSS ke dalam notasi ilmiah
        $GSSNotasiIlmiah = sprintf('%e', $GSS); // Mengonversi hasil ke notasi ilmiah

        // dd($GSS);
        // Simpan GSS ke dalam array validated
        $validated['regangan_geser_tanah'] = $GSS;
        $validated['ukuran_regangan'] = $GSSNotasiIlmiah;

        // Cari kategori regangan sesuai dengan notasi ilmiah
        $kategoriRegangan = $this->cariKategoriRegangan($GSSNotasiIlmiah);
        $validated['regangan_id'] = $kategoriRegangan;

        // Menyimpan file gambar jika ada
        if ($request->hasFile('file_gambar')) {
            $file = $request->file('file_gambar');
            $filePath = $file->store('uploads/gambar', 'public'); // Simpan di folder public/uploads/gambar
            $validated['file_gambar'] = $filePath;
        }

    // dd($validated);

        // Simpan data pengukuran
        $pengukuran = Pengukuran::create($validated);
        // dd($request->all());

        // Redirect ke halaman hasil dengan data SNI dan Jenis Tanah
        // return redirect()->route('spatial.result', $pengukuran->id);

        // Redirect ke halaman indeks dengan pesan sukses
        return redirect()->route('spatial.index')->with('success', 'Data spasial berhasil ditambahkan!');
    }
    /**
     * Method untuk menentukan ID SNI berdasarkan gelombang geser
     */
    protected function getSniIdBasedOnGelombangGeser($gelombangGeser)
    {
        if ($gelombangGeser >= 1500) {
            return 1; // ID untuk 'SA (Batuan Keras)'
        } elseif ($gelombangGeser >= 750 && $gelombangGeser < 1500) {
            return 2; // ID untuk 'SB (Batuan)'
        } elseif ($gelombangGeser >= 350 && $gelombangGeser < 750) {
            return 3; // ID untuk 'SC (Tanah Keras, Sangat Padat dan Batuan Lunak)'
        } elseif ($gelombangGeser >= 175 && $gelombangGeser < 350) {
            return 4; // ID untuk 'SD (Tanah Sedang)'
        } else {
            return 5; // ID untuk 'SE (Tanah Lunak)'
        }
    }

    /**
     * Method untuk menentukan ID Jenis Tanah berdasarkan frekuensi natural (A0)
     */
    protected function getJenisTanahIdBasedOnFrekuensi($frekuensiNatural)
    {
        // Logika kategori frekuensi natural (A0)
        if ($frekuensiNatural < 3) {
            return 1; // ID untuk 'Tanah Rendah'
        } elseif ($frekuensiNatural >= 3 && $frekuensiNatural < 6) {
            return 2; // ID untuk 'Tanah Sedang'
        } elseif ($frekuensiNatural >= 6 && $frekuensiNatural < 9) {
            return 3; // ID untuk 'Tanah Tinggi'
        } else {
            return 4; // ID untuk 'Tanah Sangat Tinggi'
        }
    }

    protected function getJenisTanahIdBasedOnA0($A0)
    {
        if ($A0 >= 0.05 && $A0 <= 0.15) {
            return 1; // Jenis I (Keras)
        } elseif ($A0 > 0.15 && $A0 <= 0.25) {
            return 2; // Jenis II (Sedang)
        } elseif ($A0 > 0.25 && $A0 <= 0.40) {
            return 3; // Jenis III (Lunak)
        } elseif ($A0 > 0.40) {
            return 4; // Jenis IV (Sangat Lunak)
        } else {
            return null; // Jika tidak ada data yang sesuai
        }
    }

    protected function cariKategoriRegangan($GSSNotasiIlmiah)
    {
        // Cek ukuran regangan berdasarkan notasi ilmiah dan kembalikan ID
        if (strpos($GSSNotasiIlmiah, 'e-6') !== false) {
            return 1;
        } elseif (strpos($GSSNotasiIlmiah, 'e-5') !== false) {
            return 2;
        } elseif (strpos($GSSNotasiIlmiah, 'e-4') !== false) {
            return 3;
        } elseif (strpos($GSSNotasiIlmiah, 'e-3') !== false) {
            return 4;
        } elseif (strpos($GSSNotasiIlmiah, 'e-2') !== false) {
            return 5;
        } elseif (strpos($GSSNotasiIlmiah, 'e-1') !== false) {
            return 6;
        }

        return null; // Jika tidak ada kecocokan
    }


    protected function hitungReganganGeserTanah($nilaiPGam, $nilaiKg)
    {
        // Rumus GSS = (PGam * KG) * 10^-6
        return ($nilaiPGam * $nilaiKg) * (10 ** -6);
    }

    // protected function cariKategoriRegangan($GSSNotasiIlmiah)
    // {
    //     // Mencocokkan notasi ilmiah dengan data di tabel regangans
    //     $ukuranRegangan = str_replace(['e-', 'E-'], '10^-', $GSSNotasiIlmiah);

    //     // Cari ukuran regangan di tabel regangans
    //     return Regangan::where('ukuranregangan', $ukuranRegangan)->first();
    // }



    public function showResult($id)
    {
        $pengukuran = Pengukuran::findOrFail($id);
        $desa = Desa::findOrFail($pengukuran->desa_id);
        $sni = Sni::find($pengukuran->snis_id);
        $jenistanah = Jenistanah::find($pengukuran->jenistanah_id); // Ambil data jenis tanah berdasarkan ID
        $klasifikasitanah = Klasifikasitanah::find($pengukuran->klasifikasitanah_id);
        $regangan = Regangan::find($pengukuran->regangan_id);

        return view('AdminPage.spatialFeatures.result', compact('pengukuran', 'desa', 'sni', 'jenistanah', 'klasifikasitanah', 'regangan'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Spatial $spatial) {}



    public function edit($id)
    {
        // Cari data pengukuran berdasarkan ID
        $pengukuran = Pengukuran::with('desa', 'sni', 'jenistanah', 'klasifikasitanah', 'regangan')->findOrFail($id);

        // Ambil data desa untuk pilihan dropdown
        $desas = Desa::all();

        // Menampilkan halaman edit dan mengirim data pengukuran dan desa ke view
        return view('AdminPage.spatialFeatures.edit-page', compact('pengukuran', 'desas'));
    }


    public function update(PengukuranRequest $request, $id)
    {
        // Validasi data yang diinput
        $validated = $request->validated();

        // Cari data pengukuran berdasarkan ID
        $pengukuran = Pengukuran::findOrFail($id);

        // Ambil data desa untuk mendapatkan nilai gelombang geser
        $desa = Desa::findOrFail($validated['desa_id']);
        $gelombangGeser = $desa->gelombang_geser;

        // Tentukan ID SNI berdasarkan rentang gelombang geser
        $sniId = $this->getSniIdBasedOnGelombangGeser($gelombangGeser);
        $validated['snis_id'] = $sniId;

        // Tentukan ID Jenis Tanah berdasarkan frekuensi natural (A0)
        $frekuensiNatural = $validated['frekuensi_natural'];
        $jenistanahId = $this->getJenisTanahIdBasedOnA0($frekuensiNatural);
        $validated['jenistanah_id'] = $jenistanahId;

        // Tentukan ID Klasifikasi Tanah Berdasarkan Faktor Aplifikasi Tanah (A0)
        $faktoraplifikasitanah = $validated['faktor_aplifikasi_tanah'];
        $klasifikasitanahId = $this->getJenisTanahIdBasedOnFrekuensi($faktoraplifikasitanah);
        $validated['klasifikasitanah_id'] = $klasifikasitanahId;

        // Menentukan Nilai Indeks Kerentanan Sesimik (KG)
        $nilaiA0 = $validated['faktor_aplifikasi_tanah'];
        $nilaiF0 = $validated['frekuensi_natural'];
        $KG = ($nilaiA0 ** 2) / $nilaiF0; // Perhitungan KG
        $validated['indeks_kerentanan_sesimik'] = $KG;

        // Menentukan nilai regangan geser tanah (GSS)
        $nilaiPGam = $validated['percepatan_tanah'];
        $nilaiKg = $KG;

        // Hitung GSS = (PGam * KG) * 10^-6
        $GSS = $this->hitungReganganGeserTanah($nilaiPGam, $nilaiKg);

        // Format GSS ke dalam notasi ilmiah
        $GSSNotasiIlmiah = sprintf('%e', $GSS); // Mengonversi hasil ke notasi ilmiah
        $validated['regangan_geser_tanah'] = $GSS;
        $validated['ukuran_regangan'] = $GSSNotasiIlmiah;

        // Cari kategori regangan sesuai dengan notasi ilmiah
        $kategoriRegangan = $this->cariKategoriRegangan($GSSNotasiIlmiah);
        $validated['regangan_id'] = $kategoriRegangan;

        // Cek jika ada file gambar baru, simpan dan hapus gambar lama
        if ($request->hasFile('file_gambar')) {
            // Hapus file gambar lama jika ada
            if ($pengukuran->file_gambar) {
                Storage::disk('public')->delete($pengukuran->file_gambar);
            }

            // Simpan file gambar baru
            $file = $request->file('file_gambar');
            $filePath = $file->store('uploads/gambar', 'public');
            $validated['file_gambar'] = $filePath;
        }

        // Update data pengukuran ke dalam database
        $pengukuran->update($validated);

        // Redirect kembali ke halaman hasil atau halaman pengukuran
        // return redirect()->route('spatial.result', $pengukuran->id)->with('success', 'Data pengukuran berhasil diupdate');
        return redirect()->route('spatial.index')->with('success', 'Data pengukuran berhasil diedit');

    }

    /**
     * Remove the specified resource from storage.
     */ public function destroy($id)
    {
        // Cari data pengukuran berdasarkan ID
        $pengukuran = Pengukuran::findOrFail($id);

        // Hapus data pengukuran
        $pengukuran->delete();

        // Redirect ke halaman daftar pengukuran dengan pesan sukses
        return redirect()->route('spatial.index')->with('success', 'Data pengukuran berhasil dihapus');
    }



    public function exportPDF()
    {
        $spatial = Pengukuran::with('desa')->get(); // Ambil semua data desa
        $pdf = Pdf::loadView('AdminPage.SpatialFeatures.pdf.pdf', compact('spatial'))
        ->setPaper('a4', 'landscape'); // Set ukuran kertas A4 dengan orientasi landscape (horizontal)

        return $pdf->stream('data_spatial.pdf'); // Stream file PDF
    }

}
