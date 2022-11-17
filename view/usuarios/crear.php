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
    include("../view/barraLateral.php")
    ?>

    <div class="container">
        <h2>Registrar Usuarios</h2>

        <div class="formulario">
            <form action="" method="post">
                <table>
                    <tr>
                        <td>Nombre</td>
                        <td><input type="text" name="nombre"></td>
                    </tr>
                    <tr>
                        <td>Apellido</td>
                        <td><input type="text" name="apellido"></td>
                    </tr>
                    <tr>
                        <td>Fecha de Nacimiento</td>
                        <td><input type="date" name="fecha_nac"></td>
                    </tr>
                    <tr>
                        <td>Telefono</td>
                        <td><input type="number" name="tel"></td>
                    </tr>
                    <tr>
                        <td>Correo Electrònico</td>
                        <td><input type="email" name="correo"></td>
                    </tr>
                    <tr>
                        <td>Domicilio</td>
                        <td><input type="text" name="domicilio"></td>
                    </tr>
                    <tr>
                        <td>Sexo</td>
                        <td>
                            <select name="" id="">
                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha de Nacimiento</td>
                        <td><input type="date" name="fecha_nac"></td>
                    </tr>
                    <tr>
                        <td>Fecha de Nacimiento</td>
                        <td><input type="date" name="fecha_nac"></td>
                    </tr>
                    <tr>
                        <td>Fecha de Nacimiento</td>
                        <td><input type="date" name="fecha_nac"></td>
                    </tr>

                </table>
            </form>
        </div>

    </div>
</body>

</html>