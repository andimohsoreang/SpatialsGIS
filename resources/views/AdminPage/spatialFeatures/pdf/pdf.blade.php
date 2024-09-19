<!DOCTYPE html>
<html>

<head>
    <title>Data Spatial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 10px;
            background-color: #f4f4f9;
            color: #333;
            width: 100%;
            /* Menyesuaikan dengan ukuran layar penuh */
            height: auto;
            /* Mengizinkan tinggi otomatis untuk halaman panjang */
            overflow-x: hidden;
            /* Menghindari overflow horizontal pada body */
        }

        h2 {
            color: #4a4a4a;
            font-size: 18px;
        }

        .table-container {
            overflow-x: auto;
            /* Menambahkan kemampuan untuk menggulir secara horizontal */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 12px;
            /* Mengurangi ukuran font pada tabel */
        }

        th,
        td {
            padding: 8px 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4a76a8;
            color: #ffffff;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        td {
            color: #555;
        }

        @media print {
            @page {
                size: A3 landscape;
                /* Ubah ke ukuran A3 untuk lebih banyak ruang horizontal */
                margin: 0.5cm;
            }

            body {
                width: auto;
                height: auto;
            }

            h2,
            table,
            tr {
                page-break-inside: avoid;
            }

            table {
                page-break-after: auto;
            }
        }
    </style>
</head>

<body>
    <h2>Data Spatial Pengukuran</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Desa</th>
                    <th>Kode Desa</th>
                    <th>Kecepatan Gelombang Geser</th>
                    <th>Site Class</th>
                    <th>Jenis Tanah</th>
                    <th>Zona</th>
                    <th>Fenomena</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spatial as $index => $pk)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $pk->desa->nama_desa }}</td>
                        <td>{{ $pk->desa->kode_desa }}</td>
                        <td>{{ $pk->desa->gelombang_geser }}</td>
                        <td>{{ $pk->sni->kategori }}</td>
                        <td>{{ $pk->jenistanah->jenistanah }}</td>
                        <td>{{ $pk->klasifikasitanah->jenistanah }}</td>
                        <td>{{ $pk->regangan->fenomena }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
