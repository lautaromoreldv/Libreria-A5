<?php
    $perfil = (new Autenticacion())->getPerfil();

    if(!$perfil){
        header("Location:index.php?seccion=iniciar_sesion&estado=error&mensaje=sin_perfil");
        die();
    }
    
    if(isset($perfil)){
        $nombre      = !empty($perfil["nombre"]) ? $perfil["nombre"] : 'Sin nombre'; 
        $apellido    = !empty($perfil["apellido"]) ? $perfil["apellido"] : 'Sin apellido';
        $email       = $perfil["email"];
        $usuario     = $perfil["usuario"];
        $tipousuario = $perfil["tipousuario"];
    }
    
    if($tipousuario == 1){
        $tipousuario = 'Administrador';
    } else{
        $tipousuario = 'Usuario';
    }
?>
<section>
    <div class="container">
        <h1 class="mt-4 mb-4">Mi Perfil</h1>
            <div class="row mt-4 mb-4">
                <div class="col-12 col-sm-6">
                    <p><strong>Nombre: </strong><?=ucfirst($nombre)?></p>
                    <p><strong>Apellido: </strong><?=ucfirst($apellido)?></p>
                    <p><strong>Email: </strong><?=$email?></p>
                    <p><strong>Nombre de usuario: </strong><?=$usuario?></p>
                    <p><strong>Rol: </strong><?=$tipousuario?></p>
                    <a href="index.php?seccion=editar_perfil" class="btn btn-primary btnaccion mt-2">Editar perfil</a>
                </div>
        </div>
    </div>
</section>