<?php 
    include($absolute_include."view/Componentes/header.php");
    include($absolute_include."view/barraLateral.php");
?>

<h2>Modificar Areas</h2>

    <input type="hidden" name="area" value='<?php echo $area["id_area"] ?>' id='area'>
    <input type="text" name='area' placeholder='Area' value='<?php echo $area["descripcion"] ?>'><br><br>
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
    <div id='sas'></div>
    <form>
        <button id="lo">Modificar</button>
    </form>

    <button> <a href="<?php echo $absolute_include ?>controller/areas/controler_area.phpgit">Cancelar</a></button>



<?php 
    include($absolute_include."view/Componentes/footer.php")
?>

<script>
    const idAsistenciasAlumnos = [];

    $(document).on("change", "#checkInasistencia", function(){ 

        // eliminar id del array de id de alumnos
        if (idAsistenciasAlumnos.includes($(this).val())) { 
            idAsistenciasAlumnos.splice(idAsistenciasAlumnos.indexOf($(this).val()), 1);
        }else{
            idAsistenciasAlumnos.push($(this).val());
            
        }
        
        console.log(idAsistenciasAlumnos);
    });

    document.getElementById('lo').addEventListener('click', function(){
        guardar(idAsistenciasAlumnos);
    })
</script>