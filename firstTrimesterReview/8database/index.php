<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database 8</title>
</head>

<body>
    <h1>Database</h1>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once("./methods/Operations.php");
    try {
        $oper = new Operation();
        // GET PRODUCT
        // $product = $oper->getProduct(1);
        // if ($product) {
        //     echo "Id: {$product->getId()}";
        //     echo "<br>";
        //     echo "Name: {$product->getName()}";
        //     echo "<br>";
        //     echo "Description: {$product->getDescription()}";
        //     echo "<br>";
        //     echo $product->getCategory();
        // }

        // GET ALL PRODUCTS
        print_r($oper->getAllProducts());
    } catch (PDOException $e) {
        return ["error" => $e->getMessage()];
    }

    ?>
</body>

</html>