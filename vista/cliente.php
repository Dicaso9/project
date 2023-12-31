<?php
    require_once('../jwt.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/clienteStyle.css">
    <title>Clientes</title>
</head>
<body>
    <header>
        <img src="assets/imagenes/LogoA.png" class="logo">
        <h1>Clientes</h1>
        <nav>
            <ul>
                <li><a href="#">Informacion</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>IDIOMA</h4>
        <a href="assets/pagIngles/client.php" class="ingles"><img src="assets/imagenes/usa.png" alt=""></a>
        <a href="cliente.php" class="espanol"><img src="assets/imagenes/españa.png" alt=""></a>
    </div>
    <div class="div-tabla">
    <table>
        <thead class="title-table">
            <th colspan="3">Pedidos</th>
        </thead>
        <thead>
            <th>Nombre pedido</th>
            <th>Estado</th>
            <th>Mas</th>
        </thead>
        <tbody>
            <tr class="completo">
                <td>Pedido Nª1</td>
                <td>Completo</td>
                <td><a href="pagina-pedido.php"><button>+</button></a></td>
            </tr>
            <tr class="pendiente">
                <td>Pedido Nª2</td>
                <td>Pendiente</td>
                <td><button><a href="pagina-pedido.php">+</a></button></td>
            </tr>
            <tr class="parcial">
                <td>Pedido Nª3</td>
                <td>Parcial</td>
                <td><button><a href="pagina-pedido.php">+</a></button></td>
            </tr>
            <tr class="parcial">
                <td>Pedido Nª4</td>
                <td>Parcial</td>
                <td><button><a href="pagina-pedido.php">+</a></button></td>
            </tr>
        </tbody>
    </table>
</div>
    <button class="agrega-pedido">Agregar pedido</button>
    <div class="box-button-tittle">
    <h2>Ingresar Paquete</h2>
    <div class="ingresar-paquete">
        <button class="boton-cliente-paquete"><a href="nuevoPedido.php">Añadir informacion</a></button>
        <button class="boton-cliente-paquete">Agregar destino</button>
    </div>
</div>
    <footer>
        <p>Copyright &copy; 2023 Carrion. All Rights Reserved.</p>
    </footer>
</body>
</html>