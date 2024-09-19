<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\JenisTanahController;
use App\Http\Controllers\KlasifikasitanahController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\ReganganController;
use App\Http\Controllers\SniController;
use App\Http\Controllers\SpatialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('desas', [DesaController::class, 'index'])->name('desas.index');
    Route::get('desas/create', [DesaController::class, 'create'])->name('desas.create');
    Route::post('desas', [DesaController::class, 'store'])->name('desas.store');
    Route::put('desas/{desa}', [DesaController::class, 'update'])->name('desas.update');
    Route::delete('desas/{desa}', [DesaController::class, 'destroy'])->name('desas.destroy');
    Route::get('/desas/export-pdf', [DesaController::class, 'exportPDF'])->name('desas.exportPDF');

    Route::get('snis', [SniController::class, 'index'])->name('snis.index');
    Route::post('snis', [SniController::class, 'store'])->name('snis.store');
    Route::delete('snis/{sni}', [SniController::class, 'destroy'])->name('snis.destroy');
    Route::get('/snis/export-pdf', [SniController::class, 'exportPDF'])->name('snis.exportPDF');
    Route::put('snis/{sni}', [SniController::class, 'update'])->name('snis.update');

    Route::get('jenistanahs', [JenisTanahController::class, 'index'])->name('jenistanahs.index');
    Route::post('jenistanahs', [JenisTanahController::class, 'store'])->name('jenistanahs.store');
    Route::delete('jenistanahs/{jenistanah}', [JenisTanahController::class, 'destroy'])->name('jenistanahs.destroy');
    Route::get('jenistanahs/export-pdf', [JenisTanahController::class, 'exportPDF'])->name('jenistanahs.exportPDF');
    Route::put('jenistanahs/{jenistanah}', [JenisTanahController::class, 'update'])->name('jenistanahs.update');

    Route::get('klasifikasitanahs', [KlasifikasitanahController::class, 'index'])->name('klasifikasitanahs.index');
    Route::post('klasifikasitanahs', [KlasifikasitanahController::class, 'store'])->name('klasifikasitanahs.store');
    Route::delete('klasifikasitanahs/{klasifikasitanah}', [KlasifikasitanahController::class, 'destroy'])->name('klasifikasitanahs.destroy');
    Route::put('klasifikasitanahs/{klasifikasitanah}', [KlasifikasitanahController::class, 'update'])->name('klasifikasitanahs.update');
    Route::get('klasifikasitanah/export-pdf', [KlasifikasitanahController::class, 'exportPDF'])->name('klasifikasitanah.exportPDF');


    Route::get('regangans', [ReganganController::class, 'index'])->name('regangans.index');
    Route::post('regangans', [ReganganController::class, 'store'])->name('regangans.store');
    Route::delete('regangans/{regangan}', [ReganganController::class, 'destroy'])->name('regangans.destroy');
    Route::put('regangans/{regangan}', [ReganganController::class, 'update'])->name('regangans.update');
    Route::get('regangans/export-pdf', [ReganganController::class, 'exportPDF'])->name('regangans.exportPDF');


    Route::get('spatials', [SpatialController::class, 'index'])->name('spatial.index');
    Route::get('spatials/create', [SpatialController::class, 'create'])->name('spatial.create');
    Route::post('spatials/store', [SpatialController::class, 'store'])->name('spatial.store');
    Route::get('spatials/result/{id}', [SpatialController::class, 'showResult'])->name('spatial.result');
    // Route untuk halaman edit
    Route::get('/spatial/{id}/edit', [SpatialController::class, 'edit'])->name('spatial.edit');

    // Route untuk menyimpan hasil update
    Route::put('/spatial/{id}', [SpatialController::class, 'update'])->name('spatial.update');
    Route::delete('/spatial/{id}', [SpatialController::class, 'destroy'])->name('spatial.destroy');
    Route::get('spatial/export-pdf', [SpatialController::class, 'exportPDF'])->name('spatial.exportPDF');


    Route::get('all-maps', [MapController::class, 'showAllMap'])->name('allmaps');
});


Route::get('landing-page', [LandingPageController::class, 'index'])->name('landingpage');

Route::get('showMapsFront', [LandingPageController::class,'showMaps'])->name('showMapsFront');
