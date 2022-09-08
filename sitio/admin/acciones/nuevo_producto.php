<?php
require_once('../../autoload/autoload.php');
require_once('../../configs/config.php');

$perfil = (new Autenticacion())->getPerfil();

    if(!$perfil){
        header("Location:../../index.php?seccion=iniciar_sesion&estado=error&mensaje=401");
        die();
    }

$nombre      = trim($_POST["nombre"]);
$precio      = trim($_POST["precio"]);
$imagen      = $_FILES["imagen"]["name"];
    if($_FILES["imagen"]["size"] == 0){
        $imagen = "producto_default.jpg";
    } else{
        $imagen = $imagen;
        move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../img/productos/". $imagen);
    }
$imagen      = $imagen;
$codigo      = $_POST["codigo"];
$marca       = trim($_POST["marca"]);
$color       = $_POST["color"];
$categoria   = $_POST["categoria"];
$descripcion = trim($_POST["descripcion"]) ? trim($_POST["descripcion"]) : trim('');

$_SESSION["datos"] = $_POST;

if(empty($nombre) || empty($precio) || empty($codigo) || empty($marca) || empty($_POST["color"]) || empty($_POST["categoria"])){
    header("Location:../index.php?seccion=crear_producto&estado=error&mensaje=campos_obligatorios");
    die();
}
if($_FILES["imagen"]["size"] >= 2000000){
 header("Location:../index.php?seccion=crear_producto&estado=error&mensaje=img_peso_maximo");
 die();
}

 if($_FILES["imagen"]["size"] > 0){
     if($_FILES["imagen"]["type"] != "image/jpeg"){
         header("Location:../index.php?seccion=crear_producto&estado=error&mensaje=img_invalida");
         die();
     }
 }

try{    
    (new Producto())->crearProducto([
        'nombre'        => $nombre,
        'precio'        => $precio,
        'imagen'        => $imagen, 
        'descripcion'   => $descripcion, 
        'codigo'        => $codigo, 
        'marca'         => $marca, 
        'colores_id'    => $color, 
        'categorias_id' => $categoria
    ]);
    unset($_SESSION["datos"]);
    header("location:../index.php?seccion=productos&estado=ok&mensaje=producto_creado");
    die();
    } catch(Exception $e){
    header("location:../index.php?seccion=crear_producto&estado=error&mensaje=producto_no_creado");
    die();
}
