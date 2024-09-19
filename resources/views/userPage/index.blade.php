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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <style>
        #detail-container {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        #detail-container .row {
            margin-bottom: 10px;
        }

        .badge.bg-info {
            background-color: #17a2b8;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap;
            /* Mencegah teks terlalu panjang */
            overflow: hidden;
            text-overflow: ellipsis;
            /* Menambahkan titik-titik jika teks terlalu panjang */
        }

        /* Tambahkan padding dan word-wrap untuk tabel */
        #detail-container .col-6 {
            word-wrap: break-word;
            white-space: normal;
            /* Memungkinkan pemotongan teks yang panjang */
        }

        /* Tambahkan lebar lebih besar untuk detail */
        .col-lg-4 {
            max-width: 30%;
        }
    </style>

</head>

<body>
    <!-- header -->
    <header class="header-area header-three">
        <div class="header-top second-header d-none d-md-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 d-none d-lg-block">
                        <div class="header-social text-right">
                            <span>
                                <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
                                <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                        <li class="has-sub">
                                            <a href="index.html">Home</a>
                                            <ul>
                                                <li><a href="index.html">Home Page 01</a></li>
                                                <li><a href="index-2.html">Home Page 02</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('showMapsFront') }}">Peta</a></li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-1 text-center d-none d-lg-block mt-15 mb-15">
                            <a href="contact.html" class="menu-tigger"><i class="fal fa-search"></i></a>
                        </div>
                        <div class="col-xl-2 col-lg-2 text-right d-none d-lg-block mt-15 mb-15">
                            <a href="contact.html" class="btn ss-btn">Get A Quote</a>
                        </div>
                        <div class="col-12">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->



    <!-- main-area -->
    <main>
        <!-- slider-area -->
        <section id="home" class="slider-area slider-four fix p-relative">
            <div class="slider-active">
                <div class="single-slider slider-bg d-flex align-items-center"
                    style="background: url({{ asset('landingPage/img/slider/slider_img_bg.png') }}) no-repeat; background-position: right top;">
                    <div class="container">
                        <div class="row justify-content-center pt-50">
                            <div class="col-lg-7 col-md-7">
                                <div class="slider-content s-slider-content mt-150">
                                    <h5 data-animation="fadeInDown" data-delay=".4s">Selamat Datang </h5>
                                    <h2 data-animation="fadeInUp" data-delay=".4s">Data Spasial Gorontalo</h2>
                                    <p data-animation="fadeInUp" data-delay=".6s">Curabitur nec laoreet nulla. Mauris
                                        aliquam malesuada nibh, sodales ullamp sapien imperdiet vel.</p>
                                    <div class="slider-btn mt-30">
                                        <a href="services.html" class="btn ss-btn mr-15">Read More</a>
                                        <a href="services.html" class="btn ss-btn active">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5">
                                <div class="slider-img" data-animation="fadeInUp" data-delay=".4s">
                                    <img src="{{ asset('landingPage/img/slider/slider_img05.png') }}"
                                        alt="slider_img05">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- slider-area-end -->
        <!-- about-area -->
        {{-- <section id="spatial-result" class="spatial-result-area pt-120 pb-130">
            <div class="container-fluid">
                <div class="row">
                    <!-- Bagian kiri untuk peta -->
                    <div class="col-lg-7 col-md-7"> <!-- Ubah col-lg-8 ke col-lg-9 untuk memperbesar kolom peta -->
                        <div class="card mb-4" style="border: none; box-shadow: 0px 0px 15px rgba(0,0,0,0.1);">
                            <div class="card-body">
                                <div id="map" style="height: 700px; width: 100%;"></div>
                                <!-- Tinggi peta lebih besar -->
                            </div>
                        </div>
                    </div>

                    <!-- Bagian kanan untuk detail pengukuran -->
                    <div class="col-lg-5 col-md-5">
                        <div class="card mb-4"
                            style="border: 1px solid #ddd; box-shadow: 0px 0px 15px rgba(0,0,0,0.1);">
                            <div class="card-header">
                                <h3>Detail Hasil Pengukuran</h3>
                            </div>
                            <div class="card-body" style="padding: 15px;">
                                <!-- Tampilkan detail pengukuran setelah klik marker -->
                                <div id="detail-container"
                                    style="border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
                                    <p>Klik marker pada peta untuk melihat detail hasil pengukuran.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </main>
    <!-- main-area-end -->

    <!-- footer -->
    <footer class="footer-bg footer-p">
        <div class="footer-top-heiding pt-70 pb-120">
            <div class="container">

            </div>
        </div>
        <div class="footer-top pb-40">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title mb-45">
                                <img src="{{ asset('landingPage/img/logo/f_logo.png') }}" alt="img">
                            </div>
                            <div class="footer-link">Aenean pulvinar laoreet tellus ut tincidunt.</div>
                            <div class="f-contact mt-30">
                                <ul>
                                    <li>
                                        <i class="icon fal fa-map-marker-check"></i>
                                        <span>1247/Plot No. 39, 15th Phase, Colony, Kanpur</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title">
                                <h2>Our Links</h2>
                            </div>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="#">Term</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="#">Support</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title">
                                <h2>Get In Touch</h2>
                            </div>
                            <div class="f-contact">
                                <ul>
                                    <li>
                                        <i class="icon fal fa-phone"></i>
                                        <span>1800-121-3637<br>+91-7052-101-786</span>
                                    </li>
                                    <li>
                                        <i class="icon fal fa-envelope"></i>
                                        <span><a href="mailto:info@example.com">info@example.com</a></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-6">
                        <div class="footer-widget mb-30">
                            <div class="f-widget-title">
                                <h2>Our Gallery</h2>
                            </div>
                            <div class="f-insta">
                                <ul>
                                    <li><a href="{{ asset('landingPage/img/instagram/f-galler-01.png') }}"
                                            class="popup-image"><img
                                                src="{{ asset('landingPage/img/instagram/f-galler-01.png') }}"
                                                alt="img"></a></li>
                                    <li><a href="{{ asset('landingPage/img/instagram/f-galler-02.png') }}"
                                            class="popup-image"><img
                                                src="{{ asset('landingPage/img/instagram/f-galler-02.png') }}"
                                                alt="img"></a></li>
                                    <li><a href="{{ asset('landingPage/img/instagram/f-galler-03.png') }}"
                                            class="popup-image"><img
                                                src="{{ asset('landingPage/img/instagram/f-galler-03.png') }}"
                                                alt="img"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        Copyright © 2021 Capatel All rights reserved.
                    </div>
                    <div class="col-lg-6 text-right text-xl-right">
                        <ul>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Term &amp; Conditions</a></li>
                            <li><a href="#">Legal</a></li>
                            <li>
                                <span class="footer-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->

    <!-- Include Leaflet.js and Leaflet.css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Inisialisasi peta dengan Leaflet -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi peta di Indonesia dengan zoom level 12
            var map = L.map('map').setView([0.5294471, 123.0960041], 12); // Koordinat Indonesia tengah

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
                        pengukuranId, pengukuran));
                } else if (reganganId === 2) {
                    color = 'green';
                    radius = 200;
                    layers.regangan2.addLayer(createMarker(lat, long, color, radius, reganganId,
                        pengukuranId, pengukuran));
                } else if (reganganId === 3) {
                    color = 'yellow';
                    radius = 300;
                    layers.regangan3.addLayer(createMarker(lat, long, color, radius, reganganId,
                        pengukuranId, pengukuran));
                } else if (reganganId === 4) {
                    color = 'orange';
                    radius = 400;
                    layers.regangan4.addLayer(createMarker(lat, long, color, radius, reganganId,
                        pengukuranId, pengukuran));
                } else if (reganganId === 5) {
                    color = 'red';
                    radius = 500;
                    layers.regangan5.addLayer(createMarker(lat, long, color, radius, reganganId,
                        pengukuranId, pengukuran));
                } else if (reganganId === 6) {
                    color = 'purple';
                    radius = 600;
                    layers.regangan6.addLayer(createMarker(lat, long, color, radius, reganganId,
                        pengukuranId, pengukuran));
                }
            });

            // Fungsi untuk membuat marker dan lingkaran
            function createMarker(lat, long, color, radius, reganganId, pengukuranId, pengukuran) {
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

                marker.on('click', function() {
                    // Tampilkan detail ketika marker diklik
                    showDetails(pengukuran);
                });

                var group = L.layerGroup([marker, circle]);
                return group;
            }

            // Fungsi untuk menampilkan detail pengukuran di bagian detail-container
            function showDetails(pengukuran) {
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
                <div class="col-6">
                    <span class="badge bg-info">${pengukuran.regangan ? pengukuran.regangan.fenomena : 'Tidak ada data'}</span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6"><strong>Properti Dinamis:</strong></div>
                <div class="col-6">${pengukuran.regangan ? pengukuran.regangan.propertidinamis : 'Tidak ada data'}</div>
            </div>
        `;
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
