<?php
require_once('../autoload/autoload.php');
require_once('../configs/config.php');

$perfil = (new Autenticacion())->getPerfil();
if(!$perfil){
    header("Location:../index.php?seccion=iniciar_sesion&estado=error&mensaje=401");
    die();
} 

$id                   = $_POST["id"];
$contraseña           = trim($_POST["contraseña_usuario"]);
$contraseña_confirmar = trim($_POST["contraseña_confirmar_usuario"]);

if(empty($contraseña) || empty($contraseña_confirmar)){
    header("Location:../index.php?seccion=cambiar_contraseña&estado=error&mensaje=contraseña_vacia");
    die();
} 

if(strlen($contraseña) < 4 || strlen($contraseña) > 50 || strlen($contraseña_confirmar) < 4 || strlen($contraseña_confirmar) > 50){
    header("Location:../index.php?seccion=cambiar_contraseña&estado=error&mensaje=max_min_contraseña");
    die();
}


if($contraseña != $contraseña_confirmar){
    header("Location:../index.php?seccion=cambiar_contraseña&estado=error&mensaje=contraseñas_diferentes");
    die();
} else{
    $contraseña_hasheada = password_hash($contraseña, PASSWORD_DEFAULT);
    try{
        $db = (new DB())->getDB();
        $query = "UPDATE usuarios
                        SET contraseña = ?
                        WHERE usuario_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([
                $contraseña_hasheada,
                $id
        ]);
        header("location:../index.php?seccion=editar_perfil&estado=ok&mensaje=contraseña_cambiada");
        die();
    } catch(Exception $e){
        header("location:../index.php?seccion=cambiar_contraseña&estado=error&mensaje=contraseña_no_cambiada");
        die();
    }
}
