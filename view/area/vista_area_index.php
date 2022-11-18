<?php 
    include($absolute_include."view/Componentes/header.php");
    include($absolute_include."view/barraLateral.php");
?>

    <h2>Areas</h2>
    <form action="" method="post">
        <input type="hidden" name="accion" value='crear'>
        <input type="submit" value="Crear">
    </form>

    <div class="row py-4">
                <div class="col">
                    <table class="table table-bordered ">
                        <thead>
                            <th>Area</th>
                            <th>Medico</th>
                            <th>Enfermeros</th>
                            <th>Pasientes</th> 
                            <th>Modificar</th>
                            <th>Eliminar</th> 
                        </thead>

                        <!-- El id del cuerpo de la tabla. -->
                        <tbody id="content">
                        
                            <?php
                            foreach ($areas as $ar) : ?>
                                <tr>
                                    <td class="text-center"><?php echo $ar['descripcion'] ?></td>
                                    <td class="text-center"><?php $cosos =  buscar_ME(1,$ar['id_area']);
                                        foreach ($cosos as $key) {
                                            echo $key['nombre']." ".$key['apellido'].",";
                                        }
                                    ?></td>
                                    <td class="text-center"><?php   $cosos =  buscar_ME(2,$ar['id_area']);
                                        foreach ($cosos as $key) {
                                            echo $key['nombre']." ".$key['apellido'].",";
                                        } ?></td>
                                    <td class="text-center"><?php ?></td>
                                    <td class="text-center"><form action="" method="post">
                                        <input type="hidden" name="accion" value='modificar'>
                                        <input type="hidden" name="id" value='<?php echo $ar['id_area']?>'>
                                        <input type="submit" value="Modificar">
                                    </form></td>
                                    <td class="text-center"><form action="" method="post">
                                        <input type="hidden" name="accion" value='eliminar'>
                                        <input type="hidden" name="id" value='<?php echo $ar['id_area']?>'>
                                        <input type="submit" value="Eliminar">
                                    </form></td>
                                    
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>

<?php 
    include($absolute_include."view/Componentes/footer.php")
?>