<!DOCTYPE HTML>
<html>

<head>
  <style>
    .error {
      color: #FF0000;
    }
  </style>
</head>

<body>
  <?php
  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $email = $nameErr = "";
    $name = test_input(($_POST["name"]));
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
      $name = "";
    }
    $email = test_input(($_POST["email"]));
  ?>
    Welcome <?php echo $name; ?><br><br>
    Your email address is: <?php echo $email; ?><br><br>
    Your Job is: <?php echo $_POST["job"]; ?><br><br>
    Your Category is: <?php echo $_POST["categ"]; ?><br><br>
    You work
  <?php
    if (!empty($_POST["modo1"]))
      echo $_POST["modo1"] . ", ";
    if (!empty($_POST["modo2"]))
      echo $_POST["modo2"];
  } //if
  ?>
  <h2>PHP Form Validation Example</h2>
  <p><span class="error">* required field</span></p>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="idName">Name: </label>
    <input type="text" id="idName" name="name" required>
    <span class="error">*<?php echo $nameErr; ?></span>
    <br><br>
    <label for="idEMail">Email: </label>
    <input type="text" id="idEMail" name="email" required>
    <span class="error">*</span><br><br>
    <label for="idJob">Job: </label>
    <select name="job" id="idJob">
      <option value="1">Programmer</option>
      <option value="2" selected>Designer</option>
      <option value="3">Manager</option>
    </select><br><br>
    <label for="idCat">Category: </label>
    <input type="radio" id="idCat" name="categ" value="Junior" checked>Junior
    <input type="radio" id="idCat1" name="categ" value="Senior">Senior <br><br>
    <label for="idModo">Working mode: </label>
    <input type="checkbox" id="idModo" name="modo1" value="Office">Office
    <input type="checkbox" id="idModo2" name="modo2" value="Remote">Remote<br><br>
    <input type="submit">
  </form>

</body>

</html>