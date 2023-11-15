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
    <title>Packages</title>
</head>
<body>
    <header>
        <img src="../imagenes/LogoA.png" class="logo">
        <h1>Packages</h1>
        <nav>
            <ul>
                <li><a href="#">Information</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>LANGUAGE</h4>
        <a href="package.php" class="ingles"><img src="../imagenes/usa.png" alt=""></a>
        <a href="../../paquete.php" class="espanol"><img src="../imagenes/españa.png" alt=""></a>
    </div>
    <div class="div-tabla">
        <table>
            <thead>
                <th colspan="3">Existing packages</th>
            </thead>
            <tbody>
                <tr class="tr-paquete">
                    <td>Package 1</td>
                    <td><button class="button-paquete">Modify</button></td>
                    <td><button class="button-paquete">Delete</button></td>
                </tr>
                <tr class="tr-paquete">
                    <td>Package 2</td>
                    <td><button class="button-paquete">Modify</button></td>
                    <td><button class="button-paquete">Delete</button></td>
                </tr>
                <tr class="tr-paquete">
                    <td>Package 3</td>
                    <td><button class="button-paquete">Modify</button></td>
                    <td><button class="button-paquete">Delete</button></td>
                </tr>
            </tbody>
        </table>
        <div class="botones">
        <button class="button-paquete">Create</button>
        <button class="button-paquete">Assign batche</button>
        <button class="button-paquete">Assign PickUp</button>
    </div>
    </div>
    <footer>    
        <p>&copy; Carrion. All rights reserved.</p>
    </footer>
</body>
</html>