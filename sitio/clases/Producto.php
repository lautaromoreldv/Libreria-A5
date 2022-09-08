<?php

class Producto
{
    protected $producto_id;
    protected $nombre;
    protected $precio;
    protected $imagen;
    protected $descripcion;
    protected $codigo;
    protected $marca;
    protected $color;
    protected $categoria;
    

    public function traerProductos(){
        $db = (new DB())->getDB();
        $query = "SELECT p.producto_id, p.nombre, p.precio, p.imagen, p.descripcion, p.codigo, p.marca, colores.color, c.categoria 
                FROM productos as p
                JOIN colores ON colores.id = colores_id
                JOIN categorias as c ON c.id = categorias_id
                ORDER BY p.producto_id ASC";

        $data = $db->prepare($query);
        $data->execute();

        $data->setFetchMode(PDO::FETCH_CLASS, self::class);
        $productos = $data->fetchAll();
        return $productos;
    }

    public function traerPorId($id) {
        
        $db = (new DB())->getDB();
        $query = "SELECT p.producto_id, p.nombre, p.precio, p.imagen, p.descripcion, p.codigo, p.marca, colores.color, c.categoria 
                FROM productos as p
                JOIN colores ON colores.id = colores_id
                JOIN categorias as c ON c.id = categorias_id
                WHERE p.producto_id = ?";
                
        $data = $db->prepare($query);
        $data->execute([$id]);

        $data->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $data->fetch();

        return $producto;
    }

    public function traerPorIdCarrito($id) {
        
        $db = (new DB())->getDB();
        $query = "SELECT * FROM productos 
                WHERE productos.producto_id = ?";
                
        $data = $db->prepare($query);
        $data->execute([$id]);

        $data->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $data->fetch();

        return $producto;
    }

    public function crearProducto($data){
        $db = (new DB())->getDB();
        $query = "INSERT INTO productos (nombre, precio, imagen, descripcion, codigo, marca, colores_id, categorias_id)
                    VALUES (:nombre, :precio, :imagen, :descripcion, :codigo, :marca, :colores_id, :categorias_id)"; 
        $stmt = $db->prepare($query);
        $stmt->execute([
            'nombre'        => $data["nombre"],
            'precio'        => $data["precio"],
            'imagen'        => $data["imagen"],
            'descripcion'   => $data["descripcion"],
            'codigo'        => $data["codigo"],
            'marca'         => $data["marca"],
            'colores_id'    => $data['colores_id'],
            'categorias_id' => $data['categorias_id']
        ]);
    }

    public function editarProducto($data){
        $db = (new DB())->getDB();
        $query = "UPDATE productos
                    SET  nombre = :nombre, precio = :precio, imagen = :imagen, descripcion = :descripcion, codigo = :codigo, marca = :marca, colores_id = :colores_id, categorias_id = :categorias_id
                    WHERE producto_id = :producto_id"; 
        $stmt = $db->prepare($query);
        $stmt->execute([
            'producto_id'   => $data["producto_id"],
            'nombre'        => $data["nombre"],
            'precio'        => $data["precio"],
            'imagen'        => $data["imagen"],
            'descripcion'   => $data["descripcion"],
            'codigo'        => $data["codigo"],
            'marca'         => $data["marca"],
            'colores_id'    => $data['colores_id'],
            'categorias_id' => $data['categorias_id']
        ]);
    }

    public function eliminarProducto(){
        $db = (new DB())->getDB();
        $query = "DELETE FROM productos
                    WHERE producto_id = ?";
        $data = $db->prepare($query);
        $data->execute([$this->getProductoId()]);
    }


 /**
     * Get the value of producto_id
     */
    public function getProductoId()
    {
        return $this->producto_id;
    }

    /**
     * Set the value of producto_id
     */
    public function setProductoId($producto_id): self
    {
        $this->producto_id = $producto_id;

        return $this;
    }

    
    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */
    public function setPrecio($precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     */
    public function setImagen($imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */
    public function setDescripcion($descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     */
    public function setCodigo($codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     */
    public function setMarca($marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    

    /**
     * Get the value of color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     */
    public function setColor($color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     */
    public function setCategoria($categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

     /**
     * Get the value of colores_id
     */
    public function getColoresId()
    {
        return $this->colores_id;
    }

    /**
     * Set the value of colores_id
     */
    public function setColoresId($colores_id): self
    {
        $this->colores_id = $colores_id;

        return $this;
    }


    /**
     * Get the value of categorias_id
     */
    public function getCategoriasId()
    {
        return $this->categorias_id;
    }

    /**
     * Set the value of categorias_id
     */
    public function setCategoriasId($categorias_id): self
    {
        $this->categorias_id = $categorias_id;

        return $this;
    }

   
}