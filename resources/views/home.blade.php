<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPOR - Home</title>
</head>
<body>
    <div>
        {{ Auth::check() }}
        {{ Auth::user() }}
    </div>
    <div>
        @foreach ($reports as $report)
            <div>
                <a href="/report/{{ $report['id'] }}">{{ $report['violation'] }}</a>
            </div>
        @endforeach
    </div>
    <div>
        <a href="/logout">LOGOUT</a>
    </div>


</body>
</html>
