<?php
    require_once('../jwt.php');
    session_start();
    // echo $_SESSION['jwt'];
    // if (jwtGetPayload($_SESSION['jwt'], "role") != "funcionario" || jwtValidate($_SESSION['jwt'])) header("location: login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/funcionarioStyle.css">
    <title>Funcionarios</title>
</head>
<body>
    <header>
        <img src="assets/imagenes/LogoA.png" class="logo">
        <h1>Funcionarios</h1>
        <nav>
            <ul>
                <li><a href="#">Informacion</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>IDIOMA</h4>
        <a href="assets/pagIngles/official.php" class="ingles"><img src="assets/imagenes/usa.png" alt=""></a>
        <a href="funcionario.php" class="espanol"><img src="assets/imagenes/españa.png" alt=""></a>
    </div>
    <h2 class="h2-funcionario">Administrar</h2>
    <div class="div-general">
        <div class="box-lote">
            <a href="lote.php" class="lote"><p>Lote</p></a>
        </div>
        <div class="box-camion">
            <a href="camion.php" class="camion"><p>Camion</p></a>
        </div>
        <div class="box-paquete">
            <a href="paquete.php" class="paquete"><p>Paquete</p></a>
        </div>
        <div class="box-pickup">
            <a href="pickup.php" class="pickup"><p>Pickup</p></a>
        </div>
    </div>
    <footer>
        <p>&copy; Carrion. Todos los derechos reservados.</p>
    </footer>
</body>
</html>