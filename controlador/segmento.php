<?php
session_start();
require_once "../database.php";
require_once "../modelo/segmentoModelo.php";
$input = json_decode(file_get_contents("php://input"));
$db = new Database();
$segmento = new Segmento($db->dbConnect());
//gets all public properies from the object and saves their names, conn MUST be private
$inputValidKeys = array_keys(get_object_vars($segmento)); 
//builds the valid attributes of the object that were sent in the request; if they were not sent, assigns null
foreach ($inputValidKeys as $key) {
    $segmento->{$key} = isset($input->$key) ? $input->$key : null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (empty($segmento->idTrayecto) || empty($segmento->idAlmacen)) {
            echo json_encode($segmento->getAllSegmento());
            break;
        } else {
            echo json_encode($segmento->getSegmento());
            break;
        }
    case 'POST':
        echo json_encode($segmento->createSegmento());
        break;
    case 'PUT':
        echo json_encode($segmento->updateSegmento());
        break;
    case 'PATCH':
        echo json_encode($segmento->patchSegmento());
        break;
    case 'DELETE':
        echo json_encode($segmento->deleteSegmento());
        break;
    default:
        echo json_encode("unsupported method");
}
?>