<?php
    $productos = (new Producto())->traerProductos();
?>
<section>
    <div class="container">
        <h1 class="mb-4 mt-4">Tienda</h1>
           <div class="row">
                <?php
                    foreach ($productos as $producto):
                ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 pb-4">
                        <div class="card">
                            <a href="index.php?seccion=informacion&id=<?=$producto->getProductoId()?>">
                                <img class="card-img-top" src="img/productos/<?=$producto->getImagen()?>" alt="<?=$producto->getNombre()?>">
                            </a>   
                            <div class="card-body">
                                <h2 class="text-center titleTienda"><?=ucfirst($producto->getNombre())?></h2>
                                    <p class="text-center precioTienda">$<?=$producto->getPrecio()?></p>
                                        <div class="text-center mt-4">
                                            <a href="index.php?seccion=informacion&id=<?=$producto->getProductoId()?>" class="ver_producto btnaccion">Ver producto</a>
                                        </div> 
                             </div>        
                        </div>  
                    </div>
                <?php
                    endforeach;
                ?>
            </div>
    </div>
</section>