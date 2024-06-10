<?php
require "../DB/Conexion.php";
require_once '../vendor/autoload.php';
use Dotenv\Dotenv;

class AlldataModel {
    private $conexion_modelo;
    private $conexion_data;
    private $all_resultados;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../CoAnalyst/');
        $dotenv->load();
        /*Conexion db */
        $this->conexion_modelo = new Coanalystdb();
        $this->conexion_data = $this->conexion_modelo->getConnection();
        /*Querys cargar */
        $this->all_resultados = $_ENV["ALL_DATA"];

    }
    public function AllCodeTest(){
        $resultados = [];
        $query = $this->all_resultados;
        if ($this->conexion_data) {
            $result = $this->conexion_data->query($query);
            while ($row = $result->fetch_assoc()) {
                $resultados[] = $row;
            }
        } else {
            return "Error en la conexión a la base de datos.";
        }
        return $resultados;
    }
}
/*
$mode_db = new AlldataModel();
$all_data = $mode_db->AllCodeTest();

echo "<pre>";
    print_r($all_data);
echo "</pre>";*/
