<?php
class Autenticacion
{
    public function loguearse($email, $contraseña){
        $usuario = (new Usuario())->traerPorEmail($email);

        if(!password_verify($contraseña, $usuario->getContraseña())){
            header("Location:../index.php?seccion=iniciar_sesion&estado=error&mensaje=contraseña_incorrecta");
            die();
        }
        $sesion = [
            "conectado"   => true,
            "usuario_id"  => $usuario->getUsuarioId(),
            "nombre"      => $usuario->getNombre(),
            "apellido"    => $usuario->getApellido(),
            "email"       => $usuario->getEmail(),
            "contraseña"  => $usuario->getContraseña(),
            "usuario"     => $usuario->getUsuario(),
            "tipousuario" => $usuario->getTipousuariosId()
        ]; 
        $this->setPerfil($sesion);
        return true;
    }

    public function setPerfil($sesion){
       $_SESSION["perfil"] = $sesion;
    }

    public function getPerfil(){
        return $_SESSION["perfil"] ?? '';
     }


    public function cerrarSesion(){
        session_destroy();
    }

}