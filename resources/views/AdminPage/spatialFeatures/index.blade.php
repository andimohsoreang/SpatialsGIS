@extends('layouts.app')
@section('maincontent')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Spasial Tanah</h3>
                    <p class="text-subtitle text-muted">A sortable, searchable, paginated table without dependencies thanks
                        to simple-datatables.</p>
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
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Data Spasial Regangan Tanah</h5>
                    <div class="d-flex">
                        <a href="{{ route('spatial.create') }}" class="btn btn-primary me-2">
                            <i class="fas fa-plus me-1"></i> Tambah Data
                        </a>
                        <!-- Link ke rute export PDF -->
                        <button type="button" class="btn btn-warning" id="exportPdfButton" data-bs-toggle="modal"
                            data-bs-target="#xlarge">
                            <i class="fas fa-file-pdf me-1"></i> Export PDF
                        </button>
                    </div>
                </div>

                <!-- Alert untuk pesan sukses atau error -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3 m-3">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mt-3 m-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Desa</th>
                                <th>Kode Desa</th>
                                <th>Site Class</th>
                                <th>Jenis Tanah</th>
                                <th>Zona</th>
                                <th>Fenomena</th>
                                <th>Gambar</th> <!-- Kolom baru untuk menampilkan gambar -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengukuran as $spatial)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $spatial->desa->nama_desa }}</td>
                                    <td>{{ $spatial->desa->kode_desa }}</td>
                                    <td>{{ $spatial->sni->kategori }}</td>
                                    <td>{{ $spatial->jenistanah->jenistanah }}</td>
                                    <td>{{ $spatial->klasifikasitanah->jenistanah }}</td>
                                    <td>{{ $spatial->regangan->fenomena }}</td>
                                    <td>
                                        @if ($spatial->file_gambar)
                                            <img src="{{ asset('storage/' . $spatial->file_gambar) }}" alt="Gambar Tanah"
                                                width="50">
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('spatial.result', $spatial->id) }}" class="btn icon btn-info">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('spatial.edit', $spatial->id) }}" class="btn icon btn-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button class="btn icon btn-danger delete-button" data-id="{{ $spatial->id }}"
                                            data-nama="{{ $spatial->desa->nama_desa }}">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Pratinjau PDF -->
    <div class="modal fade" id="xlarge" tabindex="-1" role="dialog" aria-labelledby="xlargeLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="xlargelLabel">Pratinjau PDF</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="pdfIframe" src="" width="100%" height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // SweetAlert untuk notifikasi berhasil setelah redirect
            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif

            // Ambil semua tombol delete
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const spatialID = this.getAttribute('data-id');
                    const desaNama = this.getAttribute('data-nama');

                    // SweetAlert untuk konfirmasi
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: `Data untuk Desa ${desaNama} akan dihapus!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Buat form sementara untuk mengirim permintaan hapus
                            const form = document.createElement('form');
                            form.action = `/spatial/${spatialID}`;
                            form.method = 'POST';
                            form.style.display = 'none';

                            // Tambah CSRF token dan method DELETE
                            form.innerHTML = `
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                            `;

                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });

            // Fungsi untuk menangani tombol Export PDF
            const pdfButton = document.getElementById('exportPdfButton');
            const pdfIframe = document.getElementById('pdfIframe');

            pdfButton.addEventListener('click', function() {
                const sniTable = document.querySelector('#table1 tbody');
                if (!sniTable || sniTable.children.length === 0) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Data Kosong',
                        text: 'Data belum tersedia untuk diekspor ke PDF.',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                // Load PDF dari server ke dalam iframe jika ada data
                fetch('{{ route('spatial.exportPDF') }}')
                    .then(response => response.blob())
                    .then(blob => {
                        const url = URL.createObjectURL(blob);
                        pdfIframe.src = url;
                    })
                    .catch(error => console.error('Error loading PDF:', error));
            });
        });
    </script>
@endsection
