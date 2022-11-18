<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include($absolute_include . "view/barraLateral.php");
    include($absolute_include . "view/Componentes/header.php");
    ?>
    <div class="container">
        <div class="container-form">
            <h2>Registrar Usuarios</h2>

            <div class="formulario">
                <form action="<?php echo $carpeta_trabajo; ?>/controller/usuarios/controller.usuarios.php" method="post">
                    <table>
                        <tr>
                            <td>Nombre</td>
                            <td><input type="text" name="nombre" placeholder="Ingrese el nombre"  value="<?php echo $usuario['nombre']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Apellido</td>
                            <td><input type="text" name="apellido" placeholder="Ingrese el apellido" ></td>
                        </tr>
                        <tr>
                            <td>Fecha de Nacimiento</td>
                            <td><input type="date" name="fecha_nac" placeholder="Ingrese su fecha de nacimiento" required></td>
                        </tr>
                        <tr>
                            <td>DNI</td>
                            <td><input type="number" name="dni" placeholder="Ingrese su DNI" required></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td><input type="number" name="tel" placeholder="Ingrese su teléfono" required></td>
                        </tr>
                        <tr>
                            <td>Correo Electrònico</td>
                            <td><input type="email" name="correo" placeholder="Ingrese el correo" required></td>
                        </tr>
                        <tr>
                            <td>Domicilio</td>
                            <td><input type="text" name="domicilio" placeholder="Ingrese el domicilio" required></td>
                        </tr>
                        <tr>
                            <td>Sexo</td>
                            <td>
                                <select name="sexo" id="" required>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tipo Usuario</td>
                            <td>
                                <select name="tipo_usuario" id="" required>
                                    <option value="1">Administrador</option>
                                    <option value="2">Genèrico</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nombre de Usuario</td>
                            <td><input type="text" name="nombreUsuario" placeholder="Coloque un nombre de usuario" required></td>
                        </tr>
                        <tr>
                            <td>Contraseña</td>
                            <td><input type="password" name="contraseña" placeholder="Coloque una contraseña" required></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="enviar" value="Registrar">
                                <input type="hidden" name="accion" value="insertar">
                            </td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>
    </div>


    <?php
    include($absolute_include . "view/Componentes/footer.php");
    ?>

</body>

</html>