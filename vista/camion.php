<?php
require_once('../jwt.php');
require_once('../utils.php');
session_start();
if (jwtGetPayload($_SESSION['jwt'], "role") != "funcionario")
    header("login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <link rel="stylesheet" href="../vista/assets/css/funcionarioStyle.css">
    <title>Camión</title>
</head>

<body>
    <header>
        <img src="assets/imagenes/LogoA.png" class="logo">
        <h1>Camiones</h1>
        <nav>
            <ul>
                <li><a href="#">Informacion</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>IDIOMA</h4>
        <a href="assets/pagIngles/truck.php" class="ingles"><img src="assets/imagenes/usa.png" alt=""></a>
        <a href="camion.php" class="espanol"><img src="assets/imagenes/españa.png" alt=""></a>
    </div>
    <div class="div-tabla">
        <table>
            <thead>
                <th colspan="2">Camiones</th>
            </thead>
            <tbody>
                <tr class="tr-camion">
                    <td>matricula</td>
                </tr>
                <?php
                $data = json_decode(curlBuild("GET", "http://" . $_SERVER["HTTP_HOST"] . "/novapines/controlador/camion.php", []), true);
                foreach ($data as $key => $value) {
                    echo '<tr class="tr-camion">';
                    echo "<td>".$value['matricula']."</td>";
                    echo '</tr>';
                }
                ?>
                <!-- <tr class="tr-camion">
                    <td>Matricula Camion 1</td>
                    <td>STP 2782</td>
                </tr>
                <tr class="tr-camion">
                    <td>Matricula Camion 2</td>
                    <td>STP 8765</td>
                </tr>
                <tr class="tr-camion">
                    <td>Matricula Camion 3</td>
                    <td>STP 9076</td>
                </tr> -->
            </tbody>
        </table>
        <div class="botones">
            <button class="button-camion2"><a href="asignarLoteCamion.php">Asignar Lote</a></button>
            <button class="button-camion2">Cambiar Estado</button>
        </div>
    </div>
    <div class="div-formulario">
        <h2>Ver estado con respecto al almacén</h2>
        <form action="pag2.php" method="post">
            <input type="radio" name="radio" value="salida" class="salida"> Salida <br>
            <input type="radio" name="radio" value="llegada" class="llegada"> Llegada
            <br>
            <input type="submit" value="Enviar" class="boton">
        </form>
    </div>

    <footer>
        <p>&copy; Carrion. Todos los derechos reservados.</p>
    </footer>
    </div>

</body>

</html>