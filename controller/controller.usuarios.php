<?php
// seccion que permite resolver problemas de inclusion de archivos
$carpeta_trabajo = "";
$seccion_trabajo = "/controller";

if (strpos($_SERVER["PHP_SELF"], $seccion_trabajo) > 1) {
  $carpeta_trabajo = substr($_SERVER["PHP_SELF"], 1, strpos($_SERVER["PHP_SELF"], $seccion_trabajo) - 1);  // saca la carpeta de trabajo del sistema
}

$absolute_include = str_repeat("../", substr_count($_SERVER["PHP_SELF"], "/") - 1) . $carpeta_trabajo; //resuelve problemas de profundidad de carpetas

if (!empty($carpeta_trabajo)) {
  $absolute_include = $absolute_include . "/";
  $carpeta_trabajo = "/" . $carpeta_trabajo;
}
// fin seccion 

include($absolute_include . "conexion/conexion.php");   


include($absolute_include . "model/model.usuarios.php"); 

$accion = "";


$textoabuscar = "";

if (isset($_REQUEST['accion'])) {   

  $accion = $_REQUEST['accion'];
}

// DEFINE LA ACCIÓN A REALIZAR

if ($accion == "" or $accion == "index") {
  usuarios_index($textoabuscar);
}else if ($accion == "crear") {
  usuarios_crear($textoabuscar);
}


function usuarios_index($arg_textoabuscar)
{

  $absolute_include = $GLOBALS['absolute_include'];
  $carpeta_trabajo = $GLOBALS['carpeta_trabajo'];

  $usuarios = buscar_usuarios($arg_textoabuscar);


  include($absolute_include . "view/usuarios/index.php");
}

function usuarios_crear($arg_textoabuscar)
{

  $absolute_include = $GLOBALS['absolute_include'];
  $carpeta_trabajo = $GLOBALS['carpeta_trabajo'];

  include($absolute_include . "view/usuarios/crear.php");
}
