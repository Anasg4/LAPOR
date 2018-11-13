<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Dashboard</title>
</head>
<body>
    <ul>
    @foreach ($reports as $report)
        <li><a href="/admin/report/{{ $report['id'] }}">{{ $report['violation']}}</a></li>
    @endforeach
    </ul>
</body>
</html>
