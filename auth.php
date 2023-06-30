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
$user->email = $data->email;
$user->firstName = $data->firstName;
$user->lastName = $data->lastName;
$user->password = $data->password;
$user->type = $data->type;

if (isset($user->email) && isset($user->firstName) && isset($user->lastName) && isset($user->password)) {
    if($user->register()){
        echo json_encode(array("message" => "User was created."));
    }else echo json_encode(array("message" => "Unable to create user."));
}
    $user->login()
?>