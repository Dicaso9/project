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
    <link rel="stylesheet" href="../css/funcionarioStyle.css">
    <title>Officials</title>
</head>
<body>
    <header>
        <img src="../imagenes/LogoA.png" class="logo">
        <h1>Officials</h1>
        <nav>
            <ul>
                <li><a href="#">Information</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>LANGUAGE</h4>
        <a href="official.php" class="ingles"><img src="../imagenes/usa.png" alt=""></a>
        <a href="../../funcionario.php" class="espanol"><img src="../imagenes/españa.png" alt=""></a>
    </div>
    <h2 class="h2-funcionario">Manage</h2>
    <div class="div-general">
        <div class="box-lote">
            <a href="batches.php" class="lote"><p>Batches</p></a>
        </div>
        <div class="box-camion">
            <a href="truck.php" class="camion"><p>Truck</p></a>
        </div>
        <div class="box-paquete">
            <a href="package.php" class="paquete"><p>Package</p></a>
        </div>
        <div class="box-pickup">
            <a href="pickupEnglish.php" class="pickup"><p>Pickup</p></a>
        </div>
    </div>
    <footer>
        <p>&copy; Carrion. All Rights Reserved.</p>
    </footer>
</body>
</html>