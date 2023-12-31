<?php
    require_once('../jwt.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/indexStyle.css">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <title>Carrion</title>
</head>

<body>
    <header>
        <img src="assets/imagenes/LogoA.png" class="logo">
        <h1>Carrion</h1>
        <nav>
            <ul>
                <li class="menu"><a href="">Home</a></li>
                <li class="menu"><a href="">Contacto</a></li>
                <li class="menu"><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>IDIOMA</h4>
        <a href="assets/pagIngles/principal.php" class="ingles"><img src="assets/imagenes/usa.png" alt=""></a>
        <a href="index.php" class="espanol"><img src="assets/imagenes/españa.png" alt=""></a>
    </div>
    <div id="article">
        <div class="info">
            <p id="slogan">Conectando rutas, uniendo destinos: la eficiencia al servicio de tu empresa.
                Nuestra aplicación te brinda una solución integral, desde la gestión logística hasta la
                optimización de rutas. Simplificamos tus operaciones y reducimos costos; confía en nosotros
                para impulsar tu negocio hacia el éxito. Juntos, llegaremos más lejos, más rápido y con la máxima
                confianza. <br> ¡Tu empresa merece la excelencia en cada kilómetro!</p>
            
        </div>
    </div>
    <a href="login.php" class="login-2"><p>Login</p></a>
    <footer>
        Copyright © 2023 Carrion. All Rights Reserved
    </footer>
</body>

</html>