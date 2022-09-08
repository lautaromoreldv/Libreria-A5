<?php
    $colores = (new Color())->traerColores();
    $categorias = (new Categoria())->traerCategorias();
    
    $nombre                 = $_SESSION["datos"]["nombre"] ?? trim('');
    $precio                 = $_SESSION["datos"]["precio"] ?? trim('');
    $codigo                 = $_SESSION["datos"]["codigo"] ?? trim('');
    $marca                  = $_SESSION["datos"]["marca"] ?? trim('');
    $descripcion            = $_SESSION["datos"]["descripcion"] ?? trim('');
    $color_recuperado       = $_SESSION["datos"]["color"] ?? '';
    $categoria_recuperado   = $_SESSION["datos"]["categoria"] ?? '';
?>
<section id="info"> 
    <div class="bg-light">
        <div class="container">
            <h1 class="mt-4 mb-4">Crear producto</h1>
            <a href="index.php?seccion=productos" class="volver"> ← Volver a Productos</a>
        </div>
        <form action="acciones/nuevo_producto.php" enctype="multipart/form-data" method="POST">
            <div class="container">
                <div class="row mt-4 mb-4">
                    <div class="col-sm">
                        <div class="form-row">
                            <div class="form-group col-12 col-lg-6">
                                <label for="nombre">Nombre <span class="text-secondary">(obligatorio)</span></label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre del producto" autocomplete="off" 
                                value="<?=$nombre?>">
                            </div>

                            <div class="form-group col-12 col-lg-6">
                                <label for="precio">Precio <span class="text-secondary">(obligatorio)</span></label>
                                <input type="number" class="form-control" name="precio" id="precio" placeholder="$1000" autocomplete="off" 
                                value="<?=$precio?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12 col-lg-6">
                                <label for="codigo">Código de producto <span class="text-secondary">(obligatorio)</span></label>
                                <input type="number" class="form-control" name="codigo" id="codigo" placeholder="1234" autocomplete="off" 
                                value="<?=$codigo?>">
                            </div>

                            <div class="form-group col-12 col-lg-6">
                                <label for="marca">Marca <span class="text-secondary">(obligatorio)</span></label>
                                <input type="text" class="form-control" name="marca" id="marca" placeholder="Ingrese la marca" autocomplete="off"
                                value="<?=$marca?>">
                            </div>
                            
                            <div class="form-group col-12 col-lg-6">
                                <label for="color">Color <span class="text-secondary">(obligatorio)</span></label>
                                <select name="color" id="color" class="form-control">
                                    <option value="">Elegir color</option>
                                        <?php
                                            foreach($colores as $color):
                                        ?>
                                    <option <?=$color->getId() == $color_recuperado ? "selected" : '' ?> value="<?=$color->getId()?>"><?=ucfirst($color->getColor())?></option>
                                        <?php
                                            endforeach;
                                        ?>
                                </select>
                            </div>

                            
                            <div class="form-group col-12 col-lg-6">
                                <label for="categoria">Categoría <span class="text-secondary">(obligatorio)</span></label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <option value="">Elegir categoría</option>
                                    <?php
                                            foreach($categorias as $categoria):
                                        ?>
                                    <option <?=$categoria->getId() == $categoria_recuperado ? "selected" : '' ?> value="<?=$categoria->getId()?>"><?=$categoria->getCategoria()?></option>
                                        <?php
                                            endforeach;
                                        ?>
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Escriba la descripción del producto"><?=$descripcion?></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm">
                        <div class="form-group mt-0 pt-0">
                            <label for="imagen">Sólo acepta imágenes .jpg / .jpeg</label>
                            <input type="file" class="form-control-file" name="imagen" id="imagen">
                        </div>
                    </div>
                </div>

                <div class="mb-4 mt-4">
                    <button type="submit" class="btn btn-primary btnaccion">Crear producto</button>   
                </div>

            </div>      
    </div>    
</section>