<?php
    require_once('../../../jwt.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagenes/LogoA.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/camioneroStyle.css">
    <title>Truck Driver</title>
</head>
<body>
    <header>
        <img src="../imagenes/LogoA.png" class="logo">
        <h1>Truck Drivers</h1>
        <nav>
            <ul>
                <li><a href="#">Information</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>LANGUAGE</h4>
        <a href="truck-driver.php" class="ingles"><img src="../imagenes/usa.png" alt=""></a>
        <a href="../../camionero.php" class="espanol"><img src="../imagenes/españa.png" alt=""></a>
    </div>
    <div class="div-tabla">
    <table id="tabla-lote">
        <thead>
            <th colspan="2">Batches</th>
        </thead>
        <tbody>
            <tr>
                <td>Batche 1</td>
                <td>Route</td>
            </tr>
            <tr>
                <td>Batche 2</td>
                <td>Route</td>
            </tr>
            <tr>
                <td>Batche 3</td>
                <td>Route</td>
            </tr>
        </tbody>
    </table>
    <div class="link-ruta">
        <a href="routes.php">See routes</a>
    </div>
</div>

<footer>
    <p>&copy; Carrion. All rights reserved.</p>
</footer>
</body>
</html>