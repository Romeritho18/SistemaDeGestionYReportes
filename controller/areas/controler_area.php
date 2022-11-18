<?php 
    $carpeta_trabajo="";
    $seccion_trabajo="/controller";

    if (strpos($_SERVER["PHP_SELF"], $seccion_trabajo) >1 ) {
        $carpeta_trabajo=substr($_SERVER["PHP_SELF"],1, strpos($_SERVER["PHP_SELF"] , $seccion_trabajo) -1);
    }
    $absolute_include = str_repeat("../",substr_count($_SERVER["PHP_SELF"] , "/") -1).$carpeta_trabajo;

    if (!empty($carpeta_trabajo)) {
        $absolute_include = $absolute_include."/"; 
        $carpeta_trabajo = "/".$carpeta_trabajo; 
        
    }

    $accion = '';

    if(isset($_POST['accion'])){
        $accion = $_POST['accion'];
    }

    include($absolute_include."conexion/conexion.php");
    include($absolute_include."model/areas/modelo_area.php");

    if($accion == ""){
        $areas = buscar_area();
        include($absolute_include."view/area/vista_area_index.php");
    }
    elseif ($accion == 'guardar') {
        guardar_area($_POST);
    }
    elseif ($accion == 'crear') {
        $medicos = buscar_medicos();
        $enfermeros = buscar_enfermeros();
        include($absolute_include."view/area/vista_area.php");
    }
    elseif ($accion == 'eliminar') {
        $id_area = $_POST['id'];
        include($absolute_include."view/area/consulta_eliminar.php");
    }
    elseif ($accion == 'modificar_area') {

        $datos = $_REQUEST['datos'];
        $area = $_REQUEST['area'];

        $sas = json_decode($datos);

        $lista = '';
        for ($i=0; $i <count($sas) ; $i++) { 
            $verificar = buscar_medicos_enfermeros_area($sas[$i], $area);

            if($verificar){
                eliminar_me_area($sas[$i]);
            }else{
                $lis_Ares = [$sas[$i]];

                actualizar_area($lis_Ares,$area);
                $lista .= 'actualizado con exito';
            }
        }

        echo json_encode($lista);
      
    }
    elseif ($accion == 'modificar') {
        $id_area = $_POST['id'];
        
        $medicos = buscar_medicos_ck($id_area);
        $enfermeros = buscar_enfermeros_ck($id_area);
        $area = buscar_un_area($id_area);
        include($absolute_include."view/area/vista_modificar.php");
    }
    


    function buscar_medicos_enfermeros_area($id_persona,$id_area){
        $medicos = array();  // creo un array que va a almacenar la informacion de las medicos

        if(empty($id_area)){
            return false;
        }

        $db = new ConexionDB;
    
        $conexion = $db->retornar_conexion();
    
        $sql = "SELECT * FROM medico_enfermeros where id_area = $id_area and id_persona = $id_persona "; // busca todas las medicos y enfermeros

        $statement = $conexion->prepare($sql);
        
        if(!$statement){
            echo json_encode("Error al crear el registro");
        }else{
            $statement->execute();
        }
    
        if (!$statement) {
            return false;
        }
        else {
    
            $resultado = $statement->fetch(PDO::FETCH_ASSOC);

            if(empty($resultado)){
                $statement = $db->cerrar_conexion($conexion);
                return false;
            }else{
                $statement = $db->cerrar_conexion($conexion);
                return true;
                
            }
        }
    }

    function eliminar_me_area($li){
        $db = new ConexionDB;
    
        $conexion = $db->retornar_conexion();
    
        $sql = "UPDATE `medico_enfermeros` SET `id_area`=0 WHERE id_persona = $li";

        $statement = $conexion->prepare($sql);
        
        
        if(!$statement){
            echo "Error al crear el registro";
        }else{
            $statement->execute();
        }


    
        // cierro la conexion
        $statement = $db->cerrar_conexion($conexion);
    }

?>