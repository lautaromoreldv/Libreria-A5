<?php
require_once('../../autoload/autoload.php');
require_once('../../configs/config.php');

$perfil = (new Autenticacion())->getPerfil();

    if(!$perfil){
        header("Location:../../index.php?seccion=iniciar_sesion&estado=error&mensaje=401");
        die();
    }

$id = $_POST["id"];
$producto = (new Producto())->traerPorId($id);
$imagen = $_POST["imgaborrar"];

if(!$producto){
    header("Location:../index.php?seccion=productos&estado=error&mensaje=producto_no_encontrado");
    die();
}

try{
    $producto->eliminarProducto();
    if($imagen != 'producto_default.jpg'){
        unlink("../../img/productos/". $imagen);
    }

    header("Location:../index.php?seccion=productos&estado=ok&mensaje=producto_borrado");
    die();
}   catch(Exception $e){
    header("Location:../index.php?seccion=productos&estado=error&mensaje=producto_no_borrado");
    die();
}