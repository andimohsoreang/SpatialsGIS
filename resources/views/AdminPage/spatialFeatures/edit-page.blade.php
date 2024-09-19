@extends('layouts.app')

@section('maincontent')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Data Spasial Tanah</h3>
                    <p class="text-subtitle text-muted">Edit data spasial dengan mengubah formulir atau memilih lokasi di
                        peta.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Data Spasial Regangan Tanah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <!-- Card kiri untuk peta -->
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

                <!-- Card kanan untuk form -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Form Edit Data</h5>
                        </div>
                        <div class="card-body">
                            <!-- Tambahkan enctype="multipart/form-data" untuk mendukung upload file -->
                            <form action="{{ route('spatial.update', $pengukuran->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Pilihan desa -->
                                <div class="mb-3">
                                    <label for="desa_id" class="form-label">Desa</label>
                                    <select class="form-select" id="desa_id" name="desa_id" required>
                                        <option value="" selected disabled>Pilih Data Desa</option>
                                        @foreach ($desas as $desa)
                                            <option value="{{ $desa->id }}"
                                                {{ $desa->id == $pengukuran->desa_id ? 'selected' : '' }}>
                                                {{ $desa->nama_desa }} | {{ $desa->kode_desa }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('desa_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Input frekuensi natural -->
                                <div class="mb-3">
                                    <label for="frekuensi_natural" class="form-label">Frekuensi Natural (Fo)</label>
                                    <input type="number" step="0.01" class="form-control" id="frekuensi_natural"
                                        name="frekuensi_natural"
                                        value="{{ old('frekuensi_natural', $pengukuran->frekuensi_natural) }}" required>
                                    @error('frekuensi_natural')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Input faktor aplifikasi tanah -->
                                <div class="mb-3">
                                    <label for="faktor_aplifikasi_tanah" class="form-label">Faktor Aplifikasi Tanah
                                        (Ao)</label>
                                    <input type="number" step="0.01" class="form-control" id="faktor_aplifikasi_tanah"
                                        name="faktor_aplifikasi_tanah"
                                        value="{{ old('faktor_aplifikasi_tanah', $pengukuran->faktor_aplifikasi_tanah) }}"
                                        required>
                                    @error('faktor_aplifikasi_tanah')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Input percepatan tanah -->
                                <div class="mb-3">
                                    <label for="percepatan_tanah" class="form-label">Percepatan Tanah (PGAM)</label>
                                    <input type="number" step="0.01" class="form-control" id="percepatan_tanah"
                                        name="percepatan_tanah"
                                        value="{{ old('percepatan_tanah', $pengukuran->percepatan_tanah) }}" required>
                                    @error('percepatan_tanah')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Input latitude -->
                                <div class="mb-3">
                                    <label for="lat" class="form-label">Latitude</label>
                                    <input type="text" class="form-control" id="lat" name="lat"
                                        value="{{ old('lat', $pengukuran->lat) }}" required>
                                    @error('lat')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Input longitude -->
                                <div class="mb-3">
                                    <label for="long" class="form-label">Longitude</label>
                                    <input type="text" class="form-control" id="long" name="long"
                                        value="{{ old('long', $pengukuran->long) }}" required>
                                    @error('long')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Input file gambar -->
                                <div class="mb-3">
                                    <label for="file_gambar" class="form-label">Unggah Gambar</label>
                                    <input type="file" class="form-control" id="file_gambar" name="file_gambar"
                                        accept="image/*">
                                    @error('file_gambar')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tampilkan gambar yang sudah diunggah sebelumnya, jika ada -->
                                @if ($pengukuran->file_gambar)
                                    <div class="mb-3">
                                        <label for="current_gambar" class="form-label">Gambar Saat Ini:</label><br>
                                        <img src="{{ asset('storage/' . $pengukuran->file_gambar) }}"
                                            alt="Gambar saat ini" width="200">
                                    </div>
                                @endif

                                <button type="submit" class="btn btn-primary">Update Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Include Leaflet.js and CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Inisialisasi peta dengan Leaflet -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi peta dengan koordinat yang sudah ada di database
            var map = L.map('map').setView([{{ $pengukuran->lat }}, {{ $pengukuran->long }}], 14);

            // Menambahkan tile layer dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Menambahkan marker pada posisi yang tersimpan di database
            var marker = L.marker([{{ $pengukuran->lat }}, {{ $pengukuran->long }}]).addTo(map)
                .bindPopup("Latitude: {{ $pengukuran->lat }}<br>Longitude: {{ $pengukuran->long }}")
                .openPopup();

            // Event listener untuk mengambil koordinat ketika peta di klik
            map.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;

                // Masukkan nilai latitude dan longitude ke input form
                document.getElementById('lat').value = lat;
                document.getElementById('long').value = lng;

                // Update marker ke posisi baru
                marker.setLatLng([lat, lng])
                    .bindPopup("Latitude: " + lat + "<br>Longitude: " + lng)
                    .openPopup();
            });
        });
    </script>
@endsection
