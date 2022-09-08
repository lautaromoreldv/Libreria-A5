<?php
	$perfil = (new Autenticacion())->getPerfil();
	if($perfil){
		header("Location:index.php?seccion=tienda&estado=error&mensaje=sesion_ya_iniciada");
		die();
	}
	$email = $_SESSION["datos_loguearse"]["email"] ?? '';
?>
<section id="info" class="bg-light"> 
	<article class="container">  	
	<h1 class="mt-4 mb-4">Inicia sesión</h1>
		<form action="autenticacion/loguearse.php" method="POST">
			<div class="row">    
				<div class="form-group col-12 col-md-8 col-lg-6">
					<label for="email">Email</label>
					<input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Ingresar email" autocomplete="off" value="<?=$email?>">
				</div>
			</div>

			<div class="row">  
				<div class="form-group col-12 col-md-8 col-lg-6">
					<label for="contraseña">Contraseña</label>
					<input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Ingrese su contraseña" autocomplete="off">
				</div>
			</div>  

			<button type="submit" class="btn btn-primary btnaccion">Ingresar</button>
		</form>

		<div class="mt-4 mb-4">
			<p>No tengo cuenta
				<a href="index.php?seccion=registrarse">Crear cuenta</a>
			</p>
		</div>
	</article>   
</section>