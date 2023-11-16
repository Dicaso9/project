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
    <link rel="stylesheet" href="../vista/assets/css/funcionarioStyle.css">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <title>Lotes</title>
</head>
<body>
    <header>
        <img src="assets/imagenes/LogoA.png" class="logo">
        <h1>Lotes</h1>
        <nav>
            <ul>
                <li><a href="#">Informacion</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>IDIOMA</h4>
        <a href="assets/pagIngles/batches.php" class="ingles"><img src="assets/imagenes/usa.png" alt=""></a>
        <a href="lote.php" class="espanol"><img src="assets/imagenes/españa.png" alt=""></a>
    </div>
    <div class="div-tabla">
        <table>
            <thead>
                <th colspan="4">Lotes existentes</th>
            </thead>
            <tbody>
                <tr class="tr-paquete">
                    <td>idLote</td>
                    <td>deCliente</td>
                    <td>modificar</td>
                    <td>borrar</td>
                </tr>
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
                <!-- <tr class="tr-paquete">
                    <td>Lote 1</td>
                    <td><button class="button-paquete">Modificar</button></td>
                    <td><button class="button-paquete">Borrar</button></td>
                </tr> -->
            </tbody>
        </table>
        <div class="botones-lotes">
        <button class="button-paquete">Crear</button>
        <button class="button-paquete">Asignar Camion</button>
    </div>
    </div>

    <footer>
        <p>&copy; Carrion. Todos los derechos reservados.</p>
    </footer>
</body>
</html>