<?php
require_once('../../autoload/autoload.php');
require_once('../../configs/config.php');

$perfil = (new Autenticacion())->getPerfil();

    if(!$perfil){
        header("Location:../../index.php?seccion=iniciar_sesion&estado=error&mensaje=401");
        die();
    }

$nombre               = empty($_POST["nombre"]) ? trim('') : trim($_POST["nombre"]);
$apellido             = empty($_POST["apellido"]) ? trim('') : trim($_POST["apellido"]);
$email                = trim($_POST["email"]);
$contraseña           = trim($_POST["contraseña"]);
$contraseña_hasheada  = password_hash($contraseña, PASSWORD_DEFAULT);
$usuario_aut          = explode("@", $email)[0];
$usuario              = !isset($_POST["usuario"]) || strlen(trim($_POST["usuario"])) == 0 ? $usuario_aut : trim($_POST["usuario"]);
$tipousuario          = empty($_POST["tipousuario"]) ? 2 : $_POST["tipousuario"];


$_SESSION["datos_user"] = $_POST;

if(strlen($nombre) > 45){
    header("Location:../index.php?seccion=crear_usuario&estado=error&mensaje=nombre_excedido");
    die();
}
if(strlen($apellido) > 45){
    header("Location:../index.php?seccion=crear_usuario&estado=error&mensaje=apellido_excedido");
    die();
}
if(strlen($email) > 45){
    header("Location:../index.php?seccion=crear_usuario&estado=error&mensaje=email_excedido");
    die();
}
if(strlen($contraseña) < 4 || strlen($contraseña) > 45){
    header("Location:../index.php?seccion=crear_usuario&estado=error&mensaje=max_min_contraseña");
    die();
}
if(strlen($usuario) > 45){
    header("Location:../index.php?seccion=crear_usuario&estado=error&mensaje=usuario_excedido");
    die();
}


if(empty($email) || empty($contraseña)){
    header("Location:../index.php?seccion=crear_usuario&estado=error&mensaje=campos_obligatorios");
    die();
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location:../index.php?seccion=crear_usuario&estado=error&mensaje=email_incorrecto");
    die();
}

$email_existe = (new Usuario())->compararEmail($email);
if($email_existe){
    header("Location:../index.php?seccion=crear_usuario&estado=error&mensaje=email_existente");
    die();
} 

try{    
    $db = (new DB())->getDB();
    $query = "INSERT INTO usuarios (nombre, apellido, email, contraseña, usuario, tipousuarios_id) 
                    VALUES (?, ?, ?, ?, ?, ?)"; 
    $stmt = $db->prepare($query);
    $stmt->execute([
        $nombre, 
        $apellido, 
        $email, 
        $contraseña_hasheada, 
        $usuario, 
        $tipousuario
    ]);
    unset($_SESSION["datos_user"]);
    header("location:../index.php?seccion=usuarios&estado=ok&mensaje=usuario_creado");
    die();
    } catch(Exception $e){
        header("location:../index.php?seccion=crear_usuario&estado=error&mensaje=usuario_no_creado");
        die();
}
