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

    $id = $_GET['id'];

    include($absolute_include."conexion/conexion.php");
    include($absolute_include."model/areas/modelo_area.php");

    eliminar_area($id);

?>