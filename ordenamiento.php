<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: http://localhost/project");
include_once 'class/package.php';
include_once 'class/database.php';
$db = new Database();
$dbConn = $db->dbConnect();
$package = new Package($dbConn);
$data = json_decode(file_get_contents('php://input'));
if($data->idPackage) $package->idPackage = $data->idPackage;
if($data->name) $package->name = $data->name;
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ($package->idPackage) {
            echo $package->getPackage();
        } else
            echo $package->getAllPackage();
        return;
    case 'POST':
        echo $package->createPackage();
        return;
    case 'PUT':
        echo $package->updatePackage();
        return;
    case 'DELETE':
        echo $package->deletePackage();
        return;
}


?>