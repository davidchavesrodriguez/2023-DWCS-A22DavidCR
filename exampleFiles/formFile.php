<!DOCTYPE HTML>
<html>

<head>
    <title>PHP Form File Upload Example</title>
</head>

<body>
    <h2>PHP Form File Upload Example</h2>
    <form action="fileProcess.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>

</html>