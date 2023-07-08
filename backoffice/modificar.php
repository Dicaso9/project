<?php
if ($_SERVER['REQUEST_METHOD'] = "GET") {
    $email = $_GET['email'];
    echo
        "<form action='' method='POST'>
    <input type='hidden' name='email' value='" . $email . "'>
    <input type='text' name='password'>
    <input type='text' name='firstName'>
    <input type='text' name='lastName'>
    <input type='text' name='type'>
    <input type='submit'>
    </form>";
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] = "POST") {
    include_once '../class/database.php';
    $db = new Database();
    $dbConn = $db->dbConnect();
    $email = $_GET['email'];
    $password = $_GET['password'];
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $type = $_GET['type'];
    $hashPassword = password_hash($password, PASSWORD_BCRYPT);
    $query = "UPDATE user SET password = ?, firstName = ?, lastName = ?, type = ? WHERE email = ?";
    $dbConn->execute_query($query, [$hashPassword, $firstName, $lastName, $type, $email]);
    header('Location: backoffice.php');
}
?>