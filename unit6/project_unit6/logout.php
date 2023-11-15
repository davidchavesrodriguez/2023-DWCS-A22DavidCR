<?php
session_start();    // join the session
$_SESSION = array();
session_destroy();    // delete the session
setcookie(session_name(), 123, time() - 1000); // delete the cookie
header("Location: GaelicManager.php");