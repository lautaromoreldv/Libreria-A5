<?php
$perfil = (new Autenticacion())->getPerfil();

if(!$perfil){
    header("Location:index.php?seccion=iniciar_sesion&estado=error&mensaje=carrito_sin_user");
    die();
}

$carrito = (new Carrito())->getCarrito();
$subtotal = 0;
$total = 0;
$i = 0;
?>
<section id="carrito">
    <article class="bg-light">
        <div class="container">
            <div class="pt-4 pb-2">
                <h2>Carrito</h2>
            </div>
            <div class="mb-3">
                <a href="index.php?seccion=tienda" class="volver"> ← Volver a la tienda</a>
            </div>

            <?php
                if($carrito){
            ?>  
                <form action="acciones/borrar_carrito.php" method="post">
                    <button class="btn btn-outline-danger mb-2">Vaciar carrito</button>
                </form>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Precio unidad</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($carrito as $producto):
                                        $subtotal = $producto["precio"] * $producto["cantidad"];
                                        $total += $subtotal;
                                ?>
                                    <tr>     
                                        <td><img src="img/productos/<?=$producto["imagen"]?>" alt="<?=$producto["nombre"]?>" class="img-thumbnail"></td> 
                                        <td><?=ucfirst($producto["nombre"])?></td>
                                        <td><?=ucfirst($producto["marca"])?></td>
                                        <td>#<?=$producto["codigo"]?></td>
                                        <td><?=ucfirst($producto["color"])?></td>
                                        <td><?=ucfirst($producto["categoria"])?></td>
                                        <td>$<?=$producto["precio"]?></td>
                                        <td><?=ucfirst($producto["cantidad"])?>u.</td>    
                                        <td>$<?=$subtotal?></td>
                                        <td>
                                            <form action="acciones/eliminar_producto.php" method="post">
                                                <input type="hidden" name="i" value="<?=$i?>">
                                                <?php
                                                    $i++;
                                                ?>
                                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>  
                                <?php  
                                    endforeach;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="9"><strong>Total</strong></td>
                                    <td><strong>$<?=$total?></strong></td>
                                </tr>
                            </tfoot>
                        </table>  
                    </div>

                    <div class="mt-4 mb-4">
                        <form action="acciones/comprar.php" method="post">
                            <button type="submit" class="btn btn-primary btnaccion btn-lg">Pagar</button>
                        </form>  
                    </div>
            <?php
                }
                else{
            ?>  
                <h2 class="mb-4">El carrito se encuentra vacío.</h2>
            <?php
                };
            ?>
        </div>
    </article>
</section>