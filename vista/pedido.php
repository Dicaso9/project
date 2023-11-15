<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/pedidoStyle.css">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <title>Pedido</title>
</head>
<body>
    <header>
        <img src="assets/imagenes/LogoA.png" class="logo">
        <h1>Pedido</h1>
        <nav>
            <ul>
                <li><a href="#">Informacion</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>IDIOMA</h4>
        <a href="assets/pagIngles/order.html" class="ingles"><img src="assets/imagenes/usa.png" alt=""></a>
        <a href="pedido.html" class="espanol"><img src="assets/imagenes/españa.png" alt=""></a>
    </div>
    <main>
        <div class="div-tabla">
            <table border="1">
                <thead>
                    <th colspan="2">Paquetes</th>
                </thead>
                <thead>
                    <th>Nombre</th>
                    <th>Estado</th>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
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