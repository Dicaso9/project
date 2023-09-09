<?php
session_start();
// api config
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: http://localhost/project");
// llamado de clases y creacion de objetos
include_once 'class/database.php';
include_once 'class/user.php';
$db = new Database();
$dbConn = $db->dbConnect();
$user = new User($dbConn);

//entra los datos ingresados a la api a el objeto user y guarda la accion solicitada en una variable
$data = json_decode(file_get_contents("php://input"));
if(isset($data->action))
$action = $data->action;
if(isset($data->email))
$user->email = $data->email;
if(isset($data->firstName))
$user->firstName = $data->firstName;
if(isset($data->lastName))
$user->lastName = $data->lastName;
if(isset($data->password))
$user->password = $data->password;
if(isset($data->type))
$user->type = $data->type;

switch ($action) { // segun la accion solicitada se ejecuta un metodo de la clase usuario
    case "register": // analiza las entradas necesarias y registra al objeto usuario en la base de datos
        if (isset($user->email) && isset($user->firstName) && isset($user->lastName) && isset($user->password) && isset($user->type)) {
            if ($user->register()) {
                echo json_encode(array("message" => "User was created."));
            } else
                echo json_encode(array("message" => "Unable to create user."));
        } else
            echo json_encode(array("message" => "insufficient values."));
        break;
    case "login": // analiza las entradas necesarias y loguea al usuario mediante una _SESSION
        if (isset($user->email) && isset($user->password)) {
            if ($user->login()) {
                echo json_encode(array("message" => "User logged in."));
                echo $_SESSION["type"];
            } else
                echo json_encode(array("message" => "Unable to log in user."));
        } else
            echo json_encode(array("message" => "insufficient values."));
        break;
    case "logout": // borra los valores en la _SESSION borrando los datos de logueo de usuario
        $user->logout();
        break;

}
?>