<?php
require_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../CoAnalyst/');
$dotenv->load();
class Coanalystdb{
    public function Conection(){
        $Server_name = $_ENV["Server_name"];
        $User_Name = $_ENV["User_Name"];
        $Password = $_ENV["Password"];
        $DB_name = $_ENV["DB_name"];
        
        $conexion_db= new mysqli($Server_name,$User_Name,$Password,$DB_name);
        if($conexion_db->connect_error){
            die('Conexion Fallida'.$conexion_db->connect_error);
        }else{
            echo "<script>alert('Conexion Exitosa')</script>";
        }
    }
}