<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://localhost/project");
include_once '../modelo/pickup.php';
include_once '../modelo/database.php';
$db = new Database();
$pickup = new Pickup($db->dbConnect());
$data = json_decode(file_get_contents('php://input'));
if (isset($data->matricula))
    $pickup->matricula = $data->matricula;
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ($pickup->matricula) {
            echo json_encode($pickup->getPickup());
        } else
            echo json_encode($pickup->getAllPickup());
        break;
    case 'POST':
        echo json_encode($pickup->createPickup());
        break;
    case 'PUT':
        echo json_encode($pickup->updatePickup());
        break;
    case 'PATCH':
        echo json_encode($pickup->patchPickup());
        break;
    case 'DELETE':
        echo json_encode($pickup->deletePickup());
        break;
}


?>