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

?>