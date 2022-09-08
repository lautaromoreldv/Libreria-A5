<?php
require_once("../configs/config.php");
require_once("../autoload/autoload.php");

$auth = new Autenticacion;
if(!$auth->getPerfil()){
    header("Location:../index.php?seccion=tienda&estado=error&mensaje=sin_sesion");
	die();
}

$auth->cerrarSesion();

header("Location:../index.php?seccion=tienda&estado=ok&mensaje=sesion_cerrada");
die();
