    <?php
    include($absolute_include . "view/Componentes/header.php");
    include($absolute_include . "view/barraLateral.php");
    ?>

    <main>
        <div class="container">
            <h2>LISTA DE LOS USUARIOS</h2>

            <form action="<?php echo $carpeta_trabajo; ?>/controller/usuarios/controller.usuarios.php" method="POST">
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
                            <th>Tipo</th>
                            <th>Acción</th>
                        </thead>

                        <!-- El id del cuerpo de la tabla. -->
                        <tbody id="content">

                            <?php
                            foreach ($usuarios as $usuarios) : ?>
                                <tr>
                                    <td class="text-center padding"><?php echo $usuarios['apellido'] . " " . $usuarios['nombre']; ?></td>
                                    <td class="text-center"><?php echo $usuarios['nombreUsuario']; ?></td>
                                    <td class="text-center"><?php echo $usuarios['descripcionTipoUsuario']; ?></td>
                                    <td class="text-center " width='25%'>
                                        <div class="boton">
                                            <form action="<?php echo $carpeta_trabajo; ?>/controller/usuarios/controller.usuarios.php" method="POST">
                                                <input type="hidden" name="accion" value="editar">
                                                <input type="hidden" name="usuarios_id" value="<?php echo $usuarios['usuarioId']; ?>">
                                                <button type="submit" class="btn btn-info btn-xs"> Editar <i class="fa fa-edit"></i></button>
                                            </form>
                                        </div>
                                        <div class="boton">
                                            <form action="<?php echo $carpeta_trabajo; ?>/controller/usuarios/controller.usuarios.php" method="POST">
                                                <input type="hidden" name="accion" value="eliminar">
                                                <input type="hidden" name="usuarios_id" value="<?php echo $usuarios['usuarioId']; ?>">
                                               
                                                <button type="submit" class="btn btn-danger btn-xs">Eliminar<i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <?php
    include($absolute_include . "view/Componentes/footer.php");
    ?>