<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>

  <style>
    .error {
      color: red;
    }
  </style>

  <?php
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $nameErr = "";
    $name = test_input(($_POST["username"]));
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "Only letters and white space, please";
      $name = "";
    }
  };
  echo "Welcome, ", $_POST["username"];
  echo "<br>";

  echo "Your role is: ", $_POST["role"];
  echo "<br>";

  echo "You speak: ";
  if (isset($_POST["language"])) {
    echo implode(", ", $_POST["language"]);
  } else {
    echo "No languages selected.";
  };
  echo "<br>";
  ?>


  <h1>Novell Services Login</h1>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <label for="username">Username: </label>
    <input type="text" name="username" />
    <span class="error">* <?php echo $nameErr; ?> </span><br />
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

    <label for="checkbox">Which languages do you master?</label> <br />
    <input type="checkbox" name="language[]" id="java" value="java" />
    <label for="java">Java</label> <br />
    <input type="checkbox" name="language[]" id="python" value="python" />
    <label for="python">Python</label> <br />
    <input type="checkbox" name="language[]" id="rianxeiro" value="rianxeiro" />
    <label for="rianxeiro">Rianxeiro</label> <br />
    <input type="submit" />
    <br />
    <br />
  </form>
</body>

</html>