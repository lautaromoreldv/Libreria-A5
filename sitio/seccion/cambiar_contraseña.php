<?php
$perfil = (new Autenticacion())->getPerfil();
if(!$perfil){
    header("Location:index.php?seccion=iniciar_sesion&estado=error&mensaje=requiere_sesion");
    die();
}
?>
<section id="info"> 
    <div class="bg-light">
        <div class="container">
            <h1 class="mt-4 mb-4">Cambiar contraseña de mi perfil</h1>
            <a href="index.php?seccion=editar_perfil" class="volver"> ← Volver a editar a <strong>Mi perfil</strong></a>
        </div>
        <form action="acciones/cambiar_contraseña.php" method="POST">
            <input type="hidden" name="id" value="<?=$perfil["usuario_id"]?>">
            <div class="container">
                <div class="row mt-4 mb-4">
                    <div class="col-sm">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="contraseña_perfil">Nueva contraseña</label>
                                <input type="password" class="form-control" name="contraseña_usuario" id="contraseña_usuario" autocomplete="off" placeholder="Escriba su contraseña">
                            </div>

                            <div class="form-group col-12">
                                <label for="contraseña_confirmar_perfil">Vuelva a escribir su nueva contraseña</label>
                                <input type="password" class="form-control" name="contraseña_confirmar_usuario" id="contraseña_confirmar_usuario" autocomplete="off" placeholder="Vuelva a escribir su contraseña">
                            </div>
                        </div>    
                    </div>
                </div>
            <button type="submit" class="btn btn-primary btnaccion mb-4">Cambiar contraseña</button>    
            </div>    
        </form>   
    </div>    
</section>