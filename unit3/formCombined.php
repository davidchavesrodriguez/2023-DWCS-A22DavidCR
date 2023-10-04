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
    //Initialize variables
    $name = $email = $nameErr = $modo1 = $modo2 = $categ = $job = "";

    $name = test_input(($_POST["name"]));
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
      $name = "";
    }
    $email = test_input(($_POST["email"]));
    $job = test_input(($_POST["job"]));
    $categ = test_input(($_POST["categ"]));
    if (!empty($_POST["modo1"]))
      $modo1 = $_POST["modo1"];
    if (!empty($_POST["modo2"]))
      $modo2 = $_POST["modo2"];
  } //if
  ?>
  <h2>PHP Form Validation Example</h2>
  <p><span class="error">* required field</span></p>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="idName">Name: </label>
    <input type="text" id="idName" name="name" required value="<?php echo $name; ?>">
    <span class="error">*<?php echo $nameErr; ?></span>
    <br><br>
    <label for="idEMail">Email: </label>
    <input type="text" id="idEMail" name="email" required value="<?php echo $email; ?>">
    <span class="error">*</span><br><br>
    <label for="idJob">Job: </label>
    <select name="job" id="idJob">
      <option value="1" <?php if (isset($job) && $job == "1") echo "selected"; ?>>Programmer</option>
      <option value="2" <?php if (isset($job) && $job == "2") echo "selected"; ?>>Designer</option>
      <option value="3" <?php if (isset($job) && $job == "3") echo "selected"; ?>>Manager</option>
    </select><br><br>
    <label for="idCat">Category: </label>
    <input type="radio" id="idCat" name="categ" value="Junior" <?php if (isset($categ) && $categ == "Junior") echo "checked"; ?>>Junior
    <input type="radio" id="idCat1" name="categ" value="Senior" <?php if (isset($categ) && $categ == "Senior") echo "checked"; ?>>Senior <br><br>
    <label for="idModo">Working mode: </label>
    <input type="checkbox" id="idModo" name="modo1" value="Office" <?php if (isset($modo1) && $modo1 == "Office") echo "checked"; ?>>Office
    <input type="checkbox" id="idModo2" name="modo2" value="Remote" <?php if (isset($modo2) && $modo2 == "Remote") echo "checked"; ?>>Remote<br><br>
    <input type="submit">
  </form>

</body>

</html>