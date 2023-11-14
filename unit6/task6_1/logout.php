<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Delete any existing cookies
setcookie("example_cookie", "", time() - 3600, "/");

echo "Logout successful. Session and cookies deleted.";

// Redirect to the login page 
header("Location: login.php");
exit();
