<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include_once("../methods/Operations.php");
$operation = new Operation();

// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Fetch the product details using the getProduct method
    $product = $operation->getProduct($productId);

    // Handle product update form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateProduct"])) {
        // Collect updated product data
        $updatedName = $_POST["updatedName"];
        $updatedDescription = $_POST["updatedDescription"];
        $updatedPicture = $_POST["updatedPicture"];
        $updatedCategoryId = $_POST["updatedCategoryId"];

        // Create a new Product object with updated data
        $updatedProduct = new Product($updatedName, $updatedDescription, $updatedPicture, new Category($updatedCategoryId), $productId);

        // Update the product in the database
        $operation->updateProduct($updatedProduct);

        // Fetch the product details again to display updated information
        $product = $operation->getProduct($productId);
    }

    // Display the product details
    if ($product !== null) {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Product Details</title>
            <link rel="stylesheet" href="../css/style.css" />
        </head>

        <body>

            <h2><?= $product->getName() ?></h2>
            <p>Description: <?= $product->getDescription() ?></p>
            <p>Category: <?= $product->getCategory()->getName() ?></p>
            <p>Picture: <img src="<?= $product->getPicture() ?>" alt="Product Image"></p>

            <!-- Product Update Form -->
            <h3>Update Product</h3>
            <form action="" method="post">
                <label for="updatedName">Updated Name:</label>
                <input type="text" name="updatedName" value="<?= $product->getName() ?>" required><br>

                <label for="updatedDescription">Updated Description:</label>
                <textarea name="updatedDescription" required><?= $product->getDescription() ?></textarea><br>

                <label for="updatedPicture">Updated Picture URL:</label>
                <input type="text" name="updatedPicture" value="<?= $product->getPicture() ?>" required><br>

                <label for="updatedCategoryId">Updated Category:</label>
                <select name="updatedCategoryId" required>
                    <?php
                    // Fetch all categories from the database
                    $categories = $operation->getAllCategories();

                    // Display each category as an option in the select dropdown
                    if ($categories !== null) {
                        foreach ($categories as $category) {
                            $selected = ($category->getId() == $product->getCategory()->getId()) ? 'selected' : '';
                            echo "<option value='{$category->getId()}' $selected>{$category->getName()}</option>";
                        }
                    }
                    ?>
                </select><br>

                <input type="submit" name="updateProduct" value="Update Product">
            </form>

        </body>

        </html>
<?php
    } else {
        echo '<p>Error fetching product details</p>';
    }
} else {
    echo '<p>No product selected</p>';
}
?>