<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <style>
    #required {
      color: red;
      font-size: 10px;
    }
  </style>

  <h1>Novell Services Login</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="username">Username:
    </label>
    <input type="text" name="username" required value="
                <?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" />
    <br>
    <label for="username" id="required">*Required field*</label>
    <br>
    <label for="password">Password:
    </label>
    <input type="password" name="password" required value="
                <?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" />
    <br>
    <label for="username" id="required">*Required field*</label>
    <br>
    <label for="city">City of employment:
    </label>
    <input type="text" name="city" value="
                <?php echo isset($_POST['city']) ? htmlspecialchars($_POST['city']) : ''; ?>" />
    <br />
    <label for="server">Web server</label>
    <select name="server" id="server">
      <option value="northAmerica" <?php if (
                                      isset($_POST['server'])
                                      && $_POST['server'] == 'northAmerica'
                                    )
                                      echo 'selected'; ?>>
        North America</option>
      <option value="europe" <?php if (
                                isset($_POST['server'])
                                && $_POST['server'] == 'europe'
                              )
                                echo 'selected'; ?>>
        Europe</option>
      <option value="asia" <?php if (
                              isset($_POST['server'])
                              && $_POST['server'] == 'asia'
                            )
                              echo 'selected'; ?>>
        Asia</option>
      <option value="southAmerica" <?php if (
                                      isset($_POST['server'])
                                      && $_POST['server'] == 'southAmerica'
                                    )
                                      echo 'selected'; ?>>
        South America</option>
    </select>
    <br />
    <br />

    <label for="role">Please, specify your role:
    </label>
    <br />
    <label for="admin">Admin</label>
    <input type="radio" name="role" id="admin" value="admin" <?php if (isset($_POST['role']) && $_POST['role'] == 'admin')
                                                                echo 'checked'; ?> />
    <br />
    <label for="engineer">Engineer</label>
    <input type="radio" name="role" id="engineer" value="engineer" <?php if (isset($_POST['role']) && $_POST['role'] == 'engineer')
                                                                      echo 'checked'; ?> />
    <br />
    <label for="manager">Manager</label>
    <input type="radio" name="role" id="manager" value="manager" <?php if (isset($_POST['role']) && $_POST['role'] == 'manager')
                                                                    echo 'checked'; ?> />
    <br />
    <label for="guest">Guest</label>
    <input type="radio" name="role" id="guest" value="guest" <?php if (isset($_POST['role']) && $_POST['role'] == 'guest')
                                                                echo 'checked'; ?> />
    <br />
    <br>
    <br>

    <label for="checkbox">Single Sign-on to the following</label>
    <br />
    <input type="checkbox" name="sign[]" id="mail" value="mail" <?php if (isset($_POST['sign']) && in_array('mail', $_POST['sign']))
                                                                  echo 'checked'; ?> />
    <label for="mail">Mail</label>
    <br />
    <input type="checkbox" name="sign[]" id="payroll" value="payroll" <?php if (isset($_POST['sign']) && in_array('payroll', $_POST['sign']))
                                                                        echo 'checked'; ?> />
    <label for="payroll">Payroll</label>
    <br />
    <input type="checkbox" name="sign[]" id="self" value="self" <?php if (isset($_POST['sign']) && in_array('self', $_POST['sign']))
                                                                  echo 'checked'; ?> />
    <label for="self">Self-service</label>
    <br />

    <input type="submit" value="Login" />
    <input type="reset" value="Reset" />
    <?php
    echo "<br>";
    echo "<br>";
    ?>
  </form>
</body>

</html>