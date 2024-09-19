<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Pengukuran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {

        $desaCount = Desa::count();
        $pengukuranCount = Pengukuran::count();

        $pengukuran = Pengukuran::all();

        return view('AdminPage.dashboard', compact('desaCount', 'pengukuranCount', 'pengukuran'));
    }


}
