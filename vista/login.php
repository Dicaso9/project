<?php
session_start();
require_once('../utils.php');
require_once('../jwt.php');
var_dump($_POST);
echo "<br>";
if (isset($_POST['login'])) {
    $method = "POST";
    $url = "http://" . $_SERVER["HTTP_HOST"] . "/novapines/controlador/login.php";
    $data = array(
        'ci' => $_POST['ci'],
        'passwd' => $_POST['passwd']
    );

    // echo $url;
    // echo "<br>";
    // $response = curlBuild("post",$url, $data);
    // var_dump($response);
    $response = json_decode(curlBuild($method, $url, $data));
    echo $response;
    if ($response) {
        $role = jwtGetPayload($response, "role");
        $_SESSION['jwt'] = $response;
        switch ($role) {
            case "camionero":
                header('Location: camionero.php');
                die();
            case "funcionario":
                header('Location: funcionario.php');
                die();
            case "cliente":
                header('Location: cliente.php');
                die();
            default:
                echo "usuario invalido";
        }
    } else {
        echo "Datos invalidos";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/loginStyle.css">
    <title>Login</title>
</head>

<body>
    <div class="box">
        <img src="assets/imagenes/LogoA.png">
        <h1>Log in</h1>
        <form action="login.php" method="post">
            Cedula: <br> <input type="text" name="ci" class="correo"><br><br>
            Contraseña: <br><input type="password" name="passwd" class="contraseña"><br><br>
            <input type="submit" name="login" value="login" class="Log-in">
        </form>
    </div>
</body>

</html>