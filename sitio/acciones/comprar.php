<?php
require_once('../autoload/autoload.php');
require_once('../configs/config.php');
date_default_timezone_set('America/Argentina/Buenos_Aires');
$fecha_compra = date('Y-m-d H:i:s', time());

$perfil = (new Autenticacion())->getPerfil();

if(!$perfil){
    header("Location:../index.php?seccion=iniciar_sesion&estado=error&mensaje=401");
    die();
}

$carrito = (new Carrito())->getCarrito();
if(!$carrito){
    header("Location:../index.php?seccion=tienda&estado=error&mensaje=carrito_vacio");
    die();
}

    try{
        foreach($carrito as $producto){
            (new Carrito())->comprar([
                'fecha_compra'          => $fecha_compra,
                'cantidad'              => $producto["cantidad"],
                'precio_unidad'         => $producto["precio"],
                'precio_total'          => $producto["precio"] * $producto["cantidad"],
                'usuarios_usuario_id'   => $producto["usuario_id"],
                'productos_producto_id' => $producto["producto_id"]
            ]);
        }
        unset($_SESSION["carrito"]);
        header("Location:../index.php?seccion=tienda&estado=ok&mensaje=compra_realizada");
        die();
    } catch (Exception $e){
        header("Location:../index.php?seccion=carrito&estado=error&mensaje=compra_no_realizada");
        die();
    }

        
