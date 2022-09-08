<?php
    $id = $_GET["id"];
    $producto = (new Producto())->traerPorId($id);
    $perfil = (new Autenticacion())->getPerfil();

    if(!$producto){
        header("Location:index.php?seccion=tienda&estado=error&mensaje=producto_no_encontrado");
        die();
    }
?>
<section>
    <div class="container">
        <h1 class="mt-4 mb-4">Información del producto</h1>
        <a href="index.php?seccion=tienda" class="volver"> ← Volver a la tienda</a>
            <div class="row mt-4 mb-4">
                <div class="col-12 col-sm-6 text-center" id="imgProd">
                    <img src="img/productos/<?=$producto->getImagen()?>" alt="<?=$producto->getNombre()?>" class="img-fluid">
                </div>

                <div class="col-12 col-sm-6">
                    <h2 class="text-center" id="titleProd"><?=ucfirst($producto->getNombre())?></h2>
                    <p><strong>Categoría: </strong><?=ucfirst($producto->getCategoria())?></p>
                    <p><strong>Marca: </strong><?=ucfirst($producto->getMarca())?></p>
                    <p><strong>Descripción: </strong><?=ucfirst($producto->getDescripcion())?></p>
                    <p><strong>Precio: </strong><strong id="precioProd">$<?=$producto->getPrecio()?></strong></p>
                    <p id="codigo"><strong>Código: </strong>#<?=$producto->getCodigo()?></p>
                    <p><strong>Color: </strong><?=ucfirst($producto->getColor())?></p>

                    <?php
                        if($perfil):
                    ?>  
                        <form action="acciones/añadir_al_carrito.php" method="post">
                                <input type="hidden" name="id" value="<?=$producto->getProductoId()?>">

                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="cantidad"><strong>Cantidad</strong></label>
                                    <select class="form-control" name="cantidad" id="cantidad">
                                        <option value="">Elegir cantidad</option>
                                            <?php
                                                for($valor = 1; $valor < 11; $valor++):
                                            ?>
                                                <option value="<?=$valor?>"><?=$valor?></option>
                                            <?php
                                                endfor;
                                            ?>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn-lg btn-block comprar">Añadir al carrito</button>
                        </form>
                    <?php
                        endif;
                    ?>
                </div>
            </div>    
        </div>
    </div>
</section>