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
    <title>Paquetes</title>
</head>
<body>
    <header>
        <img src="assets/imagenes/LogoA.png" class="logo">
        <h1>Paquetes</h1>
        <nav>
            <ul>
                <li><a href="#">Informacion</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>IDIOMA</h4>
        <a href="assets/pagIngles/package.php" class="ingles"><img src="assets/imagenes/usa.png" alt=""></a>
        <a href="paquete.php" class="espanol"><img src="assets/imagenes/españa.png" alt=""></a>
    </div>
    <div class="div-tabla">
        <table>
            <thead>
                <th colspan="6">Paquetes existentes</th>
            </thead>
            <tbody>
                <tr class="tr-paquete">
                    <td>idPaquete</td>
                    <td>destino</td>
                    <td>peso</td>
                    <td>contactoDestino</td>
                    <td>estado</td>
                    <td>ci</td>
                </tr>
            <?php
                $data = json_decode(curlBuild("GET", "http://" . $_SERVER["HTTP_HOST"] . "/novapines/controlador/paquete.php", []), true);
                foreach ($data as $key => $value) {
                    echo '<tr class="tr-paquete">';
                    echo "<td>".$value['idPaquete']."</td>";
                    echo "<td>".$value['destino']."</td>";
                    echo "<td>".$value['peso']."</td>";
                    echo "<td>".$value['contactoDestino']."</td>";
                    echo "<td>".$value['estado']."</td>";
                    echo "<td>".$value['ci']."</td>";
                    echo '</tr>';
                }
                ?>
                <!-- <tr class="tr-paquete">
                    <td>Paquete 1</td>
                    <td><button class="button-paquete">Modificar</button></td>
                    <td><button class="button-paquete">Borrar</button></td>
                </tr>
                <tr class="tr-paquete">
                    <td>Paquete 2</td>
                    <td><button class="button-paquete">Modificar</button></td>
                    <td><button class="button-paquete">Borrar</button></td>
                </tr>
                <tr class="tr-paquete">
                    <td>Paquete 3</td>
                    <td><button class="button-paquete">Modificar</button></td>
                    <td><button class="button-paquete">Borrar</button></td>
                </tr> -->
            </tbody>
        </table>
        <div class="botones">
        <button class="button-paquete">Crear</button>
        <button class="button-paquete">Asignar Lote</button>
        <button class="button-paquete">Asignar PickUp</button>
    </div>
    </div>

    <footer>
        <p>&copy; Carrion. Todos los derechos reservados.</p>
    </footer>
</body>
</html>