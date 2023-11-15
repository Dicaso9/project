<?php
session_start();
require_once "../database.php";
require_once "../modelo/pickupModelo.php";
$input = json_decode(file_get_contents("php://input"));
$db = new Database();
$pickup = new Pickup($db->dbConnect());
//gets all public properies from the object and saves their names, conn MUST be private
$inputValidKeys = array_keys(get_object_vars($pickup)); 
//builds the valid attributes of the object that were sent in the request; if they were not sent, assigns null
foreach ($inputValidKeys as $key) {
    $pickup->{$key} = isset($input->$key) ? $input->$key : null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (empty($pickup->matricula)) {
            echo json_encode($pickup->getAllPickup());
            break;
        } else {
            echo json_encode($pickup->getPickup());
            break;
        }
    case 'POST':
        echo json_encode($pickup->createPickup());
        break;
    // case 'PUT':
    //     echo json_encode($pickup->updatePickup());
    //     break;
    // case 'PATCH':
    //     echo json_encode($pickup->patchPickup());
    //     break;
    case 'DELETE':
        echo json_encode($pickup->deletePickup());
        break;
    default:
        echo json_encode("unsupported method");
}
?>