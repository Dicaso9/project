<?php
session_start();
require_once "../database.php";
require_once "../modelo/entregaModelo.php";
$input = json_decode(file_get_contents("php://input"));
$db = new Database();
$entrega = new Entrega($db->dbConnect());
//gets all public properies from the object and saves their names, conn MUST be private
$inputValidKeys = array_keys(get_object_vars($entrega)); 
//builds the valid attributes of the object that were sent in the request; if they were not sent, assigns null
foreach ($inputValidKeys as $key) {
    $entrega->{$key} = isset($input->$key) ? $input->$key : null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (empty($entrega->)) {
            echo json_encode($entrega->getAllEntrega());
            break;
        } else {
            echo json_encode($entrega->getEntrega());
            break;
        }
    case 'POST':
        echo json_encode($entrega->createEntrega());
        break;
    case 'PUT':
        echo json_encode($entrega->updateEntrega());
        break;
    case 'PATCH':
        echo json_encode($entrega->patchEntrega());
        break;
    case 'DELETE':
        echo json_encode($entrega->deleteEntrega());
        break;
    default:
        echo json_encode("unsupported method");
}
?>