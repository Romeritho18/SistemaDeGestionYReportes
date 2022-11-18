<?php

function buscar_usuarios($arg_textoabuscar){

    $usuarios = array();  // creo un array que va a almacenar la informacion de las usuarios

    $db = new ConexionDB;

    $conexion = $db->retornar_conexion();

    $sql = "SELECT personas.*, tipo_usuario.*, usuarios.*
    FROM usuarios
    LEFT JOIN tipo_usuario ON usuarios.idTipoUsuario = tipo_usuario.tipoUsuarioId
    LEFT JOIN personas ON usuarios.idPersona = personas.personaId
    "; // busca todas las usuarios

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
        // no se encontraron las usuarios
    }
    else {

        // reviso el retorno

        while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){

            $usuarios[] = $resultado;

        }
    }

    // cierro la conexion
    $statement = $db->cerrar_conexion($conexion);

    return $usuarios;

}

function buscar_un_usuario($arg_usuario_id){

    $usuarios = array();  // creo un array que va a almacenar la informacion de las usuarios

    $db = new ConexionDB;

    $conexion = $db->retornar_conexion();
    $sql = "SELECT personas.*, tipo_usuario.*, usuarios.*
    FROM usuarios
    LEFT JOIN tipo_usuario ON usuarios.idTipoUsuario = tipo_usuario.tipoUsuarioId
    LEFT JOIN personas ON usuarios.idPersona = personas.personaId
    WHERE usuarioId = $arg_usuario_id
    "; // busca todas las usuarios

    $sql = $sql." ORDER BY apellido";
    $statement = $conexion->prepare($sql);
    
    // $statement->bindParam(':arg_textoabuscar' , $arg_textoabuscar);  // reemplazo los parametros enlazados 

    if(!$statement){
        echo "Error al crear el registro";
    }else{
        $statement->execute();
    }

    if (!$statement) {
        // no se encontraron las usuarios
    }
    else {

        // reviso el retorno

        while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){

            $usuarios[] = $resultado;

        }
    }

    // cierro la conexion
    $statement = $db->cerrar_conexion($conexion);

    return $usuarios;

}

function insertar_persona($nombre,$apellido,$fecha_nac,$tel,$correo,$domicilio,$sexo, $dni){

    $ultimo_id=0;
    $db = new ConexionDB;
    $conexion = $db->retornar_conexion();

    $sql = "INSERT INTO personas(nombre, apellido, fecha_nac, telefono, correo_electronico, domicilio, sexo, DNI) 
                               VALUES  (:nombre, :apellido, :fecha_nac, :tel, :correo, :domicilio, :sexo, :dni)";

    // preparo el sql para enviar   se puede usar prepare   y bindparam 
    $statement = $conexion->prepare($sql);

    $statement->bindParam(':nombre' , $nombre);  // reemplazo los parametros enlazados
    $statement->bindParam(':apellido' , $apellido);
    $statement->bindParam(':fecha_nac' , $fecha_nac);
    $statement->bindParam(':tel' , $tel);
    $statement->bindParam(':correo' , $correo);
    $statement->bindParam(':domicilio' , $domicilio);
    $statement->bindParam(':sexo' , $sexo);
    $statement->bindParam(':dni' , $dni);


    if(!$statement){
        echo "Error al crear el registro";
    }else{
        $statement->execute();
    }

    $ultimo_id = $conexion->lastinsertid();

    // cierro la conexion
    $statement = $db->cerrar_conexion($conexion);

    return $ultimo_id;
}


function insertar_usuario($nombreUsuario,$contraseña,$ultima_persona, $tipo_usuario){


    $ultimo_id=0;
    $db = new ConexionDB;
    $conexion = $db->retornar_conexion();

    $sql = "INSERT INTO usuarios(nombreUsuario, contraseña, idPersona, idTipoUsuario) 
                               VALUES  (:nombreUsuario, :contraseña,:ultima_persona, :tipo_usuario)";

    // preparo el sql para enviar   se puede usar prepare   y bindparam 
    $statement = $conexion->prepare($sql);

    $statement->bindParam(':ultima_persona' , $ultima_persona);  // reemplazo los parametros enlazados
    $statement->bindParam(':nombreUsuario' , $nombreUsuario);
    $statement->bindParam(':contraseña' , $contraseña);
    $statement->bindParam(':tipo_usuario' , $tipo_usuario);


    if(!$statement){
        echo "Error al crear el registro";
    }else{
        $statement->execute();
    }

    $ultimo_id = $conexion->lastinsertid();

    // cierro la conexion
    $statement = $db->cerrar_conexion($conexion);

    return $ultimo_id;
}


function eliminar_usuario($arg_usuario_id){
 
    $db = new ConexionDB;
    $conexion = $db->retornar_conexion();

    //persona
    $sql = "DELETE FROM usuarios WHERE usuarioId = :arg_usuario_id";

    // preparo el sql para enviar   se puede usar prepare   y bindparam 
    $statement = $conexion->prepare($sql);

    $statement->bindParam(':arg_usuario_id' , $arg_usuario_id);  // reemplazo los parametros enlazados   

    if(!$statement){
        echo "Error al crear el registro";
    }else{
        $statement->execute();
    }

    // cierro la conexion
    $statement = $db->cerrar_conexion($conexion);

}


?>