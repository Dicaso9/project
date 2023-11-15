<?php
session_start();
require_once "../database.php";
require_once "../modelo/perteneceModelo.php";
$input = json_decode(file_get_contents("php://input"));
$db = new Database();
$pertenece = new Pertenece($db->dbConnect());
//gets all public properies from the object and saves their names, conn MUST be private
$inputValidKeys = array_keys(get_object_vars($pertenece)); 
//builds the valid attributes of the object that were sent in the request; if they were not sent, assigns null
foreach ($inputValidKeys as $key) {
    $pertenece->{$key} = isset($input->$key) ? $input->$key : null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (empty($pertenece->)) {
            echo json_encode($pertenece->getAllPertenece());
            break;
        } else {
            echo json_encode($pertenece->getPertenece());
            break;
        }
    case 'POST':
        echo json_encode($pertenece->createPertenece());
        break;
    case 'PUT':
        echo json_encode($pertenece->updatePertenece());
        break;
    case 'PATCH':
        echo json_encode($pertenece->patchPertenece());
        break;
    case 'DELETE':
        echo json_encode($pertenece->deletePertenece());
        break;
    default:
        echo json_encode("unsupported method");
}
?>