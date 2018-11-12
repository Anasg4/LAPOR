<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload</title>
</head>
<body>
    <form action="/report" method="post" enctype="multipart/form-data">
        @csrf
        Select image to upload:
        <input type="file" name="image" id="image">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>
