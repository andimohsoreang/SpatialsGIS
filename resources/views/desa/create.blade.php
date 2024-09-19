<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Desa</title>
    <style>
        /* Reset beberapa gaya default */
        body, h2, a, label, input, button {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .error {
            margin-top: 5px;
            color: #dc3545;
            font-size: 14px;
        }

        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #6c757d;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #5a6268;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            input[type="text"], button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Desa</h2>
        <form action="{{ route('desas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_desa">Nama Desa:</label>
                <input type="text" id="nama_desa" name="nama_desa" value="{{ old('nama_desa') }}" required>
                @error('nama_desa')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="kode_desa">Kode Desa:</label>
                <input type="text" id="kode_desa" name="kode_desa" value="{{ old('kode_desa') }}" required>
                @error('kode_desa')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gelombang_geser">Kecepatan Gelombang Geser:</label>
                <input type="text" id="gelombang_geser" name="gelombang_geser" value="{{ old('gelombang_geser') }}" required>
                @error('gelombang_geser')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Simpan</button>
        </form>
        <a href="{{ route('desas.index') }}">Kembali</a>
    </div>
</body>
</html>
