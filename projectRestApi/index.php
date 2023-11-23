<?php
include_once("./src/Player.php");
include_once("./src/Database.php");
include_once("./src/Methods.php");

header("Content-type: application/json; charset=UTF-8");

$database = new Database("localhost", "gaelic", "gaelicUser", "abc123.");
$method = new Method($database);

try {
    $players = $method->teamList();
    $json = json_encode($players, JSON_PRETTY_PRINT);
    echo $json;
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => $e->getMessage()], JSON_PRETTY_PRINT);
}
