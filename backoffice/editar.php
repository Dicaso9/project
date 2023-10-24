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
?>
<!--  -->

<body>
    <header>

    </header>
    <main>

        <?php
        // echo $_SERVER["HTTP_REFERER"];
        //  var_dump($_POST);
        // echo "select * from " . $_POST["tipo"] . " where " . $_POST["identificador"] . "='" . $_POST[$_POST["identificador"]] . "';";
        $objeto = $connection->query("select * from " . $_POST["tipo"] . " where " . $_POST["identificador"] . "='" . $_POST[$_POST["identificador"]] . "';")->fetch_object();
        // var_dump($objeto);
        echo "<form action='" . $_SERVER["HTTP_REFERER"] . "' method='post'><table>";
        foreach ($objeto as $key => $value) {
            echo "<tr>";
            echo "<td>$key</td>";
            echo "<td>$value</td>";
            if ($key !== $_POST["identificador"]) {
                echo "<td> <input type='text' name='$key'>";
            } else
                echo "<input type='hidden' name='$key' value='$value'>";
            echo "</tr>";
        }
        echo "</table><input type='submit' name='editConfirm' value='confirmar'/></form>";
        echo "<form action='" . $_SERVER["HTTP_REFERER"] . "' method='post'><input type='submit' name='cancelar' value='cancelar'/></form>"
            ?>
    </main>
    <footer>

    </footer>
</body>

</html>