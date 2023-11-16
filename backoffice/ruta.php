<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/paginasBackoffice.css">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <title>Rutas</title>
</head>
<?php
require_once "../modelo/database.php";
$db = new Database();
$connection = $db->dbConnect();
if (isset($_POST["delete"])) {
    $connection->query("delete from ruta where idRuta='" . $_POST['idRuta'] . "';");
}
// if (isset($_POST["editConfirm"])) {
//      $connection->query("update lote set idAlmacen = " . ($_POST['idAlmacen'] ? "'" . $_POST['idAlmacen'] . "'" : 'NULL') . " where idLote = '" . $_POST['idLote'] . "';");
// }
if (isset($_POST["addConfirm"])) {
    $connection->query("INSERT INTO `ruta` (`idRuta`) VALUES ('" . $_POST['idRuta'] . "')");
}
$rutas = $connection->query("select * from ruta;")->fetch_all(MYSQLI_ASSOC);
?>

<body>
    <header>
        <img src="assets/imagenes/LogoA.png" class="logo">
        <h1>Rutas</h1>
    </header>
    <main>
        <div class="container-table">
            <table>
                <thead>
                    <th>Rutas</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($rutas as $ruta) {
                        echo "<tr>";
                        foreach ($ruta as $key => $value) {
                            if (isset($value)) {
                                echo "<td>" . $value . "</td>";
                            } else
                                echo "<td>" . "NULL" . "</td>";
                        }
                        echo "<form action='' method='post'>
                        <input type='hidden' name='idRuta' value='" . $ruta['idRuta'] . "'> 
                        <td><input type='submit' name='delete' value='delete'/></td></form>
                        <form action='editar.php' method='post'>
                        <input type='hidden' name='tipo' value='ruta'>
                        <input type='hidden' name='identificador' value='idRuta'>
                        <input type='hidden' name='idRuta' value='" . $ruta['idRuta'] . "'> 
                        <td><input type='submit' name='modify' value='modify'/></td></form>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <th>
                        <form action="añadir.php" method="post">
                            <input type="hidden" name="tipo" value="ruta">
                            <input type="submit" name="añadir" value="añadir">
                        </form>
                    </th>
                </tfoot>
            </table>
            <div class="container-button">
                <button class="añadir">Añadir</button> <button class="eliminar">Eliminar</button>
                <button class="editar">Editar</button>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; Carrion. Todos los derechos reservados.</p>
    </footer>
</body>

</html>