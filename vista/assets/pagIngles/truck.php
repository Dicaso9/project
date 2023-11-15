<?php
    require_once('../jwt.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/funcionarioStyle.css">
    <title>Trucks</title>
</head>
<body>
    <header>
        <img src="../imagenes/LogoA.png" class="logo">
        <h1>Trucks</h1>
        <nav>
            <ul>
                <li><a href="#">
                Information</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>LANGUAGE</h4>
        <a href="truck.php" class="ingles"><img src="../imagenes/usa.png" alt=""></a>
        <a href="../../camion.php" class="espanol"><img src="../imagenes/españa.png" alt=""></a>
    </div>
    <div class="div-tabla">
        <table>
            <thead>
                <th colspan="2">Trucks</th>
            </thead>
            <tbody>
                <tr class="tr-camion">
                    <td>Truck Registration 1</td>
                    <td>SBX 2782</td>
                </tr>
                <tr class="tr-camion">
                    <td>Truck Registration 2</td>
                    <td>ABK 8765</td>
                </tr>
                <tr class="tr-camion">
                    <td>Truck Registration 3</td>
                    <td>SBA 9076</td>
                </tr>
            </tbody>
        </table>
        <div class="botones">
            <button class="button-camion2">
            Assign Batch</button>
            <button class="button-camion2">Change Status</button>
        </div>
</div>
<div class="div-formulario">
    <h2>View status regarding warehouse</h2>
    <form action="pag2.php" method="post">
        <input type="radio" name="radio" value="salida" class="salida"> Exit <br>
        <input type="radio" name="radio" value="llegada" class="llegada"> Arrival
        <br>
        <input type="submit" value="Send" class="boton">
    </form>
</div>

    <footer>
        <p>&copy; Carrion. All rights reserved.</p>
    </footer>
</body>
</html>