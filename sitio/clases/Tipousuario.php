<?php

class Tipousuario 
{
    protected $id;
    protected $tipousuario;

    public function traerTiposusuarios(){
        $db = (new DB())->getDB();
        $query = "SELECT * FROM tipousuarios";
                
        $data = $db->prepare($query);
        $data->execute();

        $data->setFetchMode(PDO::FETCH_CLASS, self::class);
        $tipousuarios = $data->fetchAll();
        return $tipousuarios;
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
     * Get the value of tipousuario
     */
    public function getTipousuario()
    {
        return $this->tipousuario;
    }

    /**
     * Set the value of tipousuario
     */
    public function setTipousuario($tipousuario): self
    {
        $this->tipousuario = $tipousuario;

        return $this;
    }
}