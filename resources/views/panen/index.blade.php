<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Hasil Panen</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">
    <h2>Daftar Hasil Panen Pertanian</h2>
    <hr>

    {{-- Form Input --}}
    <form action="/data-panen" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nama Komoditas</td>
                <td>
                    <input type="text" name="nama_komoditas">
                    @error('nama_komoditas')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Jumlah (Kg)</td>
                <td>
                    <input type="number" name="jumlah_kg">
                    @error('jumlah_kg')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Tanggal Panen</td>
                <td><input type="date" name="tanggal_panen"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Simpan</button></td>
            </tr>
        </table>
    </form>

    <hr>

    {{-- Tabel Data --}}
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead style="background-color: #f2f2f2;">
            <tr>
                <th>No</th>
                <th>Nama Komoditas</th>
                <th>Jumlah (Kg)</th>
                <th>Tanggal Panen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataPanen as $index => $item)
            <tr>
                <td align="center">{{ $index + 1 }}</td>
                <td>{{ $item->nama_komoditas }}</td>
                <td align="center">{{ $item->jumlah_kg }}</td>
                <td align="center">{{ $item->tanggal_panen }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>