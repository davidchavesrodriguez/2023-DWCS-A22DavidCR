<?php
// Include the DBOperations.php file
require_once 'DBOperations.php';

// Instantiate the Operations class to establish a database connection
$operations = new Operations();

// Instantiate the Login class with the database connection
$login = new Login($operations->getPDO());

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate user credentials
    if ($login->validateUser($username, $password)) {
        // Start the session
        session_start();

        // Set session variables
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        // Debugging messages
        echo "Login successful! Welcome, $username.";
        echo "Session variables set: ";
        print_r($_SESSION);

        // Redirect to index.php
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid login credentials. Please try again.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>

</html>