<?php
    require_once('../jwt.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/nuevoPedido.css">
    <title>Informacion pedido</title>
</head>
<body>
    <header>
        <img src="assets/imagenes/LogoA.png" class="logo">
        <h1>Clientes</h1>
        <nav>
            <ul>
                <li><a href="#">Informacion</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <form action="procesarInformacion-pedido.php" method="post">
        <label for="destino">Destino: </label><br>
        <input type="text" name="destino" id="destino"><br>
        <label for="contacto">Contacto: </label><br>
        <input type="text" name="contacto" id="contacto"><br>
        <label for="peso">Peso(Kg): </label><br>
        <input type="text" name="peso" id="peso"><br>

        <input type="submit" value="Confirmar Datos">
    </form>
</body>
</html>