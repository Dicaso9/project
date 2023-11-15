<?php
session_start();
require_once "../database.php";
require_once "../modelo/usuarioModelo.php";
$input = json_decode(file_get_contents("php://input"));
$db = new Database();
$usuario = new Usuario($db->dbConnect());
//gets all public properies from the object and saves their names, conn MUST be private
$inputValidKeys = array_keys(get_object_vars($usuario)); 
//builds the valid attributes of the object that were sent in the request; if they were not sent, assigns null
foreach ($inputValidKeys as $key) {
    $usuario->{$key} = isset($input->$key) ? $input->$key : null;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (empty($usuario->ci)) {
            echo json_encode($usuario->getAllUsuario());
            break;
        } else {
            echo json_encode($usuario->getUsuario());
            break;
        }
    case 'POST':
        echo json_encode($usuario->createUsuario());
        break;
    case 'PUT':
        echo json_encode($usuario->updateUsuario());
        break;
    case 'PATCH':
        echo json_encode($usuario->patchUsuario());
        break;
    case 'DELETE':
        echo json_encode($usuario->deleteUsuario());
        break;
    default:
        echo json_encode("unsupported method");
}
?>