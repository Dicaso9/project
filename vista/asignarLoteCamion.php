<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/asignarLoteCamion.css">
    <title>Document</title>
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

    <form action="asignarLote.php" method="post">
        <h2>Asignar Lote</h2>
        <label for="id-lote">ID Lote: </label><br>
        <input type="text" name="id-lote" id="id-lote"><br>
        <label for="matricula-camion">Matricula: </label><br>
        <select name="matricula-camion" id="matricula-camion">
            <optgroup label="Seleccionar matricula">
                <option value="matricula1">STP 2782</option>
                <option value="matricula2">STP 8765</option>
                <option value="matricula3">STP 9076</option>        
            </optgroup>
        </select><br>

        <input type="submit" value="Asignar Lote">
    </form>

    <footer>
        <p>&copy; Carrion. Todos los derechos reservados.</p>
    </footer>
</body>
</html>