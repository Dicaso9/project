<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/paginasBackoffice.css">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <title>Usuarios</title>
</head>
<?php
require_once "../modelo/database.php";
$db = new Database();
$connection = $db->dbConnect();
?>

<body>
    <header>
        <img src="assets/imagenes/LogoA.png" class="logo">
        <h1>Usuarios</h1>
    </header>
    <main>
        <div class="container-table">
            <table>
                <thead>
                    <th>Usuarios</th>
                </thead>
                <tbody>
                    <tr>
                        <td>---------------------------</td>
                    </tr>
                    <tr>
                        <td>---------------------------</td>
                    </tr>
                    <tr>
                        <td>---------------------------</td>
                    </tr>
                    <tr>
                        <td>---------------------------</td>
                    </tr>
                </tbody>
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