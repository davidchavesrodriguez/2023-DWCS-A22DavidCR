<?php
require_once "Operations.php";

try {
    $oper = new Operations();
    echo "<h3 style=color:green>Conexion Creada!</h3>";

    // $guest1 = new MyGuests("Julio", "Acuña", "a22julioaa@iessanclemente.net");
    // $guest2 = new MyGuests("Isamel", "Lens", "a22isamellens@iessanclemente.net");
    // $guest3 = new MyGuests("chaves", "david", "a22juniorcafetero@iessanclemente.net");

    // // $oper->addMyGuest($guest1);
    // $oper->addMyGuest($guest2);
    // $oper->addMyGuest($guest3);

    //$oper->getAllGuests();

    // echo $oper->getMyGuest(2);

    echo "<h1 style=color:#880808>LIST OF ALL GUESTS</h1>";

    $guestList = $oper->getAllGuests();

    foreach ($guestList as $guest) {
        echo "<br>Guest: " . $guest;
    }

    $oper->closeConn();
} catch (PDOException $e) {
    echo "

DB Error: " . $e->getMessage() . "

";
} catch (Exception $e) {
    echo "

Error: " . $e->getMessage() . "

";
} finally {
    //Close connection
    $oper->closeConn();
}
