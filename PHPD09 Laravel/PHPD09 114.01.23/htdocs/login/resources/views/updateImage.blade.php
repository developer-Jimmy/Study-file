<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <h1>Upload Your Image</h1>
    <form method="POST" action="{{ url('/upload') }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="photo" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
