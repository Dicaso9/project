<?php
require_once "../database.php";
require_once "../jwt.php";
$db = new Database();
$conn = $db->dbConnect();
$input = json_decode(file_get_contents("php://input"));

$query = "SELECT passwd FROM usuario WHERE ci = ?";
$hash = implode(mysqli_fetch_assoc($conn->execute_query($query, [$input->ci])));
if (password_verify($input->passwd, $hash)) {
    $query = "SELECT COALESCE(
            CASE WHEN funcionario.ci IS NOT NULL THEN 'funcionario' END,
            CASE WHEN camionero.ci IS NOT NULL THEN 'camionero' END,
            CASE WHEN cliente.ci IS NOT NULL THEN 'cliente' END,
            'desconocido'
        ) AS subtipo FROM usuario 
        LEFT JOIN funcionario ON usuario.ci = funcionario.ci
        LEFT JOIN camionero ON usuario.ci = camionero.ci
        LEFT JOIN cliente ON usuario.ci = cliente.ci
        WHERE usuario.ci = ?;";
    $role = implode(mysqli_fetch_assoc($conn->execute_query($query, [$input->ci])));
    $headers = [
        "alg" => "HS256",
        "typ" => "JWT"
    ];
    $payload = [
        "sub" => $input->ci,
        "role" => $role,
        "iat" => time(),
        "exp" => time() + 60 * 30
    ];
    echo json_encode(jwtGenerate($headers, $payload));
} else
    echo json_encode(false);
?>