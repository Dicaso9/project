<?php
session_start();
require_once "../database.php";
require_once "../modelo/loteModelo.php";
$input = json_decode(file_get_contents("php://input"));
$db = new Database();
$lote = new Lote($db->dbConnect());
//gets all public properies from the object and saves their names, conn MUST be private
$inputValidKeys = array_keys(get_object_vars($lote)); 
//builds the valid attributes of the object that were sent in the request; if they were not sent, assigns null
foreach ($inputValidKeys as $key) {
    $lote->{$key} = isset($input->$key) ? $input->$key : null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (empty($lote->idLote)) {
            echo json_encode($lote->getAllLote());
            break;
        } else {
            echo json_encode($lote->getLote());
            break;
        }
    case 'POST':
        echo json_encode($lote->createLote());
        break;
    case 'PUT':
        echo json_encode($lote->updateLote());
        break;
    case 'PATCH':
        echo json_encode($lote->patchLote());
        break;
    case 'DELETE':
        echo json_encode($lote->deleteLote());
        break;
    default:
        echo json_encode("unsupported method");
}
?>