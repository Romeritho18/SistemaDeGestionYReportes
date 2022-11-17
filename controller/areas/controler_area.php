<?php 
    $carpeta_trabajo="";
    $seccion_trabajo="/Controlador";

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

    include($absolute_include."Conexion/conexion.php");
    include($absolute_include."Modelo/modelo_area.php");

    if($accion == ""){
        include($absolute_include."Vista/vista_area.php");
    }



?>