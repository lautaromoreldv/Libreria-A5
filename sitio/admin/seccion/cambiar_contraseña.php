<?php
$id = $_GET["usuario_id"];
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
            <h1 class="mt-4 mb-4">Cambiar contraseña de <strong><?=ucfirst($usuario->getUsuario())?></strong></h1>
            <a href="index.php?seccion=editar_usuario&id=<?=$id?>" class="volver"> ← Volver a editar al usuario <strong><?=ucfirst($usuario->getUsuario())?></strong></a>
        </div>
        <form action="../admin/acciones/cambiar_contraseña.php" method="POST">
            <input type="hidden" name="id" value="<?=$id?>">
            <div class="container">
                <div class="row mt-4 mb-4">
                    <div class="col-sm">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="contraseña">Nueva contraseña</label>
                                <input type="password" class="form-control" name="contraseña" id="contraseña" autocomplete="off" placeholder="Escriba su contraseña">
                            </div>

                            <div class="form-group col-12">
                                <label for="contraseña_confirmar">Vuelva a escribir su nueva contraseña</label>
                                <input type="password" class="form-control" name="contraseña_confirmar" id="contraseña_confirmar" autocomplete="off" placeholder="Vuelva a escribir su contraseña">
                            </div>
                        </div>    
                    </div>
                </div>
            <button type="submit" class="btn btn-primary btnaccion mb-4">Cambiar contraseña</button>    
            </div>    
        </form>   
    </div>    
</section>