<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/paginasBackoffice.css">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <title>Document</title>
</head>
<!--  -->
<?php
require_once "../modelo/database.php";
$db = new Database();
$connection = $db->dbConnect();
$columnas = $connection->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '" . $_POST['tipo'] . "';")->fetch_all(MYSQLI_ASSOC);

?>
<!--  -->

<body>
    <header>

    </header>
    <main>
        <?php echo "<form action='" . $_SERVER["HTTP_REFERER"] . "' method='post'>";
        ?>
            <table>
                <!--  -->
                <?php
                foreach ($columnas as $columna) {
                    echo "<tr>";
                    foreach ($columna as $key => $value) {
                        echo "<td>$value</td>";
                        echo "<td><input type='text' name='$value'></td>";
                    }
                    echo "</tr>";
                }
                echo "</table><input type='submit' name='addConfirm' value='confirmar'/></form>";
        echo "<form action='" . $_SERVER["HTTP_REFERER"] . "' method='post'><input type='submit' name='cancelar' value='cancelar'/></form>"
                ?>
                <!--  -->
            </table>
        </form>
    </main>
    <footer>

    </footer>
</body>