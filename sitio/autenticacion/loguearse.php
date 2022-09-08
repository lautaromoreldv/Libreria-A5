<?php
require_once("../configs/config.php");
require_once("../autoload/autoload.php");

$_SESSION["datos_loguearse"] = $_POST;

$email      = trim($_POST["email"]);
$contraseña = trim($_POST["contraseña"]);

if(empty($email) || empty($contraseña)){
    header("Location:../index.php?seccion=iniciar_sesion&estado=error&mensaje=campos_obligatorios");
    die();
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location:../index.php?seccion=iniciar_sesion&estado=error&mensaje=email_incorrecto");
    die();
}

$auth = new Autenticacion;

if($auth->loguearse($email, $contraseña)){
    $perfil = $auth->getPerfil();
    if(isset($perfil)){
        $tipousuario = isset($perfil["tipousuario"]) ? $perfil["tipousuario"] : '';
    }
    if($tipousuario == 1){
        unset($_SESSION["datos_loguearse"]);
        header("Location:../admin/index.php?&estado=ok&mensaje=inicio_sesion_ok");
        die();
    }
    if($tipousuario == 2){
        unset($_SESSION["datos_loguearse"]);
        header("Location:../index.php?seccion=tienda&estado=ok&mensaje=inicio_sesion_ok");
        die();
    } 
} else{
    header("Location:../index.php?seccion=iniciar_sesion&estado=error&mensaje=inicio_sesion_error");
    die();
}