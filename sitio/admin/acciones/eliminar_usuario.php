<?php
require_once('../../autoload/autoload.php');
require_once('../../configs/config.php');

$perfil = (new Autenticacion())->getPerfil();

    if(!$perfil){
        header("Location:../../index.php?seccion=iniciar_sesion&estado=error&mensaje=401");
        die();
    }

$id = $_POST["id"];
$usuario = (new Usuario())->traerPorId($id);

if(!$usuario){
    header("Location:../index.php?seccion=usuarios&estado=error&mensaje=usuario_no_encontrado");
    die();
}

try{
    $usuario->eliminarUsuario();
    header("Location:../index.php?seccion=usuarios&estado=ok&mensaje=usuario_borrado");
    die();
}   catch(Exception $e){
    header("Location:../index.php?seccion=usuarios&estado=error&mensaje=usuario_no_borrado");
    die();
}