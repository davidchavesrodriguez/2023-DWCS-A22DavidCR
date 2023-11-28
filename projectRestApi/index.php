<?php
include_once("./src/Methods.php");

header("Content-type: application/json; charset=UTF-8");

$parts = explode("/", $_SERVER["REQUEST_URI"]);

if ($parts[1] != "gaelic") {
    http_response_code(404);
    echo ("Page not found");
    exit;
}

$resource = $parts[2] ?? null;

try {
    $method = new Method("localhost", "gaelic", "gaelicUser", "abc123.");
} catch (Exception $e) {
    echo "" . $e->getMessage();
}

switch ($resource) {
    case "teams":
        handleTeamRequest($method);
        break;
    default:
        http_response_code(404);
        echo ("Resource not found");
        break;
}

function handleTeamRequest(Method $method)
{
    switch ($_SERVER["REQUEST_METHOD"]) {
        case "GET":
            echo json_encode($method->teamList(), JSON_PRETTY_PRINT);
            break;
        case "POST":
            $data = (array)json_decode(file_get_contents("php://input"), true);
            $newTeam = new Team(
                $data["teamName"],
                $data["city"],
                $data["foundedYear"],
                $data["homeStadium"]
            );
            $method->addTeam($newTeam);
            break;
        case "DELETE":
            $teamName = $GLOBALS['parts'][4] ?? null;
            if ($teamName) {
                $success = $method->deleteTeam($teamName);
                if ($success) {
                    echo ("Team deleted successfully");
                } else {
                    http_response_code(404);
                    echo ("Team not found");
                }
            } else {
                http_response_code(400);
                echo ("Team name not provided");
            }
            break;
        case "PATCH":
            $teamName = $GLOBALS['parts'][4] ?? null;
            if ($teamName) {
                $data = (array)json_decode(file_get_contents("php://input"), true);

                if (isset($data["fieldToUpdate"]) && isset($data["newValue"])) {
                    $fieldToUpdate = $data["fieldToUpdate"];
                    $newValue = $data["newValue"];

                    $success = $method->updateTeam($teamName, $fieldToUpdate, $newValue);

                    if ($success) {
                        echo ("Team updated successfully");
                    } else {
                        http_response_code(404);
                        echo ("Team not found");
                    }
                } else {
                    http_response_code(400);
                    echo ("Field to update or new value not provided");
                }
            } else {
                http_response_code(400);
                echo ("Team name not provided");
            }
            break;
        default:
            http_response_code(405);
            header("Allow: GET, POST, DELETE, PATCH");
    }
}
