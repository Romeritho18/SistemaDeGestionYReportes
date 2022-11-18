<?php 
    include($absolute_include."view/Componentes/header.php");
    include($absolute_include."view/barraLateral.php");
?>


<p>
    Estas seguro que desea eliminar?
</p>

<a href="<?php echo $carpeta_trabajo ?>/controller/areas/controler_eliminar_area.php?id=<?php echo $id_area ?>">si</a>
<a href="<?php echo $carpeta_trabajo ?>/controller/areas/controler_area.php">no</a>

<?php 
    include($absolute_include."view/Componentes/footer.php")
?>