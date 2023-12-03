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


    // FUNCTIONS
    // GET PRODUCT
    //$oper = new Operation();
    //$product = $oper->getProduct(1);
    //if ($product) {
    //  echo "Id: {$product->getId()}";
    //echo "<br>";
    //echo "Name: {$product->getName()}";
    //echo "<br>";
    //echo "Description: {$product->getDescription()}";
    //echo "<br>";
    //echo $product->getCategory();
    //}

    // GET ALL PRODUCTS
    function getAllProducts()
    {
        $oper = new Operation();
        $list = $oper->getAllProducts();
        foreach ($list as $product) {
            print_r($product->getCategory());
            echo "<br>";
            echo "<br>";
        }
    }

    // ADD PRODUCT
    //  $oper = new Operation();
    //$oper->addProduct(new Product("", "", "", new Category(), null));
    //} 

    // GET CATEGORY
    //$oper = new Operation();
    //echo $oper->getCategory();

    // GET ALL CATEGORIES
    function getAllCategories()
    {
        $oper = new Operation();
        $categories = $oper->getAllCategories();
        if ($categories !== null) {
            echo '<select name="category">';
            echo '<option value="">Pick a category</option>';
            foreach ($categories as $category) {
                echo '<option value="' . $category->getId() . '">' . $category->getName() . '</option>';
            }
            echo '</select>';
        } else {
            echo "Error showing categories";
        }
    }

    // UPDATE PRODUCT
    //$oper = new Operation();
    //$productToUpdate = $oper->getProduct(1);  
    //$productToUpdate->setName("Nuevo Nombre");
    //$productToUpdate->setDescription("Nueva Descripción");
    //$productToUpdate->setPicture("nueva_imagen.jpg");
    //$productToUpdate->getCategory()->setId(2);  
    //$oper->updateProduct($productToUpdate);  

    // GET USERNAME
    //$oper = new Operation();
    //$userName = $oper->getUserName("usuario", "contraseña");

    //if ($userName !== null) {
    //   echo "Bienvenido, $userName!";
    //} else {
    //   echo "Credenciales no válidas.";
    //}



    ?>
</body>

</html>