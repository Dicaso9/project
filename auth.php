<?php
session_start();
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: http://localhost/project");
include_once 'class/database.php';
include_once 'class/user.php';
$db = new Database();
$dbConn = $db->dbConnect();
$user = new User($dbConn);
$data = json_decode(file_get_contents("php://input"));
$action = $data->action;
$user->email = $data->email;
$user->firstName = $data->firstName;
$user->lastName = $data->lastName;
$user->password = $data->password;
$user->type = $data->type;

switch ($action) {
    case "register":
        if (isset($user->email) && isset($user->firstName) && isset($user->lastName) && isset($user->password)) {
            if ($user->register()) {
                echo json_encode(array("message" => "User was created."));
            } else
                echo json_encode(array("message" => "Unable to create user."));
        } else
            echo json_encode(array("message" => "insufficient values."));
        break;
    case "login":
        if (isset($user->email) && isset($user->password)) {
            if ($user->login()) {
                echo json_encode(array("message" => "User logged in."));
                echo $_SESSION["type"];
            } else
                echo json_encode(array("message" => "Unable to log in user."));
        } else
            echo json_encode(array("message" => "insufficient values."));
        break;
    case "logout":
        $user->logout();
        break;

}
?>