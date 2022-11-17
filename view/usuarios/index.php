<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../barraLateral.css">
    <link rel="stylesheet" href="../styles/registros.css">
    <title>Usuarios</title>
</head>

<body>
    <?php
    include("../view/barraLateral.php")
    ?>

    <main>
        <div class="container">
            <h2>LISTA DE LOS USUARIOS</h2>

            <form action="<?php echo $carpeta_trabajo; ?>/controller/controller.usuarios.php" method="POST">
                <input type="hidden" name="accion" value="crear">
                <button type="submit" class="btn btn-round btn-success btn-block"></i> Agregar Usuario</button>
            </form>

            <div class="row g-4">

                <div class="col-auto margin">
                    <label for="campo" class="col-form-label">Buscar: <input type="text" name="campo" id="campo" class="form-control"></label>
                </div>

            </div>

            <!-- COMIENZO DE LA TABLA -->

            <div class="row py-4">
                <div class="col">
                    <table class="table table-bordered ">
                        <thead>
                            <th>Persona</th>
                            <th>Nombre de Usuario</th>
                            <th>Contraseña</th>
                            <th>Tipo</th>
                            <th>Acción</th>
                        </thead>

                        <!-- El id del cuerpo de la tabla. -->
                        <tbody id="content">

                            <?php
                            foreach ($usuarios as $usuarios) : ?>
                                <tr>
                                    <td class="text-center"><?php echo $usuarios['apellido'] . " " . $usuarios['nombre']; ?></td>
                                    <td class="text-center"><?php echo $usuarios['nombreUsuario']; ?></td>
                                    <td class="text-center"><?php echo $usuarios['contraseña']; ?></td>
                                    <td class="text-center"><?php echo $usuarios['descripcionTipoUsuario']; ?></td>
                                    <td class="text-center"><?php echo $usuarios['descripcionTipoUsuario']; ?></td>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row-paginacion margin text-center">
                <div class="col-6">
                    <label id="lbl-total"></label>
                </div>

                <div class="col-6" id="nav-paginacion"></div>
            </div>
        </div>
    </main>

    <script src="../../js/barraLateral.js"></script>


</body>

</html>