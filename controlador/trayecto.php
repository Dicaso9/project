<?php
session_start();
require_once "../database.php";
require_once "../modelo/trayectoModelo.php";
$input = json_decode(file_get_contents("php://input"));
$db = new Database();
$trayecto = new Trayecto($db->dbConnect());
//gets all public properies from the object and saves their names, conn MUST be private
$inputValidKeys = array_keys(get_object_vars($trayecto)); 
//builds the valid attributes of the object that were sent in the request; if they were not sent, assigns null
foreach ($inputValidKeys as $key) {
    $trayecto->{$key} = isset($input->$key) ? $input->$key : null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (empty($trayecto->idTrayecto)) {
            echo json_encode($trayecto->getAllTrayecto());
            break;
        } else {
            echo json_encode($trayecto->getTrayecto());
            break;
        }
    case 'POST':
        echo json_encode($trayecto->createTrayecto());
        break;
    // case 'PUT':
    //     echo json_encode($trayecto->updateTrayecto());
    //     break;
    // case 'PATCH':
    //     echo json_encode($trayecto->patchTrayecto());
    //     break;
    case 'DELETE':
        echo json_encode($trayecto->deleteTrayecto());
        break;
    default:
        echo json_encode("unsupported method");
}
?>