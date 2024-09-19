@extends('layouts.app')

@section('maincontent')
    <div class="container-fluid">
        <div class="row">
            <!-- Bagian kiri untuk peta -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Peta Lokasi</h3>
                    </div>
                    <div class="card-body">
                        <!-- Map container -->
                        <div id="map" style="height: 800px;"></div>
                    </div>
                </div>
            </div>

            <!-- Bagian kanan untuk detail hasil pengukuran -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Detail Hasil Pengukuran</h3>
                    </div>
                    <div class="card-body">
                        <!-- Display data details with accordion flush -->
                        <div class="row">
                            <div class="col-5"><strong>Nama Desa:</strong></div>
                            <div class="col-7">{{ $desa->nama_desa }}</div>
                        </div>
                        <div class="row">
                            <div class="col-5"><strong>Kode Desa:</strong></div>
                            <div class="col-7">{{ $desa->kode_desa }}</div>
                        </div>
                        <div class="row">
                            <div class="col-5"><strong>Latitude:</strong></div>
                            <div class="col-7">{{ $pengukuran->lat }}</div>
                        </div>
                        <div class="row">
                            <div class="col-5"><strong>Longitude:</strong></div>
                            <div class="col-7">{{ $pengukuran->long }}</div>
                        </div>
                        <div class="row">
                            <div class="col-5"><strong>Kecepatan Gelombang Geser (Vs40m/s):</strong></div>
                            <div class="col-7">{{ $desa->gelombang_geser }}</div>
                        </div>

                        <div class="accordion accordion-flush mt-3" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        Nilai SNI
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-2"><strong>Nilai SNI:</strong></div>
                                            <div class="col-10">{{ $sni->snis }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2"><strong>Site Class:</strong></div>
                                            <div class="col-10">{{ $sni->kategori }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        Jenis Tanah
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-2"><strong>Jenis Tanah:</strong></div>
                                            <div class="col-10">
                                                @if ($jenistanah)
                                                    {{ $jenistanah->jenistanah }} ({{ $jenistanah->klasifikasi }})
                                                @else
                                                    Belum Ada Data
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2"><strong>Klasifikasi:</strong></div>
                                            <div class="col-10">{{ $jenistanah->klasifikasi }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2"><strong>Klasifikasi Kanal:</strong></div>
                                            <div class="col-10">{{ $jenistanah->klasifikasikanal }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2"><strong>Zona:</strong></div>
                                            <div class="col-10">{{ $klasifikasitanah->jenistanah }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        Faktor Aplifikasi Tanah
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-4"><strong>Faktor Aplifikasi Tanah (Ao):</strong></div>
                                            <div class="col-8">{{ $pengukuran->faktor_aplifikasi_tanah }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4"><strong>Indeks Kerentanan Seismik (Kg):</strong></div>
                                            <div class="col-8">{{ $pengukuran->indeks_kerentanan_sesimik }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4"><strong>Percepatan Tanah (PGam):</strong></div>
                                            <div class="col-8">{{ $pengukuran->percepatan_tanah }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseFour" aria-expanded="false"
                                        aria-controls="flush-collapseFour">
                                        Regangan Geser Tanah
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-4"><strong>Regangan Geser Tanah (GSS):</strong></div>
                                            <div class="col-8">{{ $pengukuran->regangan_geser_tanah }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4"><strong>Ukuran Regangan:</strong></div>
                                            <div class="col-8">{{ $pengukuran->ukuran_regangan }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4"><strong>Fenomena:</strong></div>
                                            <div class="col-8">
                                                <span class="badge bg-info">{{ $regangan->fenomena }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4"><strong>Properti Dinamis:</strong></div>
                                            <div class="col-8">{{ $regangan->propertidinamis }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion accordion-flush mt-3" id="accordionFlushExample">
                                <!-- Accordion lainnya -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFive">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFive"
                                            aria-expanded="false" aria-controls="flush-collapseFive">
                                            Gambar
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFive" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-4"><strong>Gambar Lokasi :</strong></div>
                                                <div class="col-8">
                                                    @if ($pengukuran->file_gambar)
                                                        <!-- Gambar dapat diklik untuk membuka modal -->
                                                        <img src="{{ asset('storage/' . $pengukuran->file_gambar) }}"
                                                            alt="Gambar Hasil Pengukuran" class="img-fluid"
                                                            style="max-width: 100%; height: auto; cursor: pointer;"
                                                            id="imagePreview">
                                                    @else
                                                        <p>Tidak ada gambar yang diunggah.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End of accordion -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal untuk Preview Gambar -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Preview Gambar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <!-- Gambar yang di-preview akan ditampilkan di sini -->
                        <img src="{{ asset('storage/' . $pengukuran->file_gambar) }}" class="img-fluid"
                            alt="Preview Gambar" id="modalImagePreview">
                    </div>
                </div>
            </div>
        </div>

        <!-- Include Leaflet.js and Leaflet.css -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var lat = {{ $pengukuran->lat }};
                var long = {{ $pengukuran->long }};
                var reganganId = {{ $pengukuran->regangan_id }}; // Ambil regangan_id dari pengukuran

                // Tentukan warna dan radius berdasarkan regangan_id
                var color, radius;
                if (reganganId === 1) {
                    color = 'blue';
                    radius = 100;
                } else if (reganganId === 2) {
                    color = 'green';
                    radius = 200;
                } else if (reganganId === 3) {
                    color = 'yellow';
                    radius = 300;
                } else if (reganganId === 4) {
                    color = 'orange';
                    radius = 400;
                } else if (reganganId === 5) {
                    color = 'red';
                    radius = 500;
                } else if (reganganId === 6) {
                    color = 'purple';
                    radius = 600;
                }

                // Inisialisasi Peta di Gorontalo
                var map = L.map('map').setView([0.547927, 123.065048], 13);

                // Menambahkan tile layer dari Leaflet
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Menambahkan marker di titik lat long dari database
                var marker = L.marker([lat, long]).addTo(map)
                    .bindPopup('<b>{{ $desa->nama_desa }}</b><br>{{ $desa->kode_desa }}').openPopup();

                // Menambahkan circle dengan radius sesuai regangan_id dari titik marker
                var circle = L.circle([lat, long], {
                    color: color,
                    fillColor: color,
                    fillOpacity: 0.3,
                    radius: radius // radius dalam meter berdasarkan regangan_id
                }).addTo(map);

                // Ketika gambar diklik, modal muncul
                document.getElementById('imagePreview').addEventListener('click', function() {
                    var imageSrc = this.src;
                    document.getElementById('modalImagePreview').src = imageSrc;
                    var imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
                    imageModal.show();
                });
            });
        </script>
    @endsection
