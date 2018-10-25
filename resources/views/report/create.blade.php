<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create Report</h1>
    <form action="/report/save" method="post">
        {{ csrf_field() }}
        <input type="text" name="violation" id="violation">
        <input type="text" name="license-number" id="license-number">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
