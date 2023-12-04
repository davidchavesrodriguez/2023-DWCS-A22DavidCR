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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database 8</title>
    <link rel="stylesheet" href="./css/style.css" />

</head>

<body id="indexBody">
    <?php



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
    // $oper = new Operation();
    // $userName = $oper->getUserName("pepinho", "abc123.");

    // if ($userName !== null) {
    //     echo "Bienvenido, $userName!";
    // } else {
    //     echo "Credenciales no válidas.";
    // }

    ?>
    <header id="header">
        <img src="./images/shopLogo.jpeg" alt="Shop Logo" id="shopLogo">
        <h1>Corente's World</h1>
    </header>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="userForm">
        <fieldset class="pinkBackground">
            <legend>Log in</legend>
            <label for="login">Username</label>
            <input type="text" name="login" />
            <label for="password">Password</label>
            <input type="password" name="password" />
        </fieldset>
        <input type="submit" value="Access">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["login"] = $_POST["login"];
        $_SESSION["password"] = $_POST["password"];
        if ($oper->getUserName($_SESSION["login"], $_SESSION["password"]) !== null) {
            header("Location: ./pages/welcomePage.php");
        } else {
            echo "<img src='./images/finish.png'></img>";
        }
    }
    ?>
</body>

</html>