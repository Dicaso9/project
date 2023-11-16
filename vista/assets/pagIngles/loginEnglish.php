<?php
    require_once('../../../jwt.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagenes/LogoA.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/loginStyle.css">
    <title>Login</title>
</head>
<body>
    <div class="box">
        <img src="../imagenes/LogoA.png">
    <h1>Log in</h1>
    <form action="pag2.php" method="post">
        E-mail: <br> <input type="text" name="correo" class="correo"><br><br>
        Password: <br><input type="password" name="contraseña" class="contraseña"><br><br>
        <input type="submit" value="Log in" class="Log-in">
    </form>
</div>
</body>
</html>