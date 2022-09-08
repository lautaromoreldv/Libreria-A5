<?php

 class Color 
 {
    protected $id;
    protected $color;

    public function traerColores(){
        $db = (new DB())->getDB();
        $query = "SELECT * FROM colores";
                
        $data = $db->prepare($query);
        $data->execute();

        $data->setFetchMode(PDO::FETCH_CLASS, self::class);
        $colores = $data->fetchAll();
        return $colores;
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
 }