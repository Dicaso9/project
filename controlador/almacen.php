<?php
session_start();
require_once "../database.php";
require_once "../modelo/almacenModelo.php";
$input = json_decode(file_get_contents("php://input"));
$db = new Database();
$almacen = new Almacen($db->dbConnect());
//gets all public properies from the object and saves their names, conn MUST be private
$inputValidKeys = array_keys(get_object_vars($almacen)); 
var_dump($inputValidKeys);
//builds the valid attributes of the object that were sent in the request; if they were not sent, assigns null
foreach ($inputValidKeys as $key) {
    $almacen->{$key} = isset($input->$key) ? $input->$key : null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (empty($almacen->idAlmacen)) {
            echo json_encode($almacen->getAllAlmacen());
            break;
        } else {
            echo json_encode($almacen->getAlmacen());
            break;
        }
    case 'POST':
        echo json_encode($almacen->createAlmacen());
        break;
    case 'PUT':
        echo json_encode($almacen->updateAlmacen());
        break;
    case 'PATCH':
        echo json_encode($almacen->patchAlmacen());
        break;
    case 'DELETE':
        echo json_encode($almacen->deleteAlmacen());
        break;
    default:
        echo json_encode("unsupported method");
}
?>