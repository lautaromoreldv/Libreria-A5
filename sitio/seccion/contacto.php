<?php
    $nombre_apellido = $_SESSION["form"]["nombre_apellido"] ?? '';
    $email           = $_SESSION["form"]["email"] ?? '';
    $comentario      = $_SESSION["form"]["comentario"] ?? trim('');
?>
<section>
    <div class="container">
        <h1 class="mt-4 mb-4">Contacto</h1>
        <form action="acciones/enviar_form.php" method="post">
            <div class="form-group">
                <label for="nombre_apellido">Nombre y Apellido (obligatorio)</label>
                <input class="form-control" type="text" name="nombre_apellido" id="nombre_apellido" placeholder="Escriba su nombre y apellido.." autocomplete="off"
                value="<?=$nombre_apellido?>">
            </div>
            <div class="form-group">
                <label for="email">E-mail (obligatorio)</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Escriba su e-mail..." autocomplete="off" value="<?=$email?>">
            </div>
            <div class="form-group mt-4">
                <label for="comentario">Deje su comentario (obligatorio)</label>
                <textarea class="form-control" name="comentario" id="comentario" cols="30" rows="5"><?=$comentario?></textarea>
            </div>
            <button type="submit" id="enviar" class="btn btn-dark mb-3 btncontacto">Enviar</button>
        </form>
    </div>
</section>