<?php 
require_once('../autoload/autoload.php');
require_once('../configs/config.php');

$perfil = (new Autenticacion())->getPerfil();

if(!$perfil){
    header("Location:../index.php?seccion=iniciar_sesion&estado=error&mensaje=401");
    die();
}

$i = $_POST["i"];

try{
    (new Carrito())->eliminarProducto($i);
    header("Location:../index.php?seccion=carrito&estado=ok&mensaje=producto_eliminado");
    die();
} catch(Exception $e){
    header("Location:../index.php?seccion=carrito&estado=ok&mensaje=producto_no_eliminado");
    die();
}