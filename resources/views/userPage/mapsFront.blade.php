<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistem Informasi Likuefaksi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('landingPage/img/favicon.ico') }}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('landingPage/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landingPage/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landingPage/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('landingPage/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landingPage/font-flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('landingPage/css/dripicons.css') }}">
    <link rel="stylesheet" href="{{ asset('landingPage/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('landingPage/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('landingPage/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('landingPage/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landingPage/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM6T1W1C0O1iQFqDq8OcGm2xQrA0f+jC4h6PiX" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        /* Main Map Styling */
        #map {
            height: 700px;
            width: 75%;
            margin: 0 auto;
            position: relative;
        }

        /* Buttons on Map */
        #download-map,
        #reset-zoom {
            position: absolute;
            z-index: 1000;
            background-color: #17a2b8;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        #download-map {
            top: 30px;
            left: 50%;
        }

        #reset-zoom {
            top: 30px;
            left: 54%;
        }

        #download-map i,
        #reset-zoom i {
            font-size: 18px;
        }

        #download-map:hover,
        #reset-zoom:hover {
            background-color: #138496;
        }

        /* Modal Styling */
        .modal-dialog {
            max-width: 1000px;
        }

        .modal-header {
            background-color: #17a2b8;
            color: white;
        }

        .modal-body {
            padding: 20px;
        }

        .badge.bg-info {
            background-color: #17a2b8;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
        }

        /* Legend Styling */
        .legend-card {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background-color: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            font-size: 12px;
            line-height: 1.5;
        }

        .legend-title {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .legend-color {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 5px;
            border: 1px solid black;
        }

        /* Colors for Legend */
        .legend-color.blue {
            background-color: blue;
        }

        .legend-color.green {
            background-color: green;
        }

        .legend-color.yellow {
            background-color: yellow;
        }

        .legend-color.orange {
            background-color: orange;
        }

        .legend-color.red {
            background-color: red;
        }

        .legend-color.purple {
            background-color: purple;
        }

        .legend-color.kota-selatan {
            background-color: #FF5733;
        }

        .legend-color.kota-utara {
            background-color: #33FF57;
        }

        .legend-color.kota-barat {
            background-color: #3357FF;
        }

        .legend-color.kota-timur {
            background-color: #FFC300;
        }

        .legend-color.kota-tengah {
            background-color: #DAF7A6;
        }

        .legend-color.dungingi {
            background-color: #C70039;
        }

        .legend-color.hulonthalangi {
            background-color: #900C3F;
        }


        .legend-color.sipatana {
            background-color: #9af546;
        }
        .legend-color.dumbo-raya {
            background-color: #ebb8ff;
        }

        /* Responsive Media Queries */
        @media only screen and (max-width: 768px) {
            #map {
                width: 100%;
                height: 500px;
            }

            #download-map,
            #reset-zoom {
                left: 45%;
                top: 10px;
            }

            .legend-card {
                width: 100%;
                left: 0;
                bottom: 0;
                padding: 5px;
                text-align: center;
                font-size: 10px;
            }

            .legend-color {
                width: 15px;
                height: 15px;
            }
        }

        @media only screen and (max-width: 576px) {
            #map {
                height: 400px;
            }

            #download-map,
            #reset-zoom {
                padding: 5px 10px;
                font-size: 12px;
                left: 40%;
            }

            .legend-card {
                bottom: 0;
                padding: 5px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header-area header-three">
        <div id="header-sticky" class="menu-area">
            <div class="container">
                <div class="second-menu">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('landingPage/img/logo/logo.png') }}"
                                        alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu text-right text-xl-right">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="{{ route('showMapsFront') }}">Peta</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-1 text-center d-none d-lg-block mt-15 mb-15">
                            <a href="contact.html" class="menu-tigger"><i class="fal fa-search"></i></a>
                        </div>
                        <div class="col-xl-2 col-lg-2 text-right d-none d-lg-block mt-15 mb-15">
                            <a href="{{ route('login') }}"
                                class="btn ss-btn">{{ Auth::check() ? 'Dashboard' : 'Login' }}</a>
                        </div>
                        <div class="col-12">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Main Area -->
    <main>
        <!-- Map Section -->
        <section id="spatial-result" class="spatial-result-area pt-120 pb-130">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card mb-4" style="border: none; box-shadow: 0px 0px 15px rgba(0,0,0,0.1);">
                            <div class="card-body">
                                <div id="map"></div>
                                <div id="button-container">
                                    <button id="download-map">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button id="reset-zoom">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Legend Section -->
        <div class="legend-card">
            <div class="legend-title">Legend:</div>

            <!-- Kecamatan Legend -->
            <div class="legend-title">Kecamatan:</div>
            <div class="legend-item">
                <div class="legend-color kota-selatan"></div>Kota Selatan
            </div>
            <div class="legend-item">
                <div class="legend-color kota-utara"></div>Kota Utara
            </div>
            <div class="legend-item">
                <div class="legend-color kota-barat"></div>Kota Barat
            </div>
            <div class="legend-item">
                <div class="legend-color kota-timur"></div>Kota Timur
            </div>
            <div class="legend-item">
                <div class="legend-color kota-tengah"></div>Kota Tengah
            </div>
            <div class="legend-item">
                <div class="legend-color dungingi"></div>Dungingi
            </div>
            <div class="legend-item">
                <div class="legend-color hulonthalangi"></div>Hulonthalangi
            </div>
             <div class="legend-item">
                <div class="legend-color sipatana"></div>Sipatana
            </div>
             <div class="legend-item">
                <div class="legend-color dumbo-raya"></div> Dumbo Raya
            </div>

            <!-- Regangan Legend -->
            <div class="legend-title">Regangan:</div>
            <div class="legend-item">
                <div class="legend-color blue"></div>Gelombang
            </div>
            <div class="legend-item">
                <div class="legend-color green"></div>Getaran
            </div>
            <div class="legend-item">
                <div class="legend-color yellow"></div>Retak
            </div>
            <div class="legend-item">
                <div class="legend-color orange"></div>Penurunan
            </div>
            <div class="legend-item">
                <div class="legend-color red"></div>Longsor
            </div>
            <div class="legend-item">
                <div class="legend-color purple"></div>Likuefaksi
            </div>
        </div>
    </main>
    <!-- Main Area End -->

    <!-- Modal for Detail Pengukuran -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Hasil Pengukuran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="detail-container">
                    <!-- Detail Content Here -->
                </div>
                <div class="modal-footer">
                    <!-- Tambahkan tombol untuk melihat gambar -->
                    <button type="button" class="btn btn-primary" id="viewImageBtn">Lihat Gambar Lokasi</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Image Preview -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Gambar Lokasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <!-- Gambar lokasi akan ditampilkan di sini -->
                    <img id="locationImage" src="" class="img-fluid" alt="Gambar Lokasi"
                        style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>

    <!-- Include Leaflet.js and Leaflet.css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
    <script src="https://rawgit.com/rowanwins/leaflet-easyPrint/gh-pages/dist/bundle.js"></script>

    <!-- Inisialisasi peta dengan Leaflet -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // Batas wilayah Provinsi Gorontalo
            var bounds = L.latLngBounds([
                [0.475, 122.945], // Koordinat Selatan-Barat Kota Gorontalo
                [0.675, 123.175] // Koordinat Utara-Timur Kota Gorontalo
            ]);

            // Inisialisasi pengaturan awal peta
            var initialZoom = 13;
            var initialCenter = [0.575, 123.05]; // Koordinat awal pusat peta

            // Inisialisasi peta dengan view yang dikunci pada Kota Gorontalo saja
            var map = L.map('map', {
                maxBounds: bounds, // Kunci batas wilayah Kota Gorontalo
                maxBoundsViscosity: 1.0, // Memastikan peta tidak bisa bergeser keluar dari bounds
                minZoom: 12, // Membatasi zoom-out agar tidak keluar dari Kota Gorontalo
                maxZoom: 40, // Membatasi zoom-in maksimum
                zoomSnap: 0.5, // Kelancaran zoom
                zoomControl: true // Kontrol zoom aktif untuk zoom-in
            }).setView([0.575, 123.05], 13); // Pusatkan view pada Kota Gorontalo

            // Menambahkan tile layer dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Warna manual untuk setiap kecamatan
            var kecamatanColors = {
                "Kota Selatan": "#FF5733", // Warna merah terang
                "Kota Utara": "#33FF57", // Warna hijau terang
                "Kota Barat": "#3357FF", // Warna biru terang
                "Kota Timur": "#FFC300", // Warna kuning terang
                "Kota Tengah": "#DAF7A6", // Warna hijau muda
                "Dungingi": "#C70039", // Warna merah gelap
                "Hulonthalangi": "#900C3F", // Warna merah anggur
                "Sipatana" : '#9af546',
                "Dumbo Raya" : '#ebb8ff'

            };

            // Membuat layer group untuk kecamatan
            var kecamatanLayers = {}; // Objek untuk menyimpan LayerGroup tiap kecamatan

            // Memuat GeoJSON file untuk kecamatan
            var geojsonLayer = new L.GeoJSON.AJAX("/geojson/Kota_Gorontalo.geojson", {
                style: function(feature) {
                    var kecamatanName = feature.properties
                        .WADMKC; // Ambil nama kecamatan dari file GeoJSON

                    // Jika kecamatan memiliki warna manual, gunakan
                    var fillColor = kecamatanColors[kecamatanName] ||
                        "#808080"; // Default warna abu-abu jika tidak ditentukan

                    return {
                        color: fillColor, // Warna garis sesuai kecamatan
                        weight: 1, // Ketebalan garis
                        fillColor: fillColor, // Warna isi untuk kecamatan
                        fillOpacity: 0.5, // Transparansi warna isi
                    };
                },
                onEachFeature: function(feature, layer) {
                    // Ambil nama kecamatan
                    var kecamatanName = feature.properties.WADMKC || 'Kecamatan tidak diketahui';

                    // Buat layer group untuk kecamatan jika belum ada
                    if (!kecamatanLayers[kecamatanName]) {
                        kecamatanLayers[kecamatanName] = L.layerGroup();
                    }

                    // Tambahkan layer ke grup kecamatan
                    kecamatanLayers[kecamatanName].addLayer(layer);

                    // Tambahkan pop-up dengan nama kecamatan dan desa
                    var desaName = feature.properties.WADMKD || 'Desa tidak diketahui'; // Nama desa
                    layer.bindPopup(
                        `<strong>Kecamatan: ${kecamatanName}</strong><br>Desa: ${desaName}`);
                }
            }).addTo(map);

            // Tambahkan event setelah file GeoJSON selesai dimuat
            geojsonLayer.on('data:loaded', function() {
                var overlayMaps = {};

                // Tambahkan setiap kecamatan ke dalam overlayMaps
                Object.keys(kecamatanLayers).forEach(function(kecamatanName) {
                    overlayMaps[kecamatanName] = kecamatanLayers[kecamatanName];
                });

                // Tambahkan kontrol layer untuk mengaktifkan/mematikan layer per kecamatan
                L.control.layers(null, overlayMaps).addTo(map);

                // Aktifkan semua kecamatan secara default
                Object.values(kecamatanLayers).forEach(function(layer) {
                    layer.addTo(map);
                });
            });

            // Fungsi untuk mengembalikan warna berdasarkan regangan_id
            function getColorByReganganId(reganganId) {
                switch (reganganId) {
                    case 1:
                        return 'blue';
                    case 2:
                        return 'green';
                    case 3:
                        return 'yellow';
                    case 4:
                        return 'orange';
                    case 5:
                        return 'red';
                    case 6:
                        return 'purple';
                    default:
                        return 'black';
                }
            }

            // Data pengukuran dari server
            var pengukurans = @json($pengukurans); // Ambil data dari server menggunakan Blade

            var markers = {}; // Untuk menyimpan layer group markers per regangan

            // Layer group untuk setiap klasifikasi regangan
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
                var reganganId = pengukuran.regangan_id;
                var pengukuranId = pengukuran.id;

                // Tentukan warna dan radius berdasarkan regangan_id
                var color = getColorByReganganId(reganganId);
                var radius = 100 * reganganId;

                // Buat marker dan lingkaran di peta
                var marker = L.marker([lat, long]);
                var circle = L.circle([lat, long], {
                    color: color,
                    fillColor: color,
                    fillOpacity: 0.1,
                    radius: radius
                });

                // Tambahkan ke layer group sesuai klasifikasi regangan
                layers['regangan' + reganganId].addLayer(marker);
                layers['regangan' + reganganId].addLayer(circle);

                // Tambahkan pop-up pada marker dengan tombol "Lihat Detail"
                marker.bindPopup(`
                Lokasi: ${lat}, ${long}<br>
                Regangan ID: ${reganganId}<br>
                <a href="#" class="lihat-detail" data-id="${pengukuranId}">Lihat Detail</a>
            `);

                // Menyimpan marker berdasarkan id pengukuran
                markers[pengukuranId] = marker;
            });

            // Event listener untuk tombol "Lihat Detail"
            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('lihat-detail')) {
                    var pengukuranId = event.target.getAttribute('data-id');
                    var pengukuran = pengukurans.find(p => p.id == pengukuranId);

                    if (pengukuran) {
                        showDetailsInModal(pengukuran);
                    }

                    event.preventDefault();
                }
            });

            // Fungsi untuk menampilkan detail di modal
            function showDetailsInModal(pengukuran) {
                var detailContainer = document.getElementById('detail-container');
                detailContainer.innerHTML = `
                <div class="row mb-2">
                    <div class="col-6"><strong>Nama Desa:</strong></div>
                    <div class="col-6">${pengukuran.desa.nama_desa}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Kode Desa:</strong></div>
                    <div class="col-6">${pengukuran.desa.kode_desa}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Latitude:</strong></div>
                    <div class="col-6">${pengukuran.lat}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Longitude:</strong></div>
                    <div class="col-6">${pengukuran.long}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Kecepatan Gelombang Geser (Vs40m/s):</strong></div>
                    <div class="col-6">${pengukuran.desa.gelombang_geser} m/s</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Jenis Tanah:</strong></div>
                    <div class="col-6">${pengukuran.jenistanah ? pengukuran.jenistanah.jenistanah : 'Belum Ada Data'}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Klasifikasi Tanah:</strong></div>
                    <div class="col-6">${pengukuran.jenistanah ? pengukuran.jenistanah.klasifikasi : 'Belum Ada Data'}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Fenomena:</strong></div>
                    <div class="col-6"><span class="badge bg-info">${pengukuran.regangan ? pengukuran.regangan.fenomena : 'Tidak ada data'}</span></div>
                </div>
                <div class="row mb-2">
                    <div class="col-6"><strong>Properti Dinamis:</strong></div>
                    <div class="col-6">${pengukuran.regangan ? pengukuran.regangan.propertidinamis : 'Tidak ada data'}</div>
                </div>
            `;

                // Tampilkan modal untuk detail pengukuran
                $('#detailModal').modal('show');

                // Event listener untuk melihat gambar lokasi
                document.getElementById('viewImageBtn').addEventListener('click', function() {
                    var imageUrl = `/storage/${pengukuran.file_gambar}`; // Sesuaikan path gambar
                    document.getElementById('locationImage').src = imageUrl;
                    $('#imageModal').modal('show'); // Tampilkan modal gambar
                });
            }

            // Tambahkan kontrol layer untuk mengaktifkan/mematikan layer per regangan
            var overlayMaps = {
                'Gelombang': layers.regangan1,
                'Getaran': layers.regangan2,
                'Retak': layers.regangan3,
                'Penurunan': layers.regangan4,
                'Longsor': layers.regangan5,
                'Likuefaksi': layers.regangan6
            };

            L.control.layers(null, overlayMaps).addTo(map);

            // Aktifkan semua layer regangan secara default
            layers.regangan1.addTo(map);
            layers.regangan2.addTo(map);
            layers.regangan3.addTo(map);
            layers.regangan4.addTo(map);
            layers.regangan5.addTo(map);
            layers.regangan6.addTo(map);

            // Event listener untuk tombol reset zoom
            document.getElementById('reset-zoom').addEventListener('click', function() {
                map.setView(initialCenter, initialZoom); // Mengembalikan ke posisi dan zoom awal
            });

            var easyPrint = L.easyPrint({
                sizeModes: ['Current', 'A4Landscape', 'A4Portrait'],
                filename: 'mapImage',
                exportOnly: true,
                hideControlContainer: true
            }).addTo(map);

            document.getElementById('download-map').addEventListener('click', function() {
                easyPrint.printMap('CurrentSize', 'mapImage');
            });
        });
    </script>


    <!-- JS here -->
    <script src="{{ asset('landingPage/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('landingPage/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('landingPage/js/popper.min.js') }}"></script>
    <script src="{{ asset('landingPage/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landingPage/js/slick.min.js') }}"></script>
    <script src="{{ asset('landingPage/js/ajax-form.js') }}"></script>
    <script src="{{ asset('landingPage/js/paroller.js') }}"></script>
    <script src="{{ asset('landingPage/js/wow.min.js') }}"></script>
    <script src="{{ asset('landingPage/js/js_isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landingPage/js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('landingPage/js/parallax.min.js') }}"></script>
    <script src="{{ asset('landingPage/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('landingPage/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('landingPage/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('landingPage/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('landingPage/js/parallax-scroll.js') }}"></script>
    <script src="{{ asset('landingPage/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landingPage/js/element-in-view.js') }}"></script>
    <script src="{{ asset('landingPage/js/main.js') }}"></script>
</body>

</html>
