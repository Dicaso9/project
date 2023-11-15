<?php
session_start();
require_once "../database.php";
require_once "../modelo/funcionarioModelo.php";
$input = json_decode(file_get_contents("php://input"));
$db = new Database();
$funcionario = new Funcionario($db->dbConnect());
//gets all public properies from the object and saves their names, conn MUST be private
$inputValidKeys = array_keys(get_object_vars($funcionario)); 
//builds the valid attributes of the object that were sent in the request; if they were not sent, assigns null
foreach ($inputValidKeys as $key) {
    $funcionario->{$key} = isset($input->$key) ? $input->$key : null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (empty($funcionario->ci)) {
            echo json_encode($funcionario->getAllFuncionario());
            break;
        } else {
            echo json_encode($funcionario->getFuncionario());
            break;
        }
    case 'POST':
        echo json_encode($funcionario->createFuncionario());
        break;
    // case 'PUT':
    //     echo json_encode($funcionario->updateFuncionario());
    //     break;
    // case 'PATCH':
    //     echo json_encode($funcionario->patchFuncionario());
    //     break;
    case 'DELETE':
        echo json_encode($funcionario->deleteFuncionario());
        break;
    default:
        echo json_encode("unsupported method");
}
?>