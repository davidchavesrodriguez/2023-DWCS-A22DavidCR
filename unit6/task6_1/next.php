<?php
// Start the session
session_start();

// Include the DBOperations.php file
require_once 'DBOperations.php';

// Instantiate the Operations class to establish a database connection
$operations = new Operations();

// Instantiate the Login class with the database connection
$login = new Login($operations->getPdo());

// Check if the user is logged in
if (!$login->validateUser($_SESSION['username'], $_SESSION['password'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Next Page</title>
</head>

<body>
    <h2>Welcome to the Next Page</h2>

    <p>Object stored in the session:</p>
    <pre><?php print_r($_SESSION['example_in_session']); ?></pre>

    <p>Object stored in the cookie:</p>
    <?php
    if (isset($_COOKIE['example_cookie'])) {
        $exampleFromCookie = unserialize($_COOKIE['example_cookie']);
        echo "<pre>";
        print_r($exampleFromCookie);
        echo "</pre>";
    } else {
        echo "<p>No object found in the cookie.</p>";
    }
    ?>

    <p><a href="logout.php">Logout</a></p>
</body>

</html>