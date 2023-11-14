<!-- CREATE TABLE login 
(userId INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(255), password VARCHAR(255));

INSERT INTO login 
(username, password) 
VALUES 
('A22DavidCR', 'abc123.'),
('A22JulioAA', 'abc123.'),
('A22IsamelLF', 'abc123.'); -->

<!--index.php

This is a web page that requires a valid user in order to view its contents.

Save an object of the class Example in the session and another object of the class Example in a cookie.

Create a link to navigate to the page "next.php"

Create a link to logout. -->

<?php
// index.php

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

// Save an object of the class Example in the session
$exampleInSession = new Example(1, 'Example in Session');
$_SESSION['example_in_session'] = $exampleInSession;

// Save an object of the class Example in a cookie
$exampleInCookie = new Example(2, 'Example in Cookie');
setcookie('example_cookie', serialize($exampleInCookie), time() + 3600, '/'); // Change "example_cookie" to your actual cookie name

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <h2>Welcome to the Index Page</h2>

    <p>Contents of the session:</p>
    <pre><?php print_r($_SESSION); ?></pre>

    <p>Contents of the cookie:</p>
    <pre><?php print_r($_COOKIE); ?></pre>

    <p><a href="next.php">Go to Next Page</a></p>
    <p><a href="logout.php">Logout</a></p>
</body>

</html>