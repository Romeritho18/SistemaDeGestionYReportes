<?php 
    include($absolute_include."view/Componentes/header.php");
    include($absolute_include."view/barraLateral.php");
?>

<h2>Crear Areas</h2>

<form action="<?php echo $carpeta_trabajo ?>/controller/areas/controler_area.php" method="post">
    <input type="hidden" name="accion" value='guardar'>
    <input type="text" name='area' placeholder='Area'><br><br>
    <h2>Medicos </h2>
    <?php
    foreach ($medicos as $key) {
        echo $key;
    }
    ?><br><br>
    <h2>Enfermeros </h2>
    <?php
    foreach ($enfermeros as $key) {
        echo $key;
    }
?>
    <br><br>
    <input type="submit" value="Crear">
</form>




<?php 
    include($absolute_include."view/Componentes/footer.php")
?>