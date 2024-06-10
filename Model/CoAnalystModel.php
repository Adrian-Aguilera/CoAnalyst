<?php
require "../DB/Conexion.php";
require_once '../vendor/autoload.php';
use Dotenv\Dotenv;

class AlldataModel {
    private $conexion_modelo;
    private $conexion_data;
    private $all_resultados;
    private $Insert_datos;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../CoAnalyst/');
        $dotenv->load();
        /*Conexion db */
        $this->conexion_modelo = new Coanalystdb();
        $this->conexion_data = $this->conexion_modelo->getConnection();
        /*Querys cargar */
        $this->all_resultados = $_ENV["ALL_DATA"];
        $this->Insert_datos = $_ENV["INSERT_DATA"];

    }
    public function AllDataRegister(){
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
    public function Insert_Datos($consulta_id, $tiempo_ejecucion, $complejidad, $memoria_usada,$tiempo, $estado){
        $query_insert = $this->Insert_datos."('$consulta_id','$tiempo_ejecucion','$complejidad','$memoria_usada','$tiempo','$estado')";
        $conexion_privada = $this->conexion_data;
        if ($conexion_privada){
            $consulta =$conexion_privada->query($query_insert);
            if($consulta == true){
                $conexion_privada->close();
                return "Inserción exitosa";
            }else{
                $conexion_privada->close();
                return "error";
            }
        }else{
            return "error conexion db";
        }
    }
}
/*
$mode_db = new AlldataModel();
$all_data = $mode_db->AllDataRegister();
$consulta_id = 1;
$tiempo_eje = "1s";
$complejidad = "epico";
$memoria = "mucha";
$tiempo = "asd";
$estado = "activp";
$insercion = $mode_db->Insert_Datos($consulta_id,$tiempo_eje, $complejidad,$memoria,$tiempo, $estado);
if ($insercion === "Inserción exitosa") {
    echo "Datos insertados correctamente.";
} else {
    echo "Error al insertar los datos: $insercion";
}

echo $all_data;
*/