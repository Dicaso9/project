<?php
    require_once('../jwt.php');
    require_once('../utils.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/camioneroStyle.css">
    <title>Camionero</title>
</head>
<body>
    <header>
        <img src="assets/imagenes/LogoA.png" class="logo">
        <h1>Camioneros</h1>
        <nav>
            <ul>
                <li><a href="#">Informacion</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>IDIOMA</h4>
        <a href="assets/pagIngles/truck-driver.php" class="ingles"><img src="assets/imagenes/usa.png" alt=""></a>
        <a href="camionero.php" class="espanol"><img src="assets/imagenes/españa.png" alt=""></a>
    </div>
    <div class="div-tabla">
    <table id="tabla-lote">
        <thead>
            <th colspan="4">Lotes</th>
        </thead>
        <tbody>
            <?php
            $data = json_decode(curlBuild("GET", "http://" . $_SERVER["HTTP_HOST"] . "/novapines/controlador/lote.php", []), true);
            foreach ($data as $key => $value) {
                echo '<tr class="tr-paquete">';
                echo "<td>".$value['idLote']."</td>";
                echo "<td>".$value['deCliente']."</td>";
                echo '<td><button class="button-paquete">Modificar</button></td>
                <td><button class="button-paquete">Borrar</button></td>';
                echo '</tr>';
            }
            ?>
            <!-- <tr>
                <td>Lote 1</td>
                <td>Ruta</td>
            </tr>
            <tr>
                <td>Lote 2</td>
                <td>Ruta</td>
            </tr>
            <tr>
                <td>Lote 3</td>
                <td>Ruta</td>
            </tr> -->
        </tbody>
    </table>
    <div class="link-ruta">
        <a href="ruta.php">Ver rutas</a>
    </div>
</div>

<footer>
    <p>&copy; Carrion. Todos los derechos reservados.</p>
</footer>
</body>
</html>