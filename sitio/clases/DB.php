<?php

class DB
{
    public const HOST = "localhost";
    public const USER = 'root';
    public const PASS = '';
    public const BASE = 'dw3_morel_lautaro';

    public const DSN = 'mysql:host=' . DB::HOST . ';dbname='. DB::BASE . ';charset=utf8mb4;';
 
    protected $db;

    public function __construct() 
    {
        try{
            $this->db = new PDO(self::DSN, self::USER, self::PASS);
        } catch (Exception $e){
            echo "No se pudo conectar a la base de datos, intente más tarde";
            die();
        }
        
    }

    public function getDB() {
        return $this->db;
    }

}