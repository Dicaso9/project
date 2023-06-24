<?php
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
$user->firstname = $data->firstname;
$user->lastname = $data->lastname;
$user->password = $data->password;
if (isset($user->email) && isset($user->firstname) && isset($user->lastname) && isset($user->password)) {
    $user->create();
    echo json_encode(array("message" => "User was created."));
} else {
    echo json_encode(array("message" => "Unable to create user."));
}
?>