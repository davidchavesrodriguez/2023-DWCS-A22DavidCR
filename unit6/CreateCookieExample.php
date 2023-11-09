 <?php
    $cookie_name = "user";
    $cookie_value = "Galleta Julito";
    setcookie($cookie_name, $cookie_value, time() + (10), "/");

    $cookie_name2 = "user2";
    $cookie_value2 = "Galleta Rianxer";
    setcookie($cookie_name2, $cookie_value2, time() + (10), "/");
    ?>
 <html>

 <body>

     <h1>Benvido ás miñas galletas!</h1>
     <?php
        if (!isset($_COOKIE[$cookie_name])) {
            echo "Cookie named '" . $cookie_name . "' is not set!";
        } else {
            echo "Cookie '" . $cookie_name . "' is set!<br>";
            echo "Value is: " . $_COOKIE[$cookie_name] . "<br>";
        }

        if (!isset($_COOKIE[$cookie_name2])) {
            echo "Cookie named '" . $cookie_name2 . "' is not set!";
        } else {
            echo "Cookie '" . $cookie_name2 . "' is set!<br>";
            echo "Value is: " . $_COOKIE[$cookie_name2];
        }
        ?>

 </body>

 </html>