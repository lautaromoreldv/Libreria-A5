<?php
    $usuario_id  = $_GET["id"];
    $productos   = (new UsuarioCompra())->traerProductosPorUsuario($usuario_id);

    $usuario = (new Usuario())->traerPorId($usuario_id);
    if($usuario->getTipousuario() == 'Administrador'){
        header("Location:index.php?seccion=usuarios&estado=error&mensaje=admin_sin_carrito");
        die();
    }
?>
<section id="info"> 
    <div class="bg-light"> 
        <h1 class="container mt-4 mb-4">Listado de compras</h1>
          <div class="container">
        <a href="index.php?seccion=usuarios" class="volver"> ← Volver a usuarios</a>
            <?php
                if($productos){
            ?>
                <div class="row mt-4 mb-4">
                    <div class="table-responsive"> 
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Fecha de compra</th>
                                    <th scope="col">Imagen del producto</th>
                                    <th scope="col">Nombre del producto</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    foreach($productos as $producto):
                                ?>
                                    <tr>
                                        <td><?=$producto->fecha_compra?></td>
                                        <td>
                                            <img src="../img/productos/<?=$producto->imagen?>" alt="<?=$producto->nombre?>" class="img-thumbnail">
                                        </td>
                                        <td><?=ucfirst($producto->nombre)?></td>
                                        <td>#<?=$producto->codigo?></td>
                                        <td><?=ucfirst($producto->marca)?></td>
                                        <td>$<?=$producto->precio_unidad?></td>
                                        <td><?=$producto->cantidad?></td>
                                        <td>$<?=$producto->cantidad * $producto->precio_unidad?></td>
                                    </tr>
                                <?php
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>       
                </div>
            <?php
                } else{
            ?>
                <h2 class="mt-4 mb-4">Este usuario todavia no realizó compras.</h2>
            <?php
                }
            ?>
          </div>
    </div>
</section>