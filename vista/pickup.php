<?php
    require_once('../jwt.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vista/assets/css/funcionarioStyle.css">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <title>Pickups</title>
</head>
<body>
    <header>
        <img src="assets/imagenes/LogoA.png" class="logo">
        <h1>PickUp</h1>
        <nav>
            <ul>
                <li><a href="#">Informacion</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>IDIOMA</h4>
        <a href="assets/pagIngles/pickupEnglish.php" class="ingles"><img src="assets/imagenes/usa.png" alt=""></a>
        <a href="pickup.php" class="espanol"><img src="assets/imagenes/españa.png" alt=""></a>
    </div>
    <div class="div-tabla">
        <table>
            <thead>
                <th colspan="2">PickUp's</th>
            </thead>
            <tbody>
                <tr class="tr-camion">
                    <td>Matricula Pickup 1</td>
                    <td>STP 7272</td>
                </tr>
                <tr class="tr-camion">
                    <td>Matricula Pickup 2</td>
                    <td>STP 1252</td>
                </tr>
                <tr class="tr-camion">
                    <td>Matricula Pickup 3</td>
                    <td>STP 3843</td>
                </tr>
            </tbody>
        </table>
        <div class="boton-pickup">
            <button class="button-paquete">Asignar Paquetes</button>
        </div>
</div>

    <footer>
        <p>&copy; Carrion. Todos los derechos reservados.</p>
    </footer>
</body>
</html>