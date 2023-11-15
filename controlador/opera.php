<?php
session_start();
require_once "../database.php";
require_once "../modelo/operaModelo.php";
$input = json_decode(file_get_contents("php://input"));
$db = new Database();
$opera = new Opera($db->dbConnect());
//gets all public properies from the object and saves their names, conn MUST be private
$inputValidKeys = array_keys(get_object_vars($opera)); 
//builds the valid attributes of the object that were sent in the request; if they were not sent, assigns null
foreach ($inputValidKeys as $key) {
    $opera->{$key} = isset($input->$key) ? $input->$key : null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (empty($opera->ci) || empty($opera->idAlmacen)) {
            echo json_encode($opera->getAllOpera());
            break;
        } else {
            echo json_encode($opera->getOpera());
            break;
        }
    case 'POST':
        echo json_encode($opera->createOpera());
        break;
    // case 'PUT':
    //     echo json_encode($opera->updateOpera());
    //     break;
    // case 'PATCH':
    //     echo json_encode($opera->patchOpera());
    //     break;
    case 'DELETE':
        echo json_encode($opera->deleteOpera());
        break;
    default:
        echo json_encode("unsupported method");
}
?>