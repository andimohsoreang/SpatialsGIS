<!DOCTYPE html>
<html>

<head>
    <title>Data Desa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
            color: #333;
        }

        h2 {
            color: #4a4a4a;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
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
    </style>
</head>

<body>
    <h2>Data Klasifikasi Tanah</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Tanah</th>
                <th>Kategori</th>
                <th>Klasifikasi Kanal</th>
                <th>Karakteristik</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($klasifikasitanah as $index => $kt)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kt->jenistanah }}</td>
                    <td>{{ $kt->kategori }}</td>
                    <td>{{ $kt->klasifikasikanal }}</td>
                    <td>{{ $kt->karakteristik }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
