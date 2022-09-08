<?php

class UsuarioCompra
{
    
    public function traerProductosPorUsuario($usuario_id){
        $db = (new DB())->getDB();
        $query = "SELECT uc.fecha_compra, uc.cantidad, uc.precio_unidad, uc.precio_total, u.usuario_id, p.producto_id, p.nombre, p.imagen, p.marca, p.codigo
                    FROM usuarios_compras AS uc
                    JOIN usuarios as u ON u.usuario_id = usuarios_usuario_id
                    JOIN productos as p ON p.producto_id = productos_producto_id
                    WHERE usuarios_usuario_id = ?";
        $data = $db->prepare($query);
        $data->execute([$usuario_id]);

        $data->setFetchMode(PDO::FETCH_CLASS, self::class);
        $productos = $data->fetchAll();
        return $productos;
    }
    
}