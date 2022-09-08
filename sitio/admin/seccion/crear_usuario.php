<?php
    $tipousuarios = (new Tipousuario())->traerTiposUsuarios();
    $nombre           = $_SESSION["datos_user"]["nombre"] ?? '';
    $apellido         = $_SESSION["datos_user"]["apellido"] ?? '';
    $usuario          = $_SESSION["datos_user"]["usuario"] ?? '';
    $email            = $_SESSION["datos_user"]["email"] ?? '';
    $tipousuario_dato = $_SESSION["datos_user"]["tipousuario"] ?? '';
?>
<section id="info"> 
    <div class="bg-light">
        <div class="container">
            <h1 class="mt-4 mb-4">Crear usuario</h1>
            <a href="index.php?seccion=usuarios" class="volver"> ← Volver a Usuarios</a>
        </div>
            <form action="acciones/nuevo_usuario.php" enctype="multipart/form-data" method="POST">
                <div class="container">
                    <div class="row mt-4 mb-4">
                        <div class="col-sm">
                            <div class="form-row">
                                <div class="form-group col-12 col-md-4">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="nombre" placeholder="Ingrese un nombre" autocomplete="off" value="<?=$nombre?>">
                                </div>

                                <div class="form-group col-12 col-md-4">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese un apellido" autocomplete="off" value="<?=$apellido?>">
                                </div>

                                <div class="form-group col-12 col-md-4">
                                    <label for="usuario">Nombre de usuario</label>
                                    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="juanperez" autocomplete="off" value="<?=$usuario?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-12 col-md-4">
                                    <label for="email">Email <span class="text-secondary">(obligatorio)</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="email@ejemplo.com" autocomplete="off" value="<?=$email?>">
                                </div>

                                <div class="form-group col-12 col-md-4">
                                    <label for="contraseña">Contraseña <span class="text-secondary">(obligatorio)</span></label>
                                    <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="****" autocomplete="off">
                                </div>

                                <div class="form-group col-12 col-md-4">
                                    <label for="tipousuario">Tipo de usuario</label>
                                    <select name="tipousuario" id="tipousuario" class="form-control">
                                        <option value="">Elegir tipo de usuario</option>
                                            <?php
                                                foreach($tipousuarios as $tipousuario):
                                            ?>
                                        <option <?=$tipousuario->getId() == $tipousuario_dato ? "selected" : '' ?> value="<?=$tipousuario->getId()?>"><?=$tipousuario->getTipousuario()?></option>
                                            <?php
                                                endforeach;
                                            ?>
                                    </select>
                                </div>
                            </div>    
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary btnaccion mb-4">Crear usuario</button>    
                </div>
            </form>      
    </div>    
</section>