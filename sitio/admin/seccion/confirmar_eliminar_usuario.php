<?php
    $id = $_GET["id"];
    $usuario = (new Usuario())->traerPorId($id);
    if(!$usuario){
        header("Location:index.php?seccion=usuarios&estado=error&mensaje=usuario_no_encontrado");
        die();
    }
    if($usuario->getTipousuario() == 'Administrador'){
        header("Location:index.php?seccion=usuarios&estado=error&mensaje=admin_no_borrado");
        die();
    }
    
?>
<section>
    <div class="container">
        <h1 class="mt-4 mb-4">¿Confirma que quiere borrar el usuario <strong><?=ucfirst($usuario->getUsuario())?>?</strong></h1>
        <a href="index.php?seccion=usuarios" class="volver"> ← Volver a usuarios</a>
                <div class="col-12 mt-4 mb-4 text-center">
                    <p><strong>Nombre: </strong><?=empty($usuario->getNombre()) ? 'Sin nombre' : ucfirst($usuario->getNombre())?></p>
                    <p><strong>Apellido: </strong><?=empty($usuario->getApellido()) ? 'Sin apellido' : ucfirst($usuario->getApellido())?></p>
                    <p><strong>Email: </strong><?=$usuario->getEmail()?></p>
                    <p><strong>Nombre de usuario: </strong><?=$usuario->getUsuario()?></p>
                    <p><strong>Rol: </strong><?=ucfirst($usuario->getTipousuario())?></p>
                        <form action="acciones/eliminar_usuario.php" method="post">
                            <input type="hidden" name="id" value="<?=$id?>">
                                <button type="submit" class="btn btn-danger btn-lg btnborrar mt-2">Borrar usuario</button>
                        </form>    
                </div>
    </div>
</section>
