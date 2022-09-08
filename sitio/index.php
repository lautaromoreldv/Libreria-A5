<?php
    require_once('configs/config.php');
    require_once('configs/arrays.php');
    require_once('autoload/autoload.php');
    
    $seccion = $_GET["seccion"] ?? 'inicio';

    $perfil = (new Autenticacion())->getPerfil();
    if(isset($perfil)){
        $usuario     = isset($perfil["usuario"]) ? $perfil["usuario"] : '';
        $tipousuario = isset($perfil["tipousuario"]) ? $perfil["tipousuario"] : '';
    }
    if($tipousuario == 1){
        header("Location:admin/index.php?estado=error&mensaje=401_usuario_admin");
        die();
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="favicon.ico">
    <title>Librearía A5 - <?=ucwords(str_replace('_', ' ', $seccion))?></title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container barra">
                <a class="navbar-brand" href="index.php">
                    <img src="img/icono.jpg" alt="Librería A5" class="icono"> 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <?php
                            foreach($navbar as $item => $datos):
                                if(!$datos["visible"])
                                    continue;
                        ?>
                            <li class="nav-item <?=$item == $seccion ? "active" : "" ?>">
                                <a class="nav-link active" href="index.php?seccion=<?=$item?>"><?=$datos["nombre"]?></a>
                            </li>
                        <?php
                            endforeach;
                        ?>
                    </ul>

                    <?php
                        if($perfil): 
                    ?>
                        <ul class="navbar-nav ml-auto mt-3">		
                            <li class="nav-item mr-2">
                                <p><strong><?=$perfil["usuario"]?></strong></p>
                            </li>
                            <li class="nav-item">
                                <form action="autenticacion/cerrar_sesion.php" method="post">
                                    <button type="submit" id="cerrar_sesion">Cerrar sesión</button>
                                </form>
                            </li>
                                        
                        </ul>
                    <?php
                        endif;
                    ?>		

                    <?php
					    if(!$perfil): 
				    ?>
                    <ul class="navbar-nav ml-auto">
                        <?php
                            foreach($auth as $item => $datos):
                                if(!$datos["visible"])
                                    continue;
                        ?>
                            <li class="nav-item <?=$item == $seccion ? "active" : "" ?>">
                                <a class="nav-link active" href="index.php?seccion=<?=$item?>"><?=$datos["nombre"]?></a>
                            </li>
                        <?php
                            endforeach;
                        ?>
                    </ul>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php
            if(!empty($_GET["estado"])){
                $estado = $_GET["estado"] == "ok" ? "success" : "danger";
                if(!empty($_GET["mensaje"])){
                    $mensaje = $_GET["mensaje"];
                    if(isset($errores[$seccion]) && array_key_exists($mensaje, $errores[$seccion])):
        ?>
        <div class="alert alert-<?=$estado;?> alert-dismissible fade show" role="alert" id="alerta_mensaje">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <div class="container">
                <?=$errores[$seccion][$mensaje];?>
            </div>
        </div>
        <?php
                    unset($_SESSION["estado"]);
                    unset($_SESSION["mensaje"]);	
                endif;
                }
            }
        ?>

        <?php
            if(!empty($_GET["seccion"])){
                $seccion = $_GET["seccion"];

                if(array_key_exists($seccion, $navbar)){
                    require_once("seccion/$seccion.php");
                } else{
                    require_once("seccion/404.php");
                }
            } else{
                require_once("seccion/$seccion.php");
            }
        ?>
    </main>

    <footer id="footer">
        <div class="container text-center">
            <p id="pFooter">© Librería A5 todos los derechos reservados 2022</p>
        </div>
    </footer>

    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/index.js"></script>
</body>
</html>