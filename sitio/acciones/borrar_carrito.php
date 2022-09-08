<?php
require_once('../autoload/autoload.php');
require_once('../configs/config.php');

$perfil = (new Autenticacion())->getPerfil();

if(!$perfil){
    header("Location:../index.php?seccion=iniciar_sesion&estado=error&mensaje=401");
    die();
}

try{
    (new Carrito())->borrarCarrito();
    header("Location:../index.php?seccion=carrito&estado=ok&mensaje=carrito_borrado");
    die();
} catch(Exception $e){
    header("Location:../index.php?seccion=carrito&estado=error&mensaje=carrito_no_borrado");
    die();
}