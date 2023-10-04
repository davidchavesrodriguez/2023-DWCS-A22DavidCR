<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Drinks</title>
</head>

<body>
  <h1>Drinks Menu</h1>
  <h3>Please, select a drink:
  </h3>
  <?php $price = $quantity =  0; ?>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="idDrink">Drinks:</label>
    <select name="drink" id="idDrink">
      <option value="Coke">Coke (1 $)</option>
      <option value="Pepsi">Pepsi (0.8 $)</option>
      <option value="Orange Juice">Orange Juice (0.9 $)</option>
      <option value="Apple Juice"> Apple Juice (1.1 $)</option>
    </select> <br>

    <?php
    switch ($_POST["drink"]) {
      case "Coke":
        $price = 1;
        break;
      case "Pepsi":
        $price = 0.8;
        break;
      case "Orange Juice":
        $price = 0.9;
        break;
      case "Apple Juice":
        $price = 1.1;
        break;
      default:
        $price = 0;
    }
    ?>

    <label for="idNumber">How many would you want to get? </label>
    <input type="number" name="number" id="idNumber" value="1" min="1" max="999" />
    <br>
    <br>
    <?php $quantity = $_POST["number"] ?>
    <input type="submit" value="I want that!">
    <br>
    <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($quantity == 1) {
        if ($_POST["drink"] == "Coke") {
          echo "You are buying ", $quantity, " bottle of ", $_POST["drink"], " for a total of ", $quantity * $price, " canadian dollar. Enjoy!";
        } else
          echo "You are buying ", $quantity, " bottle of ", $_POST["drink"], " for a total of ", $quantity * $price, " canadian dollars. Enjoy!";
      } else
        echo "You are buying ", $quantity, " bottles of ", $_POST["drink"], " for a total of ", $quantity * $price, " canadian dollars. Enjoy!";
    }
    ?>
  </form>
</body>

</html>