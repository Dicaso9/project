<?php
include_once '../class/database.php';
$db = new Database();
$dbConn = $db->dbConnect();
$email = $_GET['email'];
$query = "DELETE FROM user WHERE email = ?";
$dbConn->execute_query($query,[$email]);
header('Location: backoffice.php');
?>