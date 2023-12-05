<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include_once("../methods/Operations.php");
$operation = new Operation();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="../css/style.css" />

</head>

<body>
    <h1>List</h1>
    <?php
    include_once("./header.php");
    ?>
    <h2>Product List</h2>

    <?php

    // Fetch all products from the database
    $products = $operation->getAllProducts();

    // Display each product in a list
    if ($products !== null) {
        echo '<ul>';
        foreach ($products as $product) {
            echo '<li>';
            echo '<a href="modifyProducts.php?id=' . $product->getId() . '">' . $product->getName() . '</a>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Error fetching products</p>';
    }
    ?>

</body>

</html>