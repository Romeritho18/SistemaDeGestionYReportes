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


include($absolute_include . "model/usuarios/model.usuarios.php"); 

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
}else if ($accion == "insertar") {
  usuarios_insertar($_POST);
}
else if ($accion == "eliminar") {
  usuarios_eliminar($_POST);
}
elseif ($accion == "editar") {

  if (isset($_REQUEST['usuarios_id'])) {
    $usuarios_id = $_REQUEST['usuarios_id'];
  }
  usuarios_editar($usuarios_id);
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

function usuarios_insertar($arg_POST)
{

  $absolute_include = $GLOBALS['absolute_include'];
  $carpeta_trabajo = $GLOBALS['carpeta_trabajo'];

  $nombre = $arg_POST['nombre'];
  $apellido = $arg_POST['apellido'];
  $fecha_nac = $arg_POST['fecha_nac'];
  $tel = $arg_POST['tel'];
  $correo = $arg_POST['correo'];
  $domicilio = $arg_POST['domicilio'];
  $sexo = $arg_POST['sexo'];
  $dni = $arg_POST['dni'];

  $tipo_usuario = strtoupper($arg_POST['tipo_usuario']);
  $nombreUsuario = strtoupper($arg_POST['nombreUsuario']);
  $contraseña = strtoupper($arg_POST['contraseña']);

  // llamo a la funcion en el modelo para grabar una persona
  $ultima_persona = insertar_persona($nombre,$apellido,$fecha_nac,$tel,$correo,$domicilio,$sexo, $dni);
  $ultima_usuario = insertar_usuario($ultima_persona, $nombreUsuario, $contraseña, $tipo_usuario);

  header("Location: ".$carpeta_trabajo."/controller/usuarios/controller.usuarios.php");
}


function usuarios_editar($arg_usuarios_id)
{

  $absolute_include = $GLOBALS['absolute_include'];

  $carpeta_trabajo = $GLOBALS['carpeta_trabajo'];

  $usuario = buscar_un_usuario($arg_usuarios_id);

  // var_dump($usuario);
  // die();

  include($absolute_include . "/view/usuarios/editar.php");
}


function usuarios_eliminar($arg_POST)
{

  $absolute_include = $GLOBALS['absolute_include'];
  $carpeta_trabajo = $GLOBALS['carpeta_trabajo'];

  $usuarios_id = $arg_POST['usuarios_id'];
 
  // llamo a la funcion en el modelo para grabar una inscripcion
  eliminar_usuario($usuarios_id);

  header("Location: " . $carpeta_trabajo . "/controller/usuarios/controller.usuarios.php");
}