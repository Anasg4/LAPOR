<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Add Reward</title>
</head>
<body>
    <form action="/admin/reward/store" method="post">
        @csrf

        <div>
            <label for="name">Nama</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="point">Poin</label>
            <input type="number" name="point" id="point">
        </div>
        <div>
            <label for="amount">Jumlah</label>
            <input type="number" name="amount" id="amount">
        </div>
        <div>
            <button type="submit">TAMBAH</button>
        </div>
    </form>
</body>
</html>
