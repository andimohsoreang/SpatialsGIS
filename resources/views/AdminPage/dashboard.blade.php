@extends('layouts.app')

@section('maincontent')
    <div class="page-heading">
        <h3>Apps Statistics</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <!-- Card untuk menyapa pengguna -->
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body px-4 py-4-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="./assets/compiled/jpg/1.jpg" alt="User Avatar">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">Halo, {{ Auth::user()->name }}</h5>
                                <h6 class="text-muted mb-0">Selamat datang di dashboard!</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistik Aplikasi -->
            <div class="col-12 col-lg-9">
                <div class="row">
                    <!-- Data Desa -->
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Data Desa</h6>
                                        <h6 class="font-extrabold mb-0">{{ $desaCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Spasial -->
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Data Spasial</h6>
                                        <h6 class="font-extrabold mb-0">{{ $pengukuranCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
    </div>
@endsection
