<?php

class Categoria
{
    protected $id;
    protected $categoria;

    public function traerCategorias(){
        $db = (new DB())->getDB();
        $query = "SELECT * FROM categorias";
                
        $data = $db->prepare($query);
        $data->execute();

        $data->setFetchMode(PDO::FETCH_CLASS, self::class);
        $categorias = $data->fetchAll();
        return $categorias;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

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
}