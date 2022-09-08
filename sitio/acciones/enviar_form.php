<?php
require_once('../autoload/autoload.php');
require_once('../configs/config.php');

$perfil = (new Autenticacion())->getPerfil();

if(!$perfil){
    header("Location:../index.php?seccion=iniciar_sesion&estado=error&mensaje=401");
    die();
}

$_SESSION["form"] = $_POST;

if(empty(trim($_POST["nombre_apellido"]))) {
    header('Location: ../index.php?seccion=contacto&estado=error&mensaje=nom_apell_obligatorio');
    die();
} elseif(is_numeric($_POST["nombre_apellido"])){
        header('Location: ../index.php?seccion=contacto&estado=error&mensaje=nom_apell_incorrecto');
        die();
    }

if(empty(trim($_POST["email"]))) {
    header('Location: ../index.php?seccion=contacto&estado=error&mensaje=email_obligatorio');
    die();
} elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        header('Location: ../index.php?seccion=contacto&estado=error&mensaje=email_incorrecto');
        die();
    }

if(empty(trim($_POST["comentario"]))) {
    header('Location: ../index.php?seccion=contacto&estado=error&mensaje=comentario_obligatorio');
    die();
}



header('Location:../index.php?seccion=contacto&estado=ok&mensaje=form_enviado');
unset($_SESSION["form"]);
die();