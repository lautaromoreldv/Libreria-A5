<?php
  $productos = (new Producto())->traerProductos();
?>
<section id="info"> 
    <div class="bg-light"> 
        <h1 class="container mt-4 mb-4">Administración de Productos</h1>
          <div class="container">
            <a href="index.php?seccion=crear_producto" class="btn btn-success mb-4">Crear producto</a>
              <div class="row">
                <div class="table-responsive"> 
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Código</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Color</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                              foreach($productos as $producto):
                            ?>
                            <tr>
                                <td><?=$producto->getProductoId()?></td>
                                <td><img src="../img/productos/<?=$producto->getImagen()?>" alt="<?=$producto->getNombre()?>" class="img-thumbnail"></td>
                                <td><?=ucfirst($producto->getNombre())?></td>
                                <td>$<?=ucfirst($producto->getPrecio())?></td>
                                <td><?=ucfirst($producto->getMarca())?></td>
                                <td><?=ucfirst($producto->getCodigo())?></td>
                                <td><?=ucfirst($producto->getCategoria())?></td>
                                <td><?=ucfirst($producto->getColor())?></td>
                                <td>
                                  <a href="index.php?seccion=editar_producto&id=<?=$producto->getProductoId()?>" class="btn btn-primary">Editar</a>
                                </td>

                                <td>
                                  <form action="index.php?seccion=confirmar_eliminar_producto&id=<?=$producto->getProductoId()?>" method="post">
                                      <button type="submit" class="btn btn-danger">Borrar</button>
                                  </form>
                                </td>
                            </tr>
                          <?php
                            endforeach;
                          ?>
                        </tbody>
                    </table>
                </div>       
              </div>
          </div>
    </div>
</section>