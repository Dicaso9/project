<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://localhost/project");
include_once '../modelo/ruta.php';
include_once '../modelo/database.php';
$db = new Database();
$ruta = new Ruta($db->dbConnect());
$data = json_decode(file_get_contents('php://input'));
if (isset($data->idRuta))
    $ruta->idRuta = $data->idRuta;
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ($ruta->idRuta) {
            echo json_encode($ruta->getruta());
        } else
            echo json_encode($ruta->getAllRuta());
        break;
    case 'POST':
        echo json_encode($ruta->createRuta());
        break;
    case 'PUT':
        echo json_encode($ruta->updateRuta());
        break;
    case 'PATCH':
        echo json_encode($ruta->patchRuta());
        break;
    case 'DELETE':
        echo json_encode($ruta->deleteRuta());
        break;
}


?>