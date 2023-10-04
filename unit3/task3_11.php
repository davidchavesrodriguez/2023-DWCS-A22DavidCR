<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array²</title>
</head>

<body>
    <?php
    $beverages = array(
        "Coke" => array("name" => "Coke", "price" => 2.1),
        "Pepsi" => array("name" => "Pepsi", "price" => 2),
        "Fanta" => array("name" => "Orange Fanta", "price" => 2.5),
        "Trina" => array("name" => "Apple Trina", "price" => 2.3),
    );
    /*     foreach ($beverages as $name => $details) {
        echo "Name: ", $details["name"], ". - Price: ", $details["price"];
        echo "<br>";
    } */

    ?>
    <form>
        <select name="option">
            <?php foreach ($beverages as $name => $details) : ?>
                <option value="<?php echo $name; ?>">
                    <?php echo $details["name"], " (", $details["price"], " €)"; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
</body>

</html>