<?php
    $id = $_GET["id"];
    $usuario = (new Usuario())->traerPorId($id);

    if(!$usuario){
        header("Location:index.php?seccion=usuarios&estado=error&mensaje=usuario_no_encontrado");
        die();
    }
    if($usuario->getTipousuario() == 'Administrador'){
        header("Location:index.php?seccion=usuarios&estado=error&mensaje=admin_no_editado");
        die();
    }

?>
<section id="info"> 
    <div class="bg-light">
    <div class="container">
        <h1 class="mt-4 mb-4">Editar usuario</h1>
        <a href="index.php?seccion=usuarios" class="volver"> ← Volver a Usuarios</a>
    </div>
        <form action="acciones/edicion_usuario.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="id" value="<?=$usuario->getUsuarioId()?>">
            <input type="hidden" name="email_actual" value="<?=$usuario->getEmail()?>">
            <div class="container">
                <div class="row mt-4 mb-4">
                    <div class="col-sm">
                        <div class="form-row">
                            <div class="form-group col-12 col-md-4">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="nombre" autocomplete="off" value="<?=$usuario->getNombre() ? $usuario->getNombre() : ''?>">
                            </div>

                            <div class="form-group col-12 col-md-4">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" autocomplete="off" value="<?=$usuario->getApellido() ? $usuario->getApellido() : ''?>">
                            </div>

                            <div class="form-group col-12 col-md-4">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" name="usuario" id="usuario" autocomplete="off" value="<?=$usuario->getUsuario() ? $usuario->getUsuario() : ''?>">
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-12 col-md-4">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" autocomplete="off" value="<?=$usuario->getEmail() ? $usuario->getEmail() : ''?>">
                            </div>

                            <div class="form-group col-12 col-md-4">
                                <label for="contraseña">Contraseña</label>
                                <input type="password" readonly class="form-control mb-1" id="contraseña" value="*******">
                                <a href="index.php?seccion=cambiar_contraseña&usuario_id=<?=$usuario->getUsuarioId()?>" class="volver">Cambiar contraseña</a>
                            </div>

                            <div class="form-group col-12 col-md-4">
                                <label for="tipousuario">Tipo de usuario</label>
                                <input type="text" readonly class="form-control" name="tipousuario" id="tipousuario" value="<?=$usuario->getTipousuario()?>">
                            </div>
                        </div>    
                    </div>
                </div>
            <button type="submit" class="btn btn-primary btnaccion mb-4">Editar usuario</button>    
            </div>    
        </form>   
    </div>    
</section>