<?php
    $id = $_GET["id"];
    $producto = (new Producto())->traerPorId($id);
    if(!$producto){
        header("Location:index.php?seccion=productos&estado=error&mensaje=producto_no_encontrado");
        die();
    }
?>
<section>
    <div class="container">
        <h1 class="mt-4 mb-4">Información del producto</h1>
        <a href="index.php?seccion=dashboard" class="volver"> ← Volver a la tienda</a>
            <div class="row mt-4 mb-4">
                <div class="col-12 col-sm-6 text-center" id="imgProd">
                    <img src="../img/productos/<?=$producto->getImagen()?>" alt="<?=$producto->getNombre()?>" class="img-fluid">
                </div>
                <div class="col-12 col-sm-6">
                    <h2 class="text-center" id="titleProd"><?=ucfirst($producto->getNombre())?></h2>
                    <p><strong>Categoría: </strong><?=ucfirst($producto->getCategoria())?></p>
                    <p><strong>Marca: </strong><?=ucfirst($producto->getMarca())?></p>
                    <p><strong>Descripción: </strong><?=ucfirst($producto->getDescripcion())?></p>
                    <p><strong>Color: </strong><?=ucfirst($producto->getColor())?></p>
                    <p><strong>Código: </strong>#<?=ucfirst($producto->getCodigo())?></p>
                    <p><strong>Precio: </strong><strong id="precioProd">$<?=$producto->getPrecio()?></strong></p>
                </div>    
        </div>
    </div>
</section>