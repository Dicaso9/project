<?php
session_start();
require_once "../database.php";
require_once "../modelo/conduceModelo.php";
$input = json_decode(file_get_contents("php://input"));
$db = new Database();
$conduce = new Conduce($db->dbConnect());
//gets all public properies from the object and saves their names, conn MUST be private
$inputValidKeys = array_keys(get_object_vars($conduce)); 
//builds the valid attributes of the object that were sent in the request; if they were not sent, assigns null
foreach ($inputValidKeys as $key) {
    $conduce->{$key} = isset($input->$key) ? $input->$key : null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (empty($conduce->ci) || empty($conduce->matricula)) {
            echo json_encode($conduce->getAllConduce());
            break;
        } else {
            echo json_encode($conduce->getConduce());
            break;
        }
    case 'POST':
        echo json_encode($conduce->createConduce());
        break;
    case 'PUT':
        echo json_encode($conduce->updateConduce());
        break;
    case 'PATCH':
        echo json_encode($conduce->patchConduce());
        break;
    case 'DELETE':
        echo json_encode($conduce->deleteConduce());
        break;
    default:
        echo json_encode("unsupported method");
}
?>