<?php
	$perfil = (new Autenticacion())->getPerfil();
	if($perfil){
		header("Location:index.php?seccion=tienda&estado=error&mensaje=sesion_ya_iniciada");
		die();
	}
  $nombre = $_SESSION["datos_registrarse"]["nombre"] ?? '';
  $apellido = $_SESSION["datos_registrarse"]["apellido"] ?? '';
  $email = $_SESSION["datos_registrarse"]["email"] ?? '';
  $usuario = $_SESSION["datos_registrarse"]["usuario"] ?? '';
?>
<section id="info" class="bg-light"> 
    <article class="container">  
    	<h1 class="mt-4 mb-4">Registrate</h1>
		<form action="autenticacion/registrarse.php" method="POST">
			<div class="row">
				<div class="form-group col-12 col-md-6">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="nombre" autocomplete="off" placeholder="Escriba su nombre" value="<?=$nombre?>">
				</div>
				
				<div class="form-group col-12 col-md-6">
					<label for="apellido">Apellido</label>
					<input type="text" class="form-control" name="apellido" id="apellido" aria-describedby="nombre" autocomplete="off" placeholder="Escriba su apellido" value="<?=$apellido?>">
				</div>

				
				<div class="form-group col-12 col-md-6">
					<label for="email">Email <span class="text-secondary">(obligatorio)</label>
					<input type="email" class="form-control" name="email" id="email" aria-describedby="email" autocomplete="off" placeholder="Escriba email" value="<?=$email?>">
				</div>

				<div class="form-group col-12 col-md-6">
					<label for="contraseña">Contraseña <span class="text-secondary">(obligatorio)</label>
					<input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Escriba su contraseña">
				</div>

				<div class="form-group col-12 col-md-6">
					<label for="usuario">Nombre de usuario</label>
					<input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="usuario" autocomplete="off" placeholder="Escriba su nombre de usuario" value="<?=$usuario?>">
				</div>
			</div>
			<button type="submit" class="btn btn-primary btnaccion mt-2">Registrarse</button>
		</form>    
        
          <div class="mt-4 pb-3">
              <p>Ya tengo una cuenta
              	<a href="index.php?seccion=iniciar_sesion">Iniciar sesión</a>
              </p>
          </div>
    </article>
</section>