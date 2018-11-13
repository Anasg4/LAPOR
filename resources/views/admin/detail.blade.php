<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Verifikasi</title>
</head>
<body>
    {{ $report }}
    <br>
    <form action="/admin/report/{{ $report['id'] }}" method="post">
        {{ method_field('PUT') }}
        @csrf
        <select name="report_status" id="report status">
            <option value="0">Belum diverifikasi</option>
            <option value="1">Diverifikasi</option>
            <option value="2">Selesai</option>
        </select>
        <button type="submit">SIMPAN</button>
    </form>
</body>
</html>
