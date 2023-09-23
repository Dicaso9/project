<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/backoffice.css">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <title>Backoffice</title>
</head>
<?php
require_once "../modelo/database.php";
$db = new Database();
$connection = $db->dbConnect();
?>

<body>
    <header>
        <img src="assets/imagenes/LogoA.png" class="logo">
        <h1>Backoffice</h1>
    </header>

    <main>
        <div class="container-div">
            <div class="paquete">
                <a href="paquete.php">Paquetes</a>
            </div>
            <div class="almacen">
                <a href="almacen.php">Almacenes</a>
            </div>
            <div class="camion">
                <a href="camion.php">Camiones</a>
            </div>
            <div class="camioneta">
                <a href="camioneta.php">Camionetas</a>
            </div>
            <div class="lote">
                <a href="lote.php">Lotes</a>
            </div>
            <div class="ruta">
                <a href="ruta.php">Rutas</a>
            </div>
            <div class="usuario">
                <a href="usuario.php">Usuarios</a>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; Carrion. Todos los derechos reservados.</p>
    </footer>
</body>

</html>