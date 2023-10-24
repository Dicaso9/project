<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://localhost/project");
include_once '../modelo/paquete.php';
include_once '../modelo/database.php';
$db = new Database();
$paquete = new Paquete($db->dbConnect());
$data = json_decode(file_get_contents('php://input'));
if (isset($data->idPaquete))
    $paquete->idPaquete = $data->idPaquete;
if (isset($data->matricula))
    $paquete->matricula = $data->matricula;
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ($paquete->idPaquete) {
            echo json_encode($paquete->getPaquete());
        } else
            echo json_encode($paquete->getAllPaquete());
        break;
    case 'POST':
        echo json_encode($paquete->createPaquete());
        break;
    case 'PUT':
        echo json_encode($paquete->updatePaquete());
        break;
    case 'PATCH':
        echo json_encode($paquete->patchPaquete());
        break;
    case 'DELETE':
        echo json_encode($paquete->deletePaquete());
        break;
}


?>