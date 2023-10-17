<?php 
require "unit5Proba.php";

try {

}
catch(PDOException $e){
    echo "<span style='color:red' >Error:", $exception->getMessage(), "</span>";
        echo "<br>";
}
catch(Exception $e){
    echo "<span style='color:red' >Error:", $exception->getMessage(), "</span>";
        echo "<br>";
}

?>