    <?php
    include($absolute_include."view/Componentes/header.php");
    include($absolute_include."view/barraLateral.php");
    ?>

    <main>
        <div class="container">
            <h2>LISTA DE LOS USUARIOS</h2>

            <button><a href="#">Agregar Usuario</a></button>

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

<?php 
    include($absolute_include."view/Componentes/footer.php");
?>