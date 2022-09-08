<?php
require_once('../../autoload/autoload.php');
require_once('../../configs/config.php');

$perfil = (new Autenticacion())->getPerfil();

    if(!$perfil){
        header("Location:../../index.php?seccion=iniciar_sesion&estado=error&mensaje=401");
        die();
    }

$id                  = $_POST["id"];
$nombre              = empty($_POST["nombre"]) ? trim('') : trim($_POST["nombre"]);
$apellido            = empty($_POST["apellido"]) ? trim('') : trim($_POST["apellido"]);
$email_actual        = trim($_POST["email_actual"]);
$email               = empty($_POST["email"]) ? $email = $email_actual : trim($_POST["email"]);
$usuario             = !isset($_POST["usuario"]) || strlen(trim($_POST["usuario"])) == 0 ? explode("@", $email)[0] : trim($_POST["usuario"]);
$tipousuario         = $_POST["tipousuario"] == 'Administrador' ? 1 : 2;

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location:../index.php?seccion=editar_perfil&estado=error&mensaje=email_incorrecto");
    die();
}

if(strlen($nombre) > 45){
    header("Location:../index.php?seccion=editar_perfil&estado=error&mensaje=nombre_excedido");
    die();
}
if(strlen($apellido) > 45){
    header("Location:../index.php?seccion=editar_perfil&estado=error&mensaje=apellido_excedido");
    die();
}
if(strlen($email) > 45){
    header("Location:../index.php?seccion=editar_perfil&estado=error&mensaje=email_excedido");
    die();
}
if(strlen($usuario) > 45){
    header("Location:../index.php?seccion=editar_perfil&estado=error&mensaje=usuario_excedido");
    die();
}


try{
    $db = (new DB())->getDB();
    $query = "UPDATE usuarios
                    SET nombre = ?, apellido = ?, email = ?, usuario = ?, tipousuarios_id = ?
                    WHERE usuario_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([
            $nombre,
            $apellido,
            $email,
            $usuario,
            $tipousuario,
            $id
    ]);
    $_SESSION["perfil"]["nombre"]      = $nombre; 
    $_SESSION["perfil"]["apellido"]    = $apellido;
    $_SESSION["perfil"]["email"]       = $email;
    $_SESSION["perfil"]["usuario"]     = $usuario;
    $_SESSION["perfil"]["tipousuario"] = $tipousuario;

    header("location:../index.php?seccion=perfil&estado=ok&mensaje=perfil_editado");
    die();
} catch(Exception $e){
    header("location:../index.php?seccion=editar_perfil&estado=error&mensaje=perfil_no_editado");
    die();
}