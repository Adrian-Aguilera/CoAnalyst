<?php
require "../DB/Conexion.php";
require_once '../vendor/autoload.php';
use Dotenv\Dotenv;

class AlldataModel {
    private $conexion_modelo;
    private $conexion_data;
    private $all_estadisticas;
    private $all_user;
    private $Insert_datos;
    private $CrearUsuarios;
    private $ValidateUsers;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../CoAnalyst/');
        $dotenv->load();
        /*Conexion db */
        $this->conexion_modelo = new Coanalystdb();
        $this->conexion_data = $this->conexion_modelo->getConnection();
        /*Querys cargar */
        $this->all_estadisticas= $_ENV["ALL_ESTADISTCAS"];
        $this->Insert_datos = $_ENV["INSERT_DATA"];
        $this->all_user = $_ENV["ALL_USER"];
        $this->CrearUsuarios = $_ENV['CREATEUSER'];
        $this->ValidateUsers = $_ENV['checkUser'];

    }
    public function AllDataEstadsticas(){
        $resultados = [];
        $query = $this->all_estadisticas;
        if ($this->conexion_data) {
            $result = $this->conexion_data->query($query);
            if ($result != null){
                while ($row = $result->fetch_assoc()) {
                    $resultados[] = $row;
                }
            }else{
                return "No hay datos";
            }

        } else {
            return "Error en la conexión a la base de datos.";
        }
        return $resultados;
    }
    public function all_user(){
        $resultados = [];
        $query = $this->all_user;
        if ($this->conexion_data) {
            $result = $this->conexion_data->query($query);
            if ($result != null){
                while ($row = $result->fetch_assoc()) {
                    $resultados[] = $row;
                }
            }else{
                return "No hay datos";
            }

        } else {
            return "Error en la conexión a la base de datos.";
        }
        return $resultados;
    }
    public function Insert_Datos($user_id,$tiempo_ejecucion, $complejidad, $memoria_usada, $estado){
        $query_insert = $this->Insert_datos."($user_id,'$tiempo_ejecucion','$complejidad','$memoria_usada','$estado')";
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
    public function CreateUser($username, $password, $email){
        $query_insert = $this->CrearUsuarios."('$username','$password','$email')";
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

    public function ValidateUser($username){
        $query_insert = $this->ValidateUsers."'$username'";
        $conexion_data = $this->conexion_data;
        if ($conexion_data){
            $consulta =$conexion_data->query($query_insert);
            if($consulta == true){
                $conexion_data->close();
                return "Usuario Existente";
            }else{
                $conexion_data->close();
                return "error";
            }
        }else{
            $conexion_data->close();
            return "error conexion db";
        }
    }

    private function logResult($result, $name)
    {
        $logFile = $name;
        file_put_contents($logFile, $result . PHP_EOL, FILE_APPEND);
    }
}

/*
$mode_db = new AlldataModel();
/*
$all_data = $mode_db->AllDataEstadsticas();
foreach ($all_data as $simpledata){
    echo htmlspecialchars($simpledata['tiempo_ejecucion']) . "<br>";
    echo htmlspecialchars($simpledata['memoria_usada']) . "<br>";
}*/
/*
$consulta_id = 1;
$tiempo_eje = "1s";
$complejidad = "epico";
$memoria = "mucha";
$tiempo = "asd";
$estado = "activp";
$insercion = $mode_db->CreateUser($complejidad ,$complejidad ,$complejidad );
if ($insercion === "Inserción exitosa") {
    echo "Datos insertados correctamente.";
} else {
    echo "Error al insertar los datos: $insercion";
}
*/