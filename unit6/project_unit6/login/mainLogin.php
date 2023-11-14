<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php?redirigido=true");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Página principal</title>
    <!--<link rel = "stylesheet" href = "./css/alta_usuarios.css">-->
    <meta charset="UTF-8">
</head>

<body>
    <?php echo "Welcome " . $_SESSION['usuario']; ?>
    <br><a href="logout.php"> Exit <a>
</body>

</html>