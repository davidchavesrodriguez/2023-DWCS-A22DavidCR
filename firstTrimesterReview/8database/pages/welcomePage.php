<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include_once("./methods/Operations.php");
$oper = new Operation();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome!</title>
  <link rel="stylesheet" href="../css/style.css" />
</head>

<body id="welcomeBody">
  <header id="header">
    <img src="../images/shopLogo.jpeg" alt="Shop Logo" id="shopLogo">
    <h1>Corente's World</h1>
  </header>
  <nav id="welcomeNav" class="pinkBackground">
    <ul>
      <li><a href="#">Welcome Page</a></li>
      <li><a href="./listProducts.php?id=valor">List of Products</a></li> <!-- Pasar o valor -->
      <li><a href="./addProduct.php">Add New Product</a></li>
    </ul>
  </nav>
  <main>
    <p>Info About the Page</p>
  </main>
  <aside>
    <?php
    echo $oper->getUserName($_SESSION["login"], $_SESSION["password"]);
    ?>
  </aside>
</body>

</html>