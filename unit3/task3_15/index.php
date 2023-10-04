<!DOCTYPE html>
<html>

<head>
  <title>Upload JSON File</title>
</head>

<body>
  <h1>Upload JSON File</h1>
  <form action="index.php" method="post" enctype="multipart/form-data">
    Select JSON file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" />
    <input type="submit" value="Upload File" name="submit" />
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
      $tempName = $_FILES["fileToUpload"]["tmp_name"];

      // Read the JSON file content into a string
      $studentsJson = file_get_contents($tempName);

      // Transform the JSON string into an array
      $studentsArray = json_decode($studentsJson, true);

      // Display the contents of the array
      echo "<h2>JSON Content:</h2>";
      echo "<pre>";
      print_r($studentsArray);
      echo "</pre>";
    } else {
      echo "Error: Please select a valid JSON file to upload.";
    }
  }
  ?>
</body>

</html>