<?php
session_start();
require_once "../database.php";
require_once "../modelo/transporteModelo.php";
$input = json_decode(file_get_contents("php://input"));
$db = new Database();
$transporte = new Transporte($db->dbConnect());
//gets all public properies from the object and saves their names, conn MUST be private
$inputValidKeys = array_keys(get_object_vars($transporte)); 
//builds the valid attributes of the object that were sent in the request; if they were not sent, assigns null
foreach ($inputValidKeys as $key) {
    $transporte->{$key} = isset($input->$key) ? $input->$key : null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (empty($transporte->)) {
            echo json_encode($transporte->getAllTransporte());
            break;
        } else {
            echo json_encode($transporte->getTransporte());
            break;
        }
    case 'POST':
        echo json_encode($transporte->createTransporte());
        break;
    case 'PUT':
        echo json_encode($transporte->updateTransporte());
        break;
    case 'PATCH':
        echo json_encode($transporte->patchTransporte());
        break;
    case 'DELETE':
        echo json_encode($transporte->deleteTransporte());
        break;
    default:
        echo json_encode("unsupported method");
}
?>