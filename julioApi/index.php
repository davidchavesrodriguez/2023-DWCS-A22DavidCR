<?php

declare(strict_types=1);

include_once("./src/OperationsDB.php");

echo "\n";

header("Content-type: application/json; charset=UTF-8");

$parts = explode("/", $_SERVER["REQUEST_URI"]);

if($parts[2] != "patients"){
    http_response_code(404);
    echo ("Page not found");
    exit;
}

$id = $parts[3] ?? null;

try{
    $oper = new OperationsDB();
} catch (PDOException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}

if((int)$id){
    if($oper->existsPatient((int)$id)){
        $patient = $oper->getPatient((int)$id);

         switch($_SERVER["REQUEST_METHOD"]){
            case "GET":
                echo json_encode($patient, JSON_PRETTY_PRINT);
                break;
            case "PATCH":
                $data = (array)json_decode(file_get_contents("php://input"), true);

                $patient = new Patient($data[0], $data[1], $data[2], $data[3], $data[4]);

                break;
            default:
                http_response_code(405);
                header("Allow: GET, PATCH");
                break;
        }

    }else{
        http_response_code(404);
        echo ("Patient not found");
    }
    
}else{
    switch($_SERVER["REQUEST_METHOD"]) {
        case "GET":
            echo json_encode($oper->getAllPatients(), JSON_PRETTY_PRINT);
            break;
        case "POST":
            $data = (array)json_decode(file_get_contents("php://input"), true);

            $patient = new Patient($data["name"], $data["surname"], $data["dni"], $data["nhc"], $data["birthdate"]);

            $oper->addPatient($patient);
            
            break;
        default:
            http_response_code(405);
            header("Allow: GET, POST");
    }
}






