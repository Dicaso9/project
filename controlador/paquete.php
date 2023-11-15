<?php
session_start();
require_once "../database.php";
require_once "../modelo/paqueteModelo.php";
$input = json_decode(file_get_contents("php://input"));
$db = new Database();
$paquete = new Paquete($db->dbConnect());
//gets all public properies from the object and saves their names, conn MUST be private
$inputValidKeys = array_keys(get_object_vars($paquete)); 
//builds the valid attributes of the object that were sent in the request; if they were not sent, assigns null
foreach ($inputValidKeys as $key) {
    $paquete->{$key} = isset($input->$key) ? $input->$key : null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (empty($paquete->idPaquete)) {
            echo json_encode($paquete->getAllPaquete());
            break;
        } else {
            echo json_encode($paquete->getPaquete());
            break;
        }
    case 'POST':
        echo json_encode($paquete->createPaquete());
        break;
    case 'PUT':
        echo json_encode($paquete->updatePaquete());
        break;
    case 'PATCH':
        echo json_encode($paquete->patchPaquete());
        break;
    case 'DELETE':
        echo json_encode($paquete->deletePaquete());
        break;
    default:
        echo json_encode("unsupported method");
}
?>