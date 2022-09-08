<?php
require_once("../configs/config.php");
require_once("../autoload/autoload.php");

$_SESSION["datos_registrarse"] = $_POST;

$nombre               = empty($_POST["nombre"]) ? trim('') : trim($_POST["nombre"]);
$apellido             = empty($_POST["apellido"]) ? trim('') : trim($_POST["apellido"]);
$email                = trim($_POST["email"]);
$contraseña           = trim($_POST["contraseña"]);
$contraseña_hasheada  = password_hash($contraseña, PASSWORD_DEFAULT);
$usuario_aut          = explode("@", $email)[0];
$usuario              = empty($_POST["usuario"]) ? $usuario_aut : trim($_POST["usuario"]);


if(empty($email) || empty($contraseña)){
    header("Location:../index.php?seccion=registrarse&estado=error&mensaje=campos_obligatorios");
    die();
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location:../index.php?seccion=registrarse&estado=error&mensaje=email_incorrecto");
    die();
}

try{ 
    $db = (new DB())->getDB();
    $query = "INSERT INTO usuarios (nombre, apellido, email, contraseña, usuario)
                VALUES (?, ?, ?, ?, ?)"; 
    $stmt = $db->prepare($query);
    $stmt->execute([
        $nombre,
        $apellido,
        $email,
        $contraseña_hasheada,
        $usuario
    ]);
    unset($_SESSION["datos_registrarse"]);

    $auth = (new Autenticacion())->loguearse($email, $contraseña);
    header("Location:../index.php?seccion=tienda&estado=ok&mensaje=registro_ok");
    die();
} catch(Exception $e){
    header("Location:../index.php?seccion=registrarse&estado=error&mensaje=registro_error");
    die();
}