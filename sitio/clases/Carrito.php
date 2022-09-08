<?php

class Carrito
{
    public function añadirAlCarrito($producto_id, $cantidad){
        $producto        = (new Producto())->traerPorIdCarrito($producto_id);
        $producto_hidden = (new Producto())->traerPorId($producto_id);
        $usuario         = (new Autenticacion())->getPerfil();

        $carrito = [
            'usuario_id'   => $usuario["usuario_id"],
            'producto_id'  => $producto->getProductoId(),
            'nombre'       => $producto->getNombre(),
            'precio'       => $producto->getPrecio(),
            'imagen'       => $producto->getImagen(),
            'codigo'       => $producto->getCodigo(),
            'marca'        => $producto->getMarca(),
            'color'        => $producto_hidden->getColor(),
            'color_id'     => $producto->getColoresId(),
            'categoria'    => $producto_hidden->getCategoria(),
            'categoria_id' => $producto->getCategoriasId(),
            'cantidad'     => $cantidad
        ];
        $this->setCarrito($carrito);
        return true;
    }

    public function setCarrito($carrito){
        $_SESSION["carrito"][] = $carrito;
    }

    public function getCarrito(){
        return $_SESSION["carrito"] ?? '';
    }

    public function comprar($data){
        $db = (new DB())->getDB();
        $query = "INSERT INTO usuarios_compras (fecha_compra, cantidad, precio_unidad, precio_total, usuarios_usuario_id, productos_producto_id)
                    VALUES (:fecha_compra, :cantidad, :precio_unidad, :precio_total, :usuarios_usuario_id, :productos_producto_id)"; 
        $stmt = $db->prepare($query);
        $stmt->execute([
            'fecha_compra'          => $data["fecha_compra"],
            'cantidad'              => $data["cantidad"],
            'precio_unidad'         => $data["precio_unidad"],
            'precio_total'          => $data["precio_total"],
            'usuarios_usuario_id'   => $data["usuarios_usuario_id"],
            'productos_producto_id' => $data['productos_producto_id']
        ]);
    }

    public function eliminarProducto($i){
        $carrito = $this->getCarrito();
        unset($carrito[$i]);
        $carrito = array_values($carrito);

        $_SESSION["carrito"] = $carrito;

            if(count($carrito) == 0){
                unset($_SESSION["carrito"]);
            }
    }

    public function borrarCarrito(){
        unset($_SESSION["carrito"]);
    }
    
}