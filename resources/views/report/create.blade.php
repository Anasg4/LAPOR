<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPOR - Buat Laporan</title>
</head>
<body>
    {{ $userData['name'] }}
    <form action="/report" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="number">Plat Nomor</label>
            <input type="text" name="number" id="number">
        </div>
        <div>
            <label for="violation">Pelanggaran</label>
            <input type="text" name="violation" id="violation">
        </div>
        <div>
            <label for="description">Deskripsi</label>
            <input type="text" name="description" id="description">
        </div>
        <div>
            <label for="location">Lokasi</label>
            <input type="text" name="location" id="location">
        </div>
        <div>
            <label for="image">Gambar</label>
            <input type="file" name="image" id="image">
        </div>
        <div>
            <button type="submit">LAPORKAN</button>
        </div>
    </form>
</body>
</html>
