<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uploader CSV Files</title>
</head>

<body>

    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf

        <input type="file" name="file" id="file">
        <input type="submit" value="upload">
        
    </form>

</body>

</html>
