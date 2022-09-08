<?php
require_once('../autoload/autoload.php');
require_once('../configs/config.php');

$perfil = (new Autenticacion())->getPerfil();

if(!$perfil){
    header("Location:../index.php?seccion=iniciar_sesion&estado=error&mensaje=401");
    die();
}

$producto_id = $_POST["id"];
$cantidad    = $_POST["cantidad"];


if(empty($producto_id) || empty($cantidad)){
    header("Location:../index.php?seccion=informacion&id=$producto_id&estado=error&mensaje=cantidad_obligatoria");
    die();
}

try{
    (new Carrito())->añadirAlCarrito($producto_id, $cantidad);
    header("Location:../index.php?seccion=tienda&estado=ok&mensaje=producto_agregado");
    die();
} catch(Exception $e) {
    header("Location:../index.php?seccion=informacion&id=$producto_id&estado=error&mensaje=producto_no_agregado");
    die();
}


    