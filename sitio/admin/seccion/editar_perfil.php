<?php
    $perfil = (new Autenticacion())->getPerfil();
    if(isset($perfil)){
        $id          = $perfil["usuario_id"];
        $nombre      = $perfil["nombre"]; 
        $apellido    = $perfil["apellido"];
        $email       = $perfil["email"];
        $contraseña  = $perfil["contraseña"];
        $usuario     = $perfil["usuario"];
        $tipousuario = $perfil["tipousuario"];
    }
?>
<section id="info"> 
    <div class="bg-light">
        <div class="container">
            <h1 class="mt-4 mb-4">Editar mi perfil</h1>
            <a href="../admin/index.php?seccion=perfil" class="volver"> ← Volver a Mi Perfil</a>
        </div>
            <form action="acciones/edicion_perfil.php" method="POST">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="hidden" name="email_actual" value="<?=$email?>">
                <div class="container">
                    <div class="row mt-4 mb-4">
                        <div class="col-sm">
                            <div class="form-row">
                                <div class="form-group col-12 col-md-4">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="nombre" autocomplete="off" value="<?=$nombre?>">
                                </div>

                                <div class="form-group col-12 col-md-4">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control" name="apellido" id="apellido" autocomplete="off" value="<?=$apellido?>">
                                </div>

                                <div class="form-group col-12 col-md-4">
                                    <label for="usuario">Usuario</label>
                                    <input type="text" class="form-control" name="usuario" id="usuario" autocomplete="off" value="<?=$usuario?>">
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-12 col-md-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" autocomplete="off" value="<?=$email?>">
                                </div>

                                <div class="form-group col-12 col-md-4">
                                    <label for="contraseña">Contraseña</label>
                                    <input type="text" readonly class="form-control" id="contraseña" value="******">
                                    <a href="index.php?seccion=cambiar_contraseña_perfil" class="volver">Cambiar contraseña</a>
                                </div>

                                <div class="form-group col-12 col-md-4">
                                    <label for="tipousuario">Tipo de usuario</label>
                                    <input type="text" readonly class="form-control" name="tipousuario" id="tipousuario" value="<?=$tipousuario == 1 ? 'Administrador' : 'Usuario' ?>">
                                </div>
                            </div>    
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary btnaccion mb-4">Editar perfil</button>    
                </div>    
            </form>   
    </div>    
</section>