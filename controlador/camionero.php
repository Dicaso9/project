<?php
session_start();
require_once "../database.php";
require_once "../modelo/camioneroModelo.php";
$input = json_decode(file_get_contents("php://input"));
$db = new Database();
$camionero = new Camionero($db->dbConnect());
//gets all public properies from the object and saves their names, conn MUST be private
$inputValidKeys = array_keys(get_object_vars($camionero)); 
//builds the valid attributes of the object that were sent in the request; if they were not sent, assigns null
foreach ($inputValidKeys as $key) {
    $camionero->{$key} = isset($input->$key) ? $input->$key : null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (empty($camionero->ci)) {
            echo json_encode($camionero->getAllCamionero());
        } else {
            echo json_encode($camionero->getCamionero());
        }
        break;
    case 'POST':
        echo json_encode($camionero->createCamionero());
        break;
    // case 'PUT':
    //     echo json_encode($camionero->updateCamionero());
    //     break;
    // case 'PATCH':
    //     echo json_encode($camionero->patchCamionero());
    //     break;
    case 'DELETE':
        echo json_encode($camionero->deleteCamionero());
        break;
    default:
        echo json_encode("unsupported method");
}
?>