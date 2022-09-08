<?php
    $id         = $_GET["id"];
    $producto   = (new Producto())->traerPorId($id);
    $colores    = (new Color())->traerColores();
    $categorias = (new Categoria())->traerCategorias();

    if(!$producto){
        header("Location:index.php?seccion=productos&estado=error&mensaje=producto_no_encontrado");
        die();
    }
?>
<section id="info"> 
    <div class="bg-light">
        <div class="container">
            <h1 class="mt-4 mb-4">Editar producto</h1>
            <a href="index.php?seccion=productos" class="volver"> ← Volver a Productos</a>
        </div>
        <form action="acciones/edicion_producto.php" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id" value="<?=$producto->getProductoId()?>">
            <div class="container">
                <div class="row mt-4 mb-4">
                    <div class="col-sm">
                        <div class="form-row">
                            <div class="form-group col-12 col-lg-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" autocomplete="off" value="<?=$producto->getNombre()?>">
                            </div>

                            <div class="form-group col-12 col-lg-6">
                                <label for="precio">Precio</label>
                                <input type="number" class="form-control" name="precio" id="precio" autocomplete="off" value="<?=$producto->getPrecio()?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12 col-lg-6">
                                <label for="codigo">Código de producto</label>
                                <input type="number" class="form-control" name="codigo" id="codigo" autocomplete="off" value="<?=$producto->getCodigo()?>">
                            </div>

                            <div class="form-group col-12 col-lg-6">
                                <label for="marca">Marca</label>
                                <input type="text" class="form-control" name="marca" id="marca" autocomplete="off" value="<?=$producto->getMarca()?>">
                            </div>
                            
                            <div class="form-group col-12 col-lg-6">
                                <label for="color">Color</label>
                                <select name="color" id="color" class="form-control">
                                    <option value="">Elegir color</option>
                                        <?php
                                            foreach($colores as $color):
                                        ?>
                                            <option <?=$color->getColor() == $producto->getColor() ? "selected" : "" ?> value="<?=$color->getId(); ?>"><?=ucfirst($color->getColor()); ?></option>
                                        <?php
                                            endforeach;
                                        ?>
                                </select>
                            </div>

                            
                            <div class="form-group col-12 col-lg-6">
                                <label for="categoria">Categoría</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <option value="">Elegir categoría</option>
                                    <?php
                                            foreach($categorias as $categoria):
                                        ?>
                                    <option <?=$categoria->getCategoria() == $producto->getCategoria() ? "selected" : "" ?> value="<?=$categoria->getId(); ?>"><?=ucfirst($categoria->getCategoria()); ?></option>
                                        <?php
                                            endforeach;
                                        ?>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" autocomplete="off" name="descripcion" rows="3"><?=$producto->getDescripcion()?></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm text-center">
                        <div class="form-group mt-0 pt-0">
                            <label for="imagen">Sólo acepta imágenes .jpg / .jpeg</label>
                            <input type="file" class="form-control-file" name="imagen" id="imagen">
                            <input type="hidden" name="data_img" value="<?=$producto->getImagen()?>">
                                <img src="<?="../img/productos/" . $producto->getImagen()?>" alt="<?=$producto->getNombre()?>" class="img-thumbnail mt-3">
                        </div>
                    </div>
                </div>
            <div class="mb-4 mt-4">
                <button type="submit" class="btn btn-primary btnaccion">Editar producto</button>   
            </div> 
            </div>      
    </div>    
</section>