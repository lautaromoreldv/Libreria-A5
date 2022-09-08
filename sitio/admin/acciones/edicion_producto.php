<?php
require_once('../../autoload/autoload.php');
require_once('../../configs/config.php');

$perfil = (new Autenticacion())->getPerfil();

    if(!$perfil){
        header("Location:../../index.php?seccion=iniciar_sesion&estado=error&mensaje=401");
        die();
    }

$id          = $_POST["id"];
$nombre      = trim($_POST["nombre"]);
$precio      = trim($_POST["precio"]);
$data_img    = $_POST["data_img"];
$imagen      = $_FILES["imagen"]["name"];
    if($_FILES["imagen"]["size"] == 0){
        if(!empty($data_img)){
            $imagen = $data_img;
        } else{
                $imagen = "../../img/producto_default.jpg";
            }
    } 
    if($_FILES["imagen"]["size"] > 0){
        if($_FILES["imagen"]["type"] != "image/jpeg"){
            header("Location:../index.php?seccion=editar_producto&id=$id&estado=error&mensaje=img_invalida");
            die();
        }
        if($_FILES["imagen"]["size"] >= 2000000){
            header("Location:../index.php?seccion=editar_producto&id=$id&estado=error&mensaje=img_peso_maximo");
            die();
        }
        if($_FILES["imagen"]["size"] > 0 && $_FILES["imagen"]["size"] <= 2000000 && $_FILES["imagen"]["type"] == "image/jpeg"){
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "../../img/productos/". $imagen);
                if($data_img != 'producto_default.jpg'){
                    unlink("../../img/productos/" . $data_img);
                }
        }
    } 
    
$imagen      = $imagen;
$descripcion = trim($_POST["descripcion"]) ? trim($_POST["descripcion"]) : trim('');
$codigo      = trim($_POST["codigo"]);
$marca       = trim($_POST["marca"]);
$color       = trim($_POST["color"]);
$categoria   = trim($_POST["categoria"]);

if(empty($nombre) || empty($precio) || empty($codigo) || empty($marca) || empty($color) || empty($categoria)){
    header("Location:../index.php?seccion=editar_producto&id=$id&estado=error&mensaje=campos_obligatorios");
    die();
}


 try{
    (new Producto())->editarProducto([
        'producto_id'   => $id,
        'nombre'        => $nombre,
        'precio'        => $precio,
        'imagen'        => $imagen, 
        'descripcion'   => $descripcion, 
        'codigo'        => $codigo, 
        'marca'         => $marca, 
        'colores_id'    => $color, 
        'categorias_id' => $categoria
    ]);
    header("location:../index.php?seccion=productos&estado=ok&mensaje=producto_editado");
    die();
} catch(Exception $e){
    header("location:../index.php?seccion=editar_producto&id=$id&estado=error&mensaje=producto_no_editado");
    die();
}