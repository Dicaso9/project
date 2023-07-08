<?php
header("Content-Type: application/json");
//header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: http://localhost/project");
include_once 'class/package.php';
include_once 'class/database.php';
$db = new Database();
$dbConn = $db->dbConnect();
$package = new Package($dbConn);
$data = json_decode(file_get_contents('php://input'));
if (isset($data->idPackage))
    $package->idPackage = $data->idPackage;
if (isset($data->name))
    $package->name = $data->name;
if (isset($data->idBatch))
    $package->idBatch = $data->idBatch;
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ($package->idPackage) {
            echo json_encode($package->getPackage());
        } else
            echo json_encode($package->getAllPackage());
        break;
    case 'POST':
        echo json_encode($package->createPackage());
        break;
    case 'PUT':
        echo json_encode($package->updatePackage());
        break;
    case 'PATCH':
        echo json_encode($package->patchPackage());
        break;
    case 'DELETE':
        echo json_encode($package->deletePackage());
        break;
}


?>