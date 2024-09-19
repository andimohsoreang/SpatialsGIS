@extends('layouts.app')

@section('maincontent')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Peta Keseluruhan Pengukuran</h3>
                    <p class="text-subtitle text-muted">Peta yang menampilkan semua titik dari data pengukuran di database.
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Peta Keseluruhan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <!-- Card untuk menampilkan peta keseluruhan -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Peta Keseluruhan</h5>
                        </div>
                        <div class="card-body">
                            <!-- Peta dimasukkan di sini -->
                            <div id="map" style="width: 100%; height: 1000px; border: 1px solid #ccc;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Include Leaflet.js and Leaflet.css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Inisialisasi peta dengan Leaflet -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi peta di Indonesia dengan zoom level 5
            var map = L.map('map').setView([0.5655724790031951, 123.06019074415588], 12); // Koordinat Indonesia tengah,

            // Menambahkan tile layer dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Data pengukuran dari server
            var pengukurans = @json($pengukurans); // Ambil data dari server menggunakan Blade

            console.log(pengukurans); // Tambahkan log untuk melihat data di konsol

            // Buat Layer Groups untuk setiap regangan_id
            var layers = {
                regangan1: L.layerGroup(),
                regangan2: L.layerGroup(),
                regangan3: L.layerGroup(),
                regangan4: L.layerGroup(),
                regangan5: L.layerGroup(),
                regangan6: L.layerGroup()
            };

            // Loop melalui setiap titik pengukuran dan menambahkan marker dan radius ke peta
            pengukurans.forEach(function(pengukuran) {
                var lat = pengukuran.lat;
                var long = pengukuran.long;
                var reganganId = pengukuran.regangan_id; // Ambil regangan_id
                var pengukuranId = pengukuran.id; // Ambil id pengukuran untuk tautan

                if (typeof pengukuranId === 'undefined') {
                    console.error("ID pengukuran tidak ada: ", pengukuran);
                    return; // Jika ID undefined, jangan lanjutkan
                }

                // Tentukan warna dan radius berdasarkan regangan_id
                var color, radius;
                if (reganganId === 1) {
                    color = 'blue';
                    radius = 100;
                    layers.regangan1.addLayer(createMarker(lat, long, color, radius, reganganId,
                        pengukuranId));
                } else if (reganganId === 2) {
                    color = 'green';
                    radius = 200;
                    layers.regangan2.addLayer(createMarker(lat, long, color, radius, reganganId,
                        pengukuranId));
                } else if (reganganId === 3) {
                    color = 'yellow';
                    radius = 300;
                    layers.regangan3.addLayer(createMarker(lat, long, color, radius, reganganId,
                        pengukuranId));
                } else if (reganganId === 4) {
                    color = 'orange';
                    radius = 400;
                    layers.regangan4.addLayer(createMarker(lat, long, color, radius, reganganId,
                        pengukuranId));
                } else if (reganganId === 5) {
                    color = 'red';
                    radius = 500;
                    layers.regangan5.addLayer(createMarker(lat, long, color, radius, reganganId,
                        pengukuranId));
                } else if (reganganId === 6) {
                    color = 'purple';
                    radius = 600;
                    layers.regangan6.addLayer(createMarker(lat, long, color, radius, reganganId,
                        pengukuranId));
                }
            });

            // Fungsi untuk membuat marker dan lingkaran
            function createMarker(lat, long, color, radius, reganganId, pengukuranId) {
                // Generate URL ke halaman detail menggunakan ID pengukuran
                var detailUrl = `{{ url('spatials/result') }}/${pengukuranId}`;

                var marker = L.marker([lat, long])
                    .bindPopup("Lokasi: " + lat + ", " + long + "<br>Radius: " + radius +
                        " meter<br>Regangan ID: " + reganganId + "<br><a href='" + detailUrl +
                        "' target='_blank'>Lihat Detail</a>");

                var circle = L.circle([lat, long], {
                    color: color,
                    fillColor: color,
                    fillOpacity: 0.1,
                    radius: radius
                });

                var group = L.layerGroup([marker, circle]);
                return group;
            }

            // Menambahkan kontrol layer untuk memilih regangan_id yang ingin ditampilkan
            L.control.layers(null, {
                'Regangan 1 (Biru)': layers.regangan1,
                'Regangan 2 (Hijau)': layers.regangan2,
                'Regangan 3 (Kuning)': layers.regangan3,
                'Regangan 4 (Oranye)': layers.regangan4,
                'Regangan 5 (Merah)': layers.regangan5,
                'Regangan 6 (Ungu)': layers.regangan6
            }).addTo(map);

            // Aktifkan semua layer secara default
            layers.regangan1.addTo(map);
            layers.regangan2.addTo(map);
            layers.regangan3.addTo(map);
            layers.regangan4.addTo(map);
            layers.regangan5.addTo(map);
            layers.regangan6.addTo(map);
        });
    </script>
@endsection
