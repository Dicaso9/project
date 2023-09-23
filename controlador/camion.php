<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://localhost/project");
include_once '../modelo/camion.php';
include_once '../modelo/database.php';
$db = new Database();
$camion = new Camion($db->dbConnect());
$data = json_decode(file_get_contents('php://input'));
if (isset($data->matricula))
    $camion->matricula = $data->matricula;
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ($camion->matricula) {
            echo json_encode($camion->getCamion());
        } else
            echo json_encode($camion->getAllCamion());
        break;
    case 'POST':
        echo json_encode($camion->createCamion());
        break;
    case 'PUT':
        echo json_encode($camion->updateCamion());
        break;
    case 'PATCH':
        echo json_encode($camion->patchCamion());
        break;
    case 'DELETE':
        echo json_encode($camion->deleteCamion());
        break;
}


?>