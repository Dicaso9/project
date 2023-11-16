<?php
    require_once('../../../jwt.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/funcionarioStyle.css">
    <title>Batches</title>
</head>
<body>
    <header>
        <img src="../imagenes/LogoA.png" class="logo">
        <h1>Lotes</h1>
        <nav>
            <ul>
                <li><a href="#">Information</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>LANGUAGE</h4>
        <a href="batches.php" class="ingles"><img src="../imagenes/usa.png" alt=""></a>
        <a href="../../lote.php" class="espanol"><img src="../imagenes/españa.png" alt=""></a>
    </div>
    <div class="div-tabla">
        <table>
            <thead>
                <th colspan="3">Existing batches</th>
            </thead>
            <tbody>
                <tr class="tr-paquete">
                    <td>Batche 1</td>
                    <td><button class="button-paquete">Modify</button></td>
                    <td><button class="button-paquete">Delete</button></td>
                </tr>
            </tbody>
        </table>
        <div class="botones-lotes">
        <button class="button-paquete">Create</button>
        <button class="button-paquete">Assign truck</button>
    </div>
    </div>

    <footer>
        <p>&copy; Carrion. All rights reserved.</p>
    </footer>
</body>
</html>