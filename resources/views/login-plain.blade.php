<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPOR - Login</title>
</head>
<body>
    <header>
            <ul>
                <li><a href="/login">LOGIN</a></li>
                <li><a href="/register">REGISTER</a></li>
            </ul>
        </header>

        <form action="/login" method="post">
            @csrf
            <label for="name">NIK</label>
            <input type="number" name="nik">
            <label for="name">Password</label>
            <input type="password" name="password">
            <button type="submit">LOGIN</button>
        </form>
</body>
</html>
