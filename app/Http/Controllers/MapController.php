<?php

namespace App\Http\Controllers;

use App\Models\Pengukuran;
use App\Models\yes;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    public function showAllMap()
    {
        // Ambil semua data pengukuran dari database
        $pengukurans = Pengukuran::all(['id','lat', 'long', 'regangan_id', 'desa_id']); // Tambahkan regangan_id // Mengambil lat, long, dan desa_id

        // Kirim data ke view
        return view('MapsUser.all_map', compact('pengukurans'));
    }
}
