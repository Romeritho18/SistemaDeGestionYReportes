<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../styles/barraLateral.css">

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>

<body id="body">

    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class="fa-solid fa-hospital"></i>
            <h4>Hospital</h4>
        </div>

        <div class="options__menu">

            <a href="#">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="../usuarios/controller.usuarios.php">

            <a href="<?php echo $absolute_include ?>controller/usuarios/controller.usuarios.php">

                <div class="option">
                    <i class="fa-solid fa-user"></i>
                    <h4>Usuarios</h4>
                </div>
            </a>


            <a href="<?php echo $absolute_include ?>controller/areas/controler_area.php">
                <div class="option">
                <i class="fa-solid fa-layer-group"></i>
                    <h4>Areas</h4>
                </div>
            </a>

        </div>

    </div>

    <script src="../js/barraLateral.js"></script>
</body>
</html>