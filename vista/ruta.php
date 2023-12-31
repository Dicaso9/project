<?php
    require_once('../jwt.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilosRuta.css">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <title>Rutas</title>
</head>
<body>
    <header>
        <img src="assets/imagenes/LogoA.png" class="logo">
        <h1>Destino y Ubicacion</h1>
        <nav>
            <ul>
                <li><a href="#">Informacion</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>IDIOMA</h4>
        <a href="assets/pagIngles/routes.php" class="ingles"><img src="assets/imagenes/usa.png" alt=""></a>
        <a href="ruta.php" class="espanol"><img src="assets/imagenes/españa.png" alt=""></a>
    </div>
    <main>
        <h2 class="mapa">Ver Mapa</h2>
        <div class="container">
            <a href="https://www.google.com/maps/search/google+maps/@-34.8946432,-56.1741824,12z/data=!3m1!4b1?hl=es&entry=ttu" class="link"><img src="assets/imagenes/imagen.jpg" class="imagen"></a>
            <form action="pag2.php" method="post">
                <input type="radio" name="radio" value="salida" class="salida"> Salida 
                <input type="radio" name="radio" value="llegada" class="llegada"> Llegada
                <br>
                <input type="submit" value="Enviar" class="boton">
            </form>
        </div>
        <h2 class="Ruta">Ver Rutas</h2>
        <div class="rutas">
            <table border="1">
                <thead>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Estado</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Montevideo</td>
                        <td>Canelones</td>
                        <td class="completado">Completo</td>
                    </tr>
                    <tr>
                        <td>Canelones</td>
                        <td>Durazno</td>
                        <td class="en-curso">En curso</td>
                    </tr>
                    <tr>
                        <td>Durazno</td>
                        <td>Artigas</td>
                        <td class="planeado">Planeado</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <p>Copyright &copy; 2023 Carrion. All Rights Reserved.</p>
    </footer>
</body>
</html>