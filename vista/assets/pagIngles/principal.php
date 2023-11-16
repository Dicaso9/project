<?php
    require_once('../../../jwt.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/indexStyle.css">
    <link rel="shortcut icon" href="..imagenes/LogoA.png" type="image/x-icon">
    <title>Carrion</title>
</head>

<body>
    <header>
        <img src="../imagenes/LogoA.png" class="logo">
        <h1>Carrion</h1>
        <nav>
            <ul>
                <li class="menu"><a href="">Home</a></li>
                <li class="menu"><a href="">Contact</a></li>
                <li class="menu"><a href="loginEnglish.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <div class="botones-idioma">
        <h4>LANGUAGE</h4>
        <a href="principal.php" class="ingles"><img src="../imagenes/usa.png" alt=""></a>
        <a href="../../index.php" class="espanol"><img src="../imagenes/españa.png" alt=""></a>
    </div>
    <div id="article">
        <div class="info">
            <p id="slogan">Connecting routes, linking destinations: efficiency at the service of your company.
                Our app provides you with an end-to-end solution, from logistics management to
                Route optimization. We simplify your operations and reduce costs; Trust us
                to propel your business to success. Together, we will go further, faster and with the maximum
                confidence. <br> Your company deserves excellence in every mile!</p>
            
        </div>
    </div>
    <a href="loginEnglish.php" class="login-2"><p>Login</p></a>
    <footer>
        Copyright © 2023 Carrion. All Rights Reserved
    </footer>
</body>

</html>