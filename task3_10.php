<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <style>
    .role {
      display: block;
    }
  </style>

  <h1>Novell Services Login</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="username">Username: </label>
    <input type="text" name="username" /><br />
    <label for="password">Password: </label>
    <input type="password" name="password" />
    <br />

    <label for="city">City of employment: </label>
    <input type="text" name="city" /><br />
    <label for="server">Web server</label>
    <select name="server" id="server">
      <option value="northAmerica">North America</option>
      <option value="europe">Europe</option>
      <option value="asia">Asia</option>
      <option value="southAmerica">South America</option>
    </select>
    <br />
    <br />

    <label for="role">Please, specify your role: </label> <br />
    <label for="admin">Admin</label>
    <input type="radio" name="role" id="admin" value="admin" /> <br />
    <label for="engineer">Engineer</label>
    <input type="radio" name="role" id="engineer" value="engineer" /> <br />
    <label for="manager">Manager</label>
    <input type="radio" name="role" id="manager" value="manager" /> <br />
    <label for="guest">Guest</label>
    <input type="radio" name="role" id="guest" value="guest" checked /> <br />
    <br />
    <br />

    <label for="checkbox">Single Sign-on to the following</label> <br />
    <input type="checkbox" name="sign[]" id="mail" value="mail" />
    <label for="mail">Mail</label> <br />
    <input type="checkbox" name="sign[]" id="payroll" value="payroll" />
    <label for="payroll">Payroll</label> <br />
    <input type="checkbox" name="sign[]" id="self" value="self" />
    <label for="self">Self-service</label> <br />

    <input type="submit" value="Login" />
    <input type="reset" />
    <?php
    echo "<br>";
    echo "<br>";
    ?>

    <?php
    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


      echo "Welcome, ", $_POST["username"];
      echo "<br>";
      echo "<br>";
      echo "Your role is: ", $_POST["role"];
      echo "<br>";
      echo "<br>";
      echo "You signed as: ";
      if (isset($_POST["sign"])) {
        echo implode(", ", $_POST["sign"]);
      } else {
        echo "There is no sign-on option selected";
      };
    }
    ?>



    <br />
    <br />
  </form>
</body>

</html>