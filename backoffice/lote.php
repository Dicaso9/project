<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/paginasBackoffice.css">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <title>Lotes</title>
</head>
<?php
require_once "../modelo/database.php";
$db = new Database();
$connection = $db->dbConnect();
if (isset($_POST["delete"])) {
    $connection->query("delete from lote where idLote='" . $_POST['idLote'] . "';");
}
if (isset($_POST["editConfirm"])) {
    $connection->query("update lote set idAlmacen = " . ($_POST['idAlmacen'] ? "'" . $_POST['idAlmacen'] . "'" : 'NULL') . " where idLote = '" . $_POST['idLote'] . "';");
}
if (isset($_POST["addConfirm"])) {
    $connection->query("INSERT INTO `lote` (`idLote`, `deCliente`, `idAlmacen`) VALUES ('" . $_POST['idLote'] . "','". $_POST['deCliente']."',".($_POST['idAlmacen'] ? "'" . $_POST['idAlmacen'] . "'" : 'NULL').");");
}
$lotes = $connection->query("select * from lote;")->fetch_all(MYSQLI_ASSOC);
?>

<body>
    <header>
        <img src="assets/imagenes/LogoA.png" class="logo">
        <h1>Lotes</h1>
    </header>
    <main>
        <div class="container-table">
            <table>
                <thead>
                    <th>Lotes</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($lotes as $lote) {
                        echo "<tr>";
                        foreach ($lote as $key => $value) {
                            if (isset($value)) {
                                echo "<td>" . $value . "</td>";
                            } else
                                echo "<td>" . "NULL" . "</td>";
                        }
                        echo "<form action='' method='post'>
                        <input type='hidden' name='idLote' value='" . $lote['idLote'] . "'> 
                        <td><input type='submit' name='delete' value='delete'/></td></form>
                        
                        <form action='editar.php' method='post'>
                        <input type='hidden' name='tipo' value='lote'>
                        <input type='hidden' name='identificador' value='idLote'>
                        <input type='hidden' name='idLote' value='" . $lote['idLote'] . "'> 
                        <td><input type='submit' name='modify' value='modify'/></td></form>";
                        echo "</tr>";

                    }
                    ?>
                </tbody>
                <tfoot>
                    <th>
                        <form action="añadir.php" method="post">
                            <input type="hidden" name="tipo" value="lote">
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