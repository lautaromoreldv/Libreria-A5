<?php
$perfil = (new Autenticacion())->getPerfil();
?>
<section id="info"> 
    <div class="bg-light">
        <div class="container">
            <h1 class="mt-4 mb-4">Cambiar contraseña de mi perfil</h1>
            <a href="index.php?seccion=editar_perfil" class="volver"> ← Volver a editar a <strong>Mi perfil</strong></a>
        </div>
        <form action="../admin/acciones/cambiar_contraseña_perfil.php" method="POST">
            <input type="hidden" name="id" value="<?=$perfil["usuario_id"]?>">
            <div class="container">
                <div class="row mt-4 mb-4">
                    <div class="col-sm">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="contraseña_perfil">Nueva contraseña</label>
                                <input type="password" class="form-control" name="contraseña_perfil" id="contraseña_perfil" autocomplete="off" placeholder="Escriba su contraseña">
                            </div>

                            <div class="form-group col-12">
                                <label for="contraseña_confirmar_perfil">Vuelva a escribir su nueva contraseña</label>
                                <input type="password" class="form-control" name="contraseña_confirmar_perfil" id="contraseña_confirmar_perfil" autocomplete="off" placeholder="Vuelva a escribir su contraseña">
                            </div>
                        </div>    
                    </div>
                </div>
            <button type="submit" class="btn btn-primary btnaccion mb-4">Cambiar contraseña</button>    
            </div>    
        </form>   
    </div>    
</section>