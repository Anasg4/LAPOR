<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPOR - Detail</title>
</head>
<body>
    {{ $report }}
    <img src="{{ Storage::url($report['image']) }}" alt="evidence">
</body>
</html>
