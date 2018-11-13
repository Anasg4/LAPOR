<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lapor - Reward</title>
</head>
<body>
    @if($errors != [])
        {{ $errors }}
    @endif
    @if(count($rewards) > 0)
        @foreach ($rewards as $reward)
            <div>
                {{ $reward['name'] }}<br>
                {{ $reward['point'] }}
                <form action="/reward/{{ $reward['id']}}" method="post">
                    @csrf
                    <button type="submit">TUKARKAN POIN</button>
                </form>
            </div>
        @endforeach
    @endif
</body>
</html>
