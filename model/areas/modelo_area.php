<?php 
    function buscar_medicos_enfermeros($id_persona,$id_area,$id){
        $medicos = array();  // creo un array que va a almacenar la informacion de las medicos

        if(empty($id_area)){
            return false;
        }

        $db = new ConexionDB;
    
        $conexion = $db->retornar_conexion();
    
        $sql = "SELECT * FROM medico_enfermeros where id_area = $id_area and id_persona = $id_persona "; // busca todas las medicos y enfermeros

        $statement = $conexion->prepare($sql);
        
        if(!$statement){
            echo "Error al crear el registro";
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
                if ($resultado['id_area'] === $id){ 
                    return true;
                }else {
                    return false;
                }
                
            }
        }
    }
    function buscar_medicos(){
        $medicos = array();  // creo un array que va a almacenar la informacion de las medicos

        $db = new ConexionDB;
    
        $conexion = $db->retornar_conexion();
    
        $sql = "SELECT personas.*, medico_enfermeros.*, especialidades.* FROM medico_enfermeros 
        LEFT JOIN personas ON medico_enfermeros.id_persona = personas.personaId 
        LEFT JOIN especialidades ON medico_enfermeros.id_especialidad = especialidades.id_especialidad 
        WHERE medico_enfermeros.id_tipo_categoria = 1 AND medico_enfermeros.id_area = 0;
        "; // busca todas las medicos
    
       
    
        $sql = $sql." ORDER BY apellido";
        
        if(!empty($arg_textoabuscar)){
    
        }
        
        $statement = $conexion->prepare($sql);
        
        // $statement->bindParam(':arg_textoabuscar' , $arg_textoabuscar);  // reemplazo los parametros enlazados 
        
        if(!$statement){
            echo "Error al crear el registro";
        }else{
            $statement->execute();
        }
    
        if (!$statement) {
            // no se encontraron las medicos
        }
        else {
    
            // reviso el retorno
    
            while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
    
                $medicos[] = $resultado;
    
            }
        }
    
        // cierro la conexion
        $statement = $db->cerrar_conexion($conexion);

        $llamado = 'medicos';

        $lista = armar_check($medicos,$llamado);
    
        return $lista;
    }

    function buscar_enfermeros(){
        $enfermeros = array();  // creo un array que va a almacenar la informacion de las enfermeros

        $db = new ConexionDB;
    
        $conexion = $db->retornar_conexion();
    
        $sql = "SELECT personas.*, medico_enfermeros.*, especialidades.* FROM medico_enfermeros 
        LEFT JOIN personas ON medico_enfermeros.id_persona = personas.personaId 
        LEFT JOIN especialidades ON medico_enfermeros.id_especialidad = especialidades.id_especialidad 
        WHERE medico_enfermeros.id_tipo_categoria = 2 AND medico_enfermeros.id_area = 0;
        "; // busca todas las enfermeros
    
       
    
        $sql = $sql." ORDER BY apellido";
        
        if(!empty($arg_textoabuscar)){
    
        }
        
        $statement = $conexion->prepare($sql);
        
        // $statement->bindParam(':arg_textoabuscar' , $arg_textoabuscar);  // reemplazo los parametros enlazados 
        
        if(!$statement){
            echo "Error al crear el registro";
        }else{
            $statement->execute();
        }
    
        if (!$statement) {
            // no se encontraron las enfermeros
        }
        else {
    
            // reviso el retorno
    
            while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
    
                $enfermeros[] = $resultado;
    
            }
        }
    
        // cierro la conexion
        $statement = $db->cerrar_conexion($conexion);

        $llamado = 'enfermeros';
        $lista = armar_check($enfermeros,$llamado);
    
        return $lista;
    }

    function armar_check($lista,$llamado){
        $check = [];

        foreach ($lista as $key) {
            $check[] = '<label><input type="checkbox" name="'.$llamado.'[]" id="checkInasistencia" value="'.$key['personaId'].'"> <strong>Nombre y apellido:</strong> '.$key['nombre'].' '.$key['apellido'].'<strong> DNI: </strong>'.$key['DNI'].' <strong>Especialidad:</strong> '.$key['especialidad'].'</label><br>';
        }

        return $check;
    }
    function buscar_medicos_ck($id){
        $medicos = array();  // creo un array que va a almacenar la informacion de las medicos

        $db = new ConexionDB;
    
        $conexion = $db->retornar_conexion();
    
        $sql = "SELECT personas.*, medico_enfermeros.*, especialidades.* FROM medico_enfermeros 
        LEFT JOIN personas ON medico_enfermeros.id_persona = personas.personaId 
        LEFT JOIN especialidades ON medico_enfermeros.id_especialidad = especialidades.id_especialidad 
        WHERE medico_enfermeros.id_tipo_categoria = 1;
        "; // busca todas las medicos
    
       
    
        $sql = $sql." ORDER BY apellido";
        
        if(!empty($arg_textoabuscar)){
    
        }
        
        $statement = $conexion->prepare($sql);
        
        // $statement->bindParam(':arg_textoabuscar' , $arg_textoabuscar);  // reemplazo los parametros enlazados 
        
        if(!$statement){
            echo "Error al crear el registro";
        }else{
            $statement->execute();
        }
    
        if (!$statement) {
            // no se encontraron las medicos
        }
        else {
    
            // reviso el retorno
    
            while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
    
                $medicos[] = $resultado;
    
            }
        }
    
        // cierro la conexion
        $statement = $db->cerrar_conexion($conexion);

        $llamado = 'medicos';

        $lista = armar_check_ck($medicos,$llamado,$id);
    
        return $lista;
    }

    function buscar_enfermeros_ck($id){
        $enfermeros = array();  // creo un array que va a almacenar la informacion de las enfermeros

        $db = new ConexionDB;
    
        $conexion = $db->retornar_conexion();
    
        $sql = "SELECT personas.*, medico_enfermeros.*, especialidades.* FROM medico_enfermeros 
        LEFT JOIN personas ON medico_enfermeros.id_persona = personas.personaId 
        LEFT JOIN especialidades ON medico_enfermeros.id_especialidad = especialidades.id_especialidad 
        WHERE medico_enfermeros.id_tipo_categoria = 2;
        "; // busca todas las enfermeros
    
       
    
        $sql = $sql." ORDER BY apellido";
        
        if(!empty($arg_textoabuscar)){
    
        }
        
        $statement = $conexion->prepare($sql);
        
        // $statement->bindParam(':arg_textoabuscar' , $arg_textoabuscar);  // reemplazo los parametros enlazados 
        
        if(!$statement){
            echo "Error al crear el registro";
        }else{
            $statement->execute();
        }
    
        if (!$statement) {
            // no se encontraron las enfermeros
        }
        else {
    
            // reviso el retorno
    
            while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
    
                $enfermeros[] = $resultado;
    
            }
        }
    
        // cierro la conexion
        $statement = $db->cerrar_conexion($conexion);

        $llamado = 'enfermeros';
        $lista = armar_check_ck($enfermeros,$llamado,$id);
    
        return $lista;
    }

    function armar_check_ck($lista,$llamado,$id){
        $check = [];

        foreach ($lista as $key) {


            $verificado = verificar_check($key['personaId'],$key['id_area'],$id);

            if ($verificado) {
                $check[] = '<label><input type="checkbox" name="'.$llamado.'[]" id="checkInasistencia" value="'.$key['personaId'].'" checked> <strong>Nombre y apellido:</strong> '.$key['nombre'].' '.$key['apellido'].'<strong> DNI: </strong>'.$key['DNI'].' <strong>Especialidad:</strong> '.$key['especialidad'].'</label><br>';
            }else{
                $check[] = '<label><input type="checkbox" name="'.$llamado.'[]" id="checkInasistencia" value="'.$key['personaId'].'"> <strong>Nombre y apellido:</strong> '.$key['nombre'].' '.$key['apellido'].'<strong> DNI: </strong>'.$key['DNI'].' <strong>Especialidad:</strong> '.$key['especialidad'].'</label><br>';
            }
            
        }

        return $check;
    }

    function verificar_check($id_persona,$id_area,$id){
        $lista_todo = buscar_medicos_enfermeros($id_persona,$id_area,$id);

        return $lista_todo;

    }

    function guardar_area($POST){
        $area = $POST['area'];
        $lista_medicos = $POST['medicos'];
        $lista_enfermeros = $POST['enfermeros'];

        $db = new ConexionDB;
    
        $conexion = $db->retornar_conexion();
    
        $sql = "INSERT INTO `areas`(`descripcion`) VALUES (?);";
        
        $statement = $conexion->prepare($sql);

        $statement->bindParam(1,$area,PDO::PARAM_STR);
        
        if(!$statement){
            echo "Error al crear el registro";
        }else{
            $statement->execute();
        }

        $ultimoId = $conexion->lastInsertId();

        actualizar_area($lista_medicos,$ultimoId);
        actualizar_area($lista_enfermeros,$ultimoId);
    
        // cierro la conexion
        $statement = $db->cerrar_conexion($conexion);

        header('Location: '.$absolute_include.' controler_area.php');
    
        
    }

    function actualizar_area($lista,$id_area){
        $db = new ConexionDB;
    
        $conexion = $db->retornar_conexion();

        foreach($lista as $li){
    
        $sql = "UPDATE `medico_enfermeros` SET `id_area`=? WHERE id_persona = $li";

        $statement = $conexion->prepare($sql);

        $statement->bindParam(1,$id_area,PDO::PARAM_INT);
        
        
        if(!$statement){
            echo "Error al crear el registro";
        }else{
            $statement->execute();
        }

        }

    
        // cierro la conexion
        $statement = $db->cerrar_conexion($conexion);
    }

    function buscar_area(){
        $areas = array();  // creo un array que va a almacenar la informacion de las areas

        $db = new ConexionDB;
    
        $conexion = $db->retornar_conexion();
    
        $sql = "SELECT * FROM `areas`;"; // busca todas las areas
        
        if(!empty($arg_textoabuscar)){
    
        }
        
        $statement = $conexion->prepare($sql);
        
        // $statement->bindParam(':arg_textoabuscar' , $arg_textoabuscar);  // reemplazo los parametros enlazados 
        
        if(!$statement){
            echo "Error al crear el registro";
        }else{
            $statement->execute();
        }
    
        if (!$statement) {
            // no se encontraron las areas
        }
        else {
    
            // reviso el retorno
    
            while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
    
                $areas[] = $resultado;
    
            }
        }
    
        // cierro la conexion
        $statement = $db->cerrar_conexion($conexion);
    
        return $areas;
    }

    function buscar_ME($cat,$idarea){
        $areas = array();  // creo un array que va a almacenar la informacion de las areas

        $db = new ConexionDB;
    
        $conexion = $db->retornar_conexion();
    
        $sql = "SELECT id_persona FROM `medico_enfermeros` where id_area = '$idarea' and id_tipo_categoria = $cat;"; // busca todas las areas
        
        if(!empty($arg_textoabuscar)){
    
        }
        
        $statement = $conexion->prepare($sql);
        
        // $statement->bindParam(':arg_textoabuscar' , $arg_textoabuscar);  // reemplazo los parametros enlazados 
        
        if(!$statement){
            echo "Error al crear el registro";
        }else{
            $statement->execute();
        }
    
        if (!$statement) {
            // no se encontraron las areas
        }
        else {
    
            // reviso el retorno
    
            while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
    
                $areas[] = $resultado;
    
            }
        }
    
        // cierro la conexion
        $statement = $db->cerrar_conexion($conexion);

        $personas = buscar_personas($areas);
    
        return $personas;
    }

    function buscar_personas($lis){
        $areas = array();  // creo un array que va a almacenar la informacion de las areas

        $db = new ConexionDB;
    
        $conexion = $db->retornar_conexion();

        foreach ($lis as $key) {
        
            $sql = "SELECT * FROM `personas` where personaId = '".$key['id_persona']."'"; // busca todas las areas
            
            $statement = $conexion->prepare($sql);
                $statement->execute();
                while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
        
                    $areas[] = $resultado;
        
                }
    
    }
        // cierro la conexion
        $statement = $db->cerrar_conexion($conexion);
    
        return $areas;
    }

    function eliminar_area($id){
        $db = new ConexionDB;
    
        $conexion = $db->retornar_conexion();
    
        $sql = "UPDATE `medico_enfermeros` SET `id_area`=0 WHERE id_area = $id";

        $statement = $conexion->prepare($sql);
        
        
        if(!$statement){
            echo "Error al crear el registro";
        }else{
            $statement->execute();
        }

        $sql = "DELETE FROM `areas` WHERE id_area = $id";

        $statement = $conexion->prepare($sql);


        if(!$statement){
            echo "Error al crear el registro";
        }else{
            $statement->execute();
        }

    
        // cierro la conexion
        $statement = $db->cerrar_conexion($conexion);
        header('Location: '.$absolute_include.' controler_area.php');
    }

    function buscar_un_area($id){
        $areas = array();  // creo un array que va a almacenar la informacion de las areas

        $db = new ConexionDB;
    
        $conexion = $db->retornar_conexion();
    
        $sql = "SELECT * FROM `areas` where id_area=$id;"; // busca todas las areas
        
        if(!empty($arg_textoabuscar)){
    
        }
        
        $statement = $conexion->prepare($sql);
        
        // $statement->bindParam(':arg_textoabuscar' , $arg_textoabuscar);  // reemplazo los parametros enlazados 
        
        if(!$statement){
            echo "Error al crear el registro";
        }else{
            $statement->execute();
        }
    
        if (!$statement) {
            // no se encontraron las areas
        }
        else {
    
            // reviso el retorno
    
            while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
                
                $statement = $db->cerrar_conexion($conexion);
                return $resultado;
    
            }
        }
    
    }
?>