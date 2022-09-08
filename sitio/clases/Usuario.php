<?php

class Usuario 
{
    protected $usuario_id;
    protected $nombre;
    protected $apellido;
    protected $email;
    protected $contraseña;
    protected $usuario;
    protected $tipousuario;

    public function traerUsuarios(){
        $db = (new DB())->getDB();
        $query = "SELECT u.usuario_id, u.nombre, u.apellido, u.email, u.usuario, t.tipousuario
                    FROM usuarios as u
                    JOIN tipousuarios as t ON t.id = tipousuarios_id
                    ORDER BY u.usuario_id ASC";

        $data = $db->prepare($query);
        $data->execute();

        $data->setFetchMode(PDO::FETCH_CLASS, self::class);
        $usuarios = $data->fetchAll();
        return $usuarios;
    }

    public function traerPorEmail($email){
        $db = (new DB())->getDB();
        $query = "SELECT * FROM usuarios
                    WHERE email = ?";

        $data = $db->prepare($query);
        $data->execute([$email]);
        $data->setFetchMode(PDO::FETCH_CLASS, self::class);

        $usuario = $data->fetch();
        
        if(!$usuario){
            header("Location:../index.php?seccion=iniciar_sesion&estado=error&mensaje=email_no_encontrado");
            die();
        }
        return $usuario;
    }

    public function compararEmail($email){
        $db = (new DB())->getDB();
        $query = "SELECT email FROM usuarios
                    WHERE email = ?";

        $data = $db->prepare($query);
        $data->execute([$email]);
        $data->setFetchMode(PDO::FETCH_CLASS, self::class);

        $email_existe = $data->fetch();
        return $email_existe;
    }

    public function traerPorId($id){
        $db = (new DB())->getDB();
        $query = "SELECT u.usuario_id, u.nombre, u.apellido, u.email, u.contraseña, u.usuario, t.tipousuario 
                FROM usuarios as u
                JOIN tipousuarios as t ON t.id = tipousuarios_id
                WHERE u.usuario_id = ?";
                
        $data = $db->prepare($query);
        $data->execute([$id]);

        $data->setFetchMode(PDO::FETCH_CLASS, self::class);
        $usuario = $data->fetch();
        return $usuario;
    }

    public function eliminarUsuario(){
        $db = (new DB())->getDB();
        $query = "DELETE FROM usuarios
                    WHERE usuario_id = ?";
        $data = $db->prepare($query);
        $data->execute([$this->getUsuarioId()]);
    }

    /**
     * Get the value of usuario_id
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     */
    public function setUsuarioId($usuario_id): self
    {
        $this->usuario_id = $usuario_id;

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
     * Get the value of apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     */
    public function setApellido($apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of contraseña
     */
    public function getContraseña()
    {
        return $this->contraseña;
    }

    /**
     * Set the value of contraseña
     */
    public function setContraseña($contraseña): self
    {
        $this->contraseña = $contraseña;

        return $this;
    }

    /**
     * Get the value of usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     */
    public function setUsuario($usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }


    /**
     * Get the value of tipousuarios_id
     */
    public function getTipousuariosId()
    {
        return $this->tipousuarios_id;
    }

    /**
     * Set the value of tipousuarios_id
     */
    public function setTipousuariosId($tipousuarios_id): self
    {
        $this->tipousuarios_id = $tipousuarios_id;

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