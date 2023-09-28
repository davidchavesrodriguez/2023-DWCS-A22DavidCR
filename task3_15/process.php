<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["jsonFile"])) {
    $file = $_FILES["jsonFile"];

    // Check if the uploaded file is a JSON file
    $fileExtension = pathinfo($file["name"], PATHINFO_EXTENSION);
    if ($fileExtension === "json") {
        // Read JSON file contents into a string
        $jsonContent = file_get_contents($file["tmp_name"]);

        // Decode JSON string into an array
        $studentsArray = json_decode($jsonContent, true);

        // Display the contents of the array
        echo "<h2>Contents of the JSON Array:</h2>";
        echo "<pre>";
        print_r($studentsArray);
        echo "</pre>";
    } else {
        echo "Please upload a valid JSON file.";
    }
} else {
    echo "Please upload a JSON file.";
}
