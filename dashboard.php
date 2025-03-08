<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <h1>Upload File</h1>
    <form method="post" enctype="multipart/form-data">
        <label for="file">Chọn file:</label>
        <input type="file" name="file" id="file" required>
        <br><br>
        <input type="submit" value="Upload File">
    </form>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
        $upload_dir = "uploads/";

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $file_name = $_FILES["file"]["name"];
        $destination = $upload_dir . $file_name;
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $destination)) {
            echo "<p>File uploaded successfully!</p>";
            echo "<p>File path: <a href='$destination' target='_blank'>$destination</a></p>";
        } else {
            echo "<p>Unable to upload file.</p>";
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<p>No file uploaded.</p>";
    }
    ?>
</body>
</html>