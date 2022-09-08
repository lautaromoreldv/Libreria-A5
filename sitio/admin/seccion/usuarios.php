<?php
    $usuarios = (new Usuario())->traerUsuarios();
?>
<section id="info"> 
    <div class="bg-light"> 
        <h1 class="container mt-4 mb-4">Administración de Usuarios</h1>
          <div class="container">
            <a href="index.php?seccion=crear_usuario" class="btn btn-success mb-4">Crear usuario</a>
              <div class="row">
                <div class="table-responsive"> 
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nombre de usuario</th>
                                <th scope="col">Tipo de usuario</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Borrar</th>
                                <th scope="col">Ver compras</th>
                            </tr>
                        </thead>

                        <tbody>
                                <?php
                                    foreach($usuarios as $usuario):
                                ?>
                            <tr>
                                <td><?=$usuario->getUsuarioId()?></td>
                                <td><?=substr(ucfirst($usuario->getNombre()), 0, 20)?></td>
                                <td><?=substr(ucfirst($usuario->getApellido()), 0, 20)?></td>
                                <td><?=substr($usuario->getEmail(), 0, 45)?></td> 
                                <td><?=substr($usuario->getUsuario(), 0, 15)?></td>
                                <td><?=$usuario->getTipousuario()?></td>
                                <td><a href="index.php?seccion=editar_usuario&id=<?=$usuario->getUsuarioId()?>" class="btn btn-primary">Editar</a></td>
                                <td>
                                    <form action="index.php?seccion=confirmar_eliminar_usuario&id=<?=$usuario->getUsuarioId()?>" method="post">
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                </td>
                                <td>
                                    <?php
                                        if($usuario->getTipousuario() == 'Usuario'):
                                    ?>
                                            <a href="index.php?seccion=ver_compras&id=<?=$usuario->getUsuarioId()?>" class="btn btn-outline-info">Ver compras</a>
                                    <?php
                                        endif;
                                    ?>
                                </td>
                                <?php
                                    endforeach;
                                ?>
                            </tr>
                        </tbody>
                    </table> 
                </div>      
              </div>
          </div>
    </div>
</section>