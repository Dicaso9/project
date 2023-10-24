<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://localhost/project");
include_once '../modelo/lote.php';
include_once '../modelo/database.php';
$db = new Database();
$lote = new Lote($db->dbConnect());
$data = json_decode(file_get_contents('php://input'));
if (isset($data->idLote))
    $lote->idLote = $data->idLote;
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ($lote->idLote) {
            echo json_encode($lote->getLote());
        } else
            echo json_encode($lote->getAllLote());
        break;
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
}


?>