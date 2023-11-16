<?php
    require_once('../../../jwt.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/imagenes/LogoA.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/clienteStyle.css">
    <title>Clients</title>
</head>
<body>
    <header>
        <img src="../imagenes/LogoA.png" class="logo">
        <h1>Clients</h1>
        <nav>
            <ul>
                <li><a href="#">Information</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>LANGUAGE</h4>
        <a href="client.php" class="ingles"><img src="../imagenes/usa.png" alt=""></a>
        <a href="../../cliente.php" class="espanol"><img src="../imagenes/españa.png" alt=""></a>
    </div>
    <div class="div-tabla">
    <table>
        <thead class="title-table">
            <th colspan="3">Orders</th>
        </thead>
        <thead>
            <th>Order name</th>
            <th>State</th>
            <th>More</th>
        </thead>
        <tbody>
            <tr class="completo">
                <td>Order Nª1</td>
                <td>Completed</td>
                <td><a href="pagina-pedido.php"><button>+</button></a></td>
            </tr>
            <tr class="pendiente">
                <td>Order Nª2</td>
                <td>Earring</td>
                <td><button><a href="pagina-pedido.php">+</a></button></td>
            </tr>
            <tr class="parcial">
                <td>Order Nª3</td>
                <td>Partial</td>
                <td><button><a href="pagina-pedido.php">+</a></button></td>
            </tr>
            <tr class="parcial">
                <td>Order Nª4</td>
                <td>Partial</td>
                <td><button><a href="pagina-pedido.php">+</a></button></td>
            </tr>
        </tbody>
    </table>
</div>
    <button class="agrega-pedido">Add Order</button>
    <div class="box-button-tittle">
    <h2>Enter Package</h2>
    <div class="ingresar-paquete">
        <button class="boton-cliente-paquete">Add information</button>
        <button class="boton-cliente-paquete">Add destination</button>
    </div>
</div>
    <footer>
        <p>Copyright &copy; 2023 Carrion. All Rights Reserved.</p>
    </footer>
</body>
</html>