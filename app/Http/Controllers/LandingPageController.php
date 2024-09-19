<?php

namespace App\Http\Controllers;

use App\Models\Pengukuran;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()

    {

        // Ambil semua data pengukuran beserta relasi terkait seperti desa, SNI, jenis tanah, dll.
        $pengukurans = Pengukuran::with('desa', 'sni', 'jenistanah', 'klasifikasitanah', 'regangan')->get();

        // Kirim data ke view untuk ditampilkan di halaman landing page
        return view('userPage.index', compact('pengukurans'));


    }


    public function showMaps()
    {
        // Ambil semua data pengukuran beserta relasi terkait seperti desa, SNI, jenis tanah, dll.
        $pengukurans = Pengukuran::with('desa', 'sni', 'jenistanah', 'klasifikasitanah', 'regangan')->get();

        // Kirim data ke view untuk ditampilkan di halaman landing page
        return view('userPage.mapsFront', compact('pengukurans'));
    }
}
