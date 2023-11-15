<?php
session_start();
require_once "../database.php";
require_once "../modelo/vehiculoModelo.php";
$input = json_decode(file_get_contents("php://input"));
$db = new Database();
$vehiculo = new Vehiculo($db->dbConnect());
//gets all public properies from the object and saves their names, conn MUST be private
$inputValidKeys = array_keys(get_object_vars($vehiculo)); 
//builds the valid attributes of the object that were sent in the request; if they were not sent, assigns null
foreach ($inputValidKeys as $key) {
    $vehiculo->{$key} = isset($input->$key) ? $input->$key : null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (empty($vehiculo->matricula)) {
            echo json_encode($vehiculo->getAllVehiculo());
            break;
        } else {
            echo json_encode($vehiculo->getVehiculo());
            break;
        }
    case 'POST':
        echo json_encode($vehiculo->createVehiculo());
        break;
    case 'PUT':
        echo json_encode($vehiculo->updateVehiculo());
        break;
    case 'PATCH':
        echo json_encode($vehiculo->patchVehiculo());
        break;
    case 'DELETE':
        echo json_encode($vehiculo->deleteVehiculo());
        break;
    default:
        echo json_encode("unsupported method");
}
?>