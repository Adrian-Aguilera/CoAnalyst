<?php
require "../DB/Conexion.php";
require_once '../vendor/autoload.php';


class AlldataModel {
    private $conexion_modelo;
    private $conexion_data;

    public function __construct()
    {
        $this->conexion_modelo = new Coanalystdb();
        $this->conexion_data = $this->conexion_modelo->getConnection();
    }
    public function AllCodeTest(){

    }
}