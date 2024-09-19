@extends('layouts.app')
@section('maincontent')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Jenis Tanah</h3>
                    <p class="text-subtitle text-muted">A sortable, searchable, paginated table without
                        dependencies thanks to simple-datatables.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Jenis Tanah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Data Jenis Tanah</h5>
                    <div class="d-flex">
                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                            data-bs-target="#defaultSize">
                            <i class="fas fa-plus me-1"></i> Tambah Data
                        </button>
                        <!-- Link ke rute export PDF -->
                        <button type="button" class="btn btn-warning" id="exportPdfButton" data-bs-toggle="modal"
                            data-bs-target="#pdfPreviewModal">
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
                    @if ($jenistanahs->isEmpty())
                        <!-- Tampilkan pesan jika tidak ada data -->
                        <div class="alert alert-info mt-3">
                            <p class="mb-0">Data belum tersedia.</p>
                        </div>
                    @else
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Tanah</th>
                                    <th>Klasifikasi</th>
                                    <th>Klasifikasi Kanal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenistanahs as $jenistanah)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $jenistanah->jenistanah }}</td>
                                        <td>{{ $jenistanah->klasifikasi }}</td>
                                        <td>{{ $jenistanah->klasifikasikanal }}</td>
                                        <td>
                                            <button class="btn icon btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#updateModal{{ $jenistanah->id }}">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <!-- Tombol Hapus dengan SweetAlert -->
                                            <button class="btn icon btn-danger delete-button" data-id="{{ $jenistanah->id }}"
                                                data-nama="{{ $jenistanah->jenistanah }}">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @include('AdminPage.jenistanahFeatures.update-modals', ['jenistanahs' => $jenistanah])
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Pratinjau PDF -->
    <div class="modal fade" id="pdfPreviewModal" tabindex="-1" role="dialog" aria-labelledby="pdfPreviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfPreviewModalLabel">Pratinjau PDF</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="pdfIframe" src="" width="100%" height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="printPdfButton">Cetak</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Default size Modal -->
    @include('AdminPage.jenistanahFeatures.create-modals')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua tombol delete
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const jenistanahID = this.getAttribute('data-id');
                    const jenistanahNama = this.getAttribute('data-nama');

                    // SweetAlert untuk konfirmasi
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: `Data ${jenistanahNama} akan dihapus!`,
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
                            form.action = `/jenistanahs/${jenistanahID}`;
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
            const printButton = document.getElementById('printPdfButton');

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
                fetch('{{ route('jenistanahs.exportPDF') }}')
                    .then(response => response.blob())
                    .then(blob => {
                        const url = URL.createObjectURL(blob);
                        pdfIframe.src = url;
                    })
                    .catch(error => console.error('Error loading PDF:', error));
            });

            printButton.addEventListener('click', function() {
                const iframeWindow = pdfIframe.contentWindow;
                iframeWindow.focus();
                iframeWindow.print();
            });
        });
    </script>
@endsection
