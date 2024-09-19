@extends('layouts.app')
@section('maincontent')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Spasial Tanah</h3>
                    <p class="text-subtitle text-muted">Tampilan peta dan formulir untuk menambahkan data spasial.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Spasial Regangan Tanah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <!-- Cardbox kiri untuk peta -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Peta Lokasi</h5>
                        </div>
                        <div class="card-body">
                            <!-- Peta dimasukkan di sini -->
                            <div id="map" style="width: 100%; height: 500px; border: 1px solid #ccc;"></div>
                        </div>
                    </div>
                </div>

                <!-- Cardbox kanan untuk form -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Form Tambah Data</h5>
                        </div>
                        <div class="card-body">
                            <!-- Mengubah form agar bisa mengunggah file gambar -->
                            <form action="{{ route('spatial.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="desa_id" class="form-label">Desa</label>
                                    <select class="form-select" id="desa_id" name="desa_id" required>
                                        <option value="" selected disabled>Pilih Data Desa</option>
                                        @foreach ($desas as $desa)
                                            <option value="{{ $desa->id }}">{{ $desa->nama_desa }} |
                                                {{ $desa->kode_desa }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Input untuk frekuensi natural -->
                                <div class="mb-3">
                                    <label for="frekuensi_natural" class="form-label">Frekuensi Natural (Fo)</label>
                                    <input type="number" step="0.01" class="form-control" id="frekuensi_natural"
                                        name="frekuensi_natural" placeholder="Masukkan frekuensi" required>
                                </div>

                                <!-- Input untuk faktor aplifikasi tanah -->
                                <div class="mb-3">
                                    <label for="faktor_aplifikasi_tanah" class="form-label">Faktor Aplifikasi Tanah
                                        (Ao)</label>
                                    <input type="number" step="0.01" class="form-control" id="faktor_aplifikasi_tanah"
                                        name="faktor_aplifikasi_tanah" placeholder="Masukkan faktor aplifikasi tanah (A0)"
                                        required>
                                </div>

                                <!-- Input untuk percepatan tanah (PGAM) -->
                                <div class="mb-3">
                                    <label for="percepatan_tanah" class="form-label">Percepatan Tanah (PGAM)</label>
                                    <input type="number" step="0.01" class="form-control" id="percepatan_tanah"
                                        name="percepatan_tanah" placeholder="Masukkan percepatan tanah PGAM" required>
                                </div>

                                <!-- Input untuk latitude dan longitude -->
                                <div class="mb-3">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input type="text" class="form-control" id="lat" name="lat"
                                        placeholder="Masukkan latitude" required>
                                </div>
                                <div class="mb-3">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    <input type="text" class="form-control" id="long" name="long"
                                        placeholder="Masukkan longitude" required>
                                </div>

                                <!-- Input untuk unggah file gambar -->
                                <div class="mb-3">
                                    <label for="file_gambar" class="form-label">Unggah Gambar</label>
                                    <input type="file" class="form-control" id="file_gambar" name="file_gambar"
                                        accept="image/*">
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Include Leaflet.js and SweetAlert2 -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Inisialisasi peta dengan Leaflet -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi peta
            var map = L.map('map').setView([0.547927, 123.065048], 14);

            // Menambahkan tile layer dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var marker;

            // Event listener untuk mendapatkan koordinat ketika peta di klik
            map.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;

                document.getElementById('lat').value = lat;
                document.getElementById('long').value = lng;

                if (marker) {
                    map.removeLayer(marker);
                }

                marker = L.marker([lat, lng]).addTo(map)
                    .bindPopup("Latitude: " + lat + "<br>Longitude: " + lng)
                    .openPopup();
            });

            // Tampilkan SweetAlert jika data berhasil ditambahkan
            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect ke halaman result
                        window.location.href = "{{ route('spatial.result', session('pengukuran_id')) }}";
                    }
                });
            @endif
        });
    </script>
@endsection
