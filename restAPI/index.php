<?php

declare(strict_types=1);

// *REQUIRE AUTOMATIZER*
spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});

set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");

// *CHANGE OUTPUT FORMAT*
header("Content-type: application/json; charset=UTF-8");

// *ALWAYS PRINT index.php URI*
// $parts = explode("/", $_SERVER["REQUEST_URI"]);
// print_r($parts);


// *GET ERROR 404 IF FIRST INDEX IS *NOT* "products"*
// $parts = explode("/", $_SERVER["REQUEST_URI"]);
// if ($parts[1] != "products") {
//     http_response_code(404);
//     exit;
// }
// print_r($parts);


// *GET SECOND INDEX IF FIRST ONE IS "products"*
// $parts = explode("/", $_SERVER["REQUEST_URI"]);
// if ($parts[1] != "products") {
//     http_response_code(404);
//     exit;
// }
// $id = $parts[2] ?? null;
// var_dump($id);


// *GET THE METHOD AND THE SECOND INDEX IF FIRST ONE IS "products"*
$parts = explode("/", $_SERVER["REQUEST_URI"]);

if ($parts[1] != "products") {
    http_response_code(404);
    exit;
}

$id = $parts[2] ?? null;



// *Create conecction with a database*
$database = new Database("localhost", "product_db", "appUser", "abc123.");
$database->getConnection();


$gateway = new ProductGateway($database);
$controller = new ProductController($gateway);

$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
