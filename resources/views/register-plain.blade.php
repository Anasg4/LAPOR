<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPOR - Register</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="/login">LOGIN</a></li>
            <li><a href="/register">REGISTER</a></li>
        </ul>
    </header>

    <div>
        @if($errors->has('email'))
            {{ $errors->first('email') }}
        @endif
        @if($errors->has('nik'))
            {{ $errors->first('nik') }}
        @endif
    </div>

    <div class="container">
        <form action="/register" method="post">
            <div class="form-group">
                @csrf
                <label for="name">Nama</label>
                <input type="text" name="name" value="{{ Request::old('name', '') }}">
            </div>
            <div class="form-group">
                <label for="name">NIK</label>
                <input type="number" name="nik" value="{{ Request::old('nik', '') }}">
            </div>
            <div class="form-group">
                <label for="name">E-mail</label>
                <input type="text" name="email" value="{{ Request::old('email', '') }}">
            </div>
            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" name="password">
            </div>
            <button type="submit">REGISTER</button>
        </form>
    </div>
</body>
</html>
