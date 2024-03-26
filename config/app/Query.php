<?php
class Query extends Conexion{
    private $con, $pdo;
    public function __construct(){
        $this->con = new Conexion();
        $this->pdo = $this->con->conectar();
    }

    public function select(){

    }

}






?>