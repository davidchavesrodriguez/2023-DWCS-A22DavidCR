<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include_once("../methods/Operations.php");

$oper = new Operation();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $productName = $_POST["productName"];
    $productDescription = $_POST["productDescription"];
    $productPicture = $_POST["productPicture"];
    $categoryId = $_POST["categoryId"];

    // Create a new Product object
    $newProduct = new Product($productName, $productDescription, $productPicture, new Category($categoryId), null);

    // Add the new product to the database
    $oper->addProduct($newProduct);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <?php
    include_once("./header.php");
    ?>
    <h2>Add a New Product</h2>
    <form action="" method="post">
        <label for="productName">Product Name:</label>
        <input type="text" name="productName" required><br>

        <label for="productDescription">Product Description:</label>
        <textarea name="productDescription" required></textarea><br>

        <label for="productPicture">Product Picture URL:</label>
        <input type="text" name="productPicture" required><br>

        <label for="categoryId">Category:</label>
        <select name="categoryId" required>
            <?php
            // Fetch all categories from the database
            $categories = $oper->getAllCategories();

            // Display each category as an option in the select dropdown
            if ($categories !== null) {
                echo '<option value="">Pick a category</option>';
                foreach ($categories as $category) {
                    echo '<option value="' . $category->getId() . '">' . $category->getName() . '</option>';
                }
            } else {
                echo '<option value="" style="color: red;">Error showing categories</option>';
            }
            ?>
        </select><br>

        <input type="submit" value="Add Product">
    </form>
</body>

</html>