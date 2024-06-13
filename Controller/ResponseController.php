<?php

require "../Model/CoAnalystModel.php";
class ResponseController
{

    private $obj_db;

    public function __construct()
    {
        $modelo_db = new AlldataModel();
        $this->obj_db = $modelo_db;
    }

    public function processResponse($result)
    {
        if ($result === false) {
            return json_encode(['error' => true, 'message' => 'Error al realizar la solicitud al servidor.']);
        }

        $response = json_decode($result, true);
        $name = '../logs/logfile.log';
        $this->logResult($result, $name);

        if ($response === null && json_last_error() !== JSON_ERROR_NONE) {
            return json_encode(['error' => true, 'message' => 'Error en la decodificación de la respuesta.']);
        }
        if (isset($response['output']) && (strpos($response['output'], 'SyntaxError') !== false || strpos($response['output'], 'Error') !== false)) {
            return json_encode(['error' => true, 'message' => 'Error en la ejecución del script: ' . $response['output']]);
        } else {
            $user_id = 2;
            $complejidad = 'eficiente';
            $response_insert = $this->Data_insert($user_id, $complejidad, $result);
            $log_insert = '../logs/log_insert.log';
            $this->logResult($response_insert, $log_insert);

            return json_encode(['success' => true, 'message' => $response['output']]);
        }
    }

    private function Data_insert($user_id, $complejidad, $datos_input){
        $LocalDBFunciones = $this->obj_db;
        $datos_individuales = json_decode($datos_input, true);
        $tiempo_ejecucion = $datos_individuales['cpuTime'];
        $memoria_usada = $datos_individuales['memory'];
        $statusCode = $datos_individuales['statusCode'];
        $reponse_db = $LocalDBFunciones->Insert_Datos($user_id,$tiempo_ejecucion, $complejidad, $memoria_usada, $statusCode);
        if($reponse_db == "Inserción exitosa"){
            return $reponse_db;
        }else{
            return $reponse_db;
        }
    }
    private function select_all_AllDataEstadsticas(){
        $LocalFuncionesDB = $this->obj_db;
        $response_db = $LocalFuncionesDB->AllDataEstadsticas();
        if($response_db == "No hay datos"){
            return $response_db;
        }elseif($response_db == "Error en la conexión a la base de datos."){
            return $response_db;
        }else{
            //para este punto $response_db trae una lista con los datos
            return $response_db;
        }
    }

    public function getAll_datos(){
        $resultado = $this->select_all_AllDataEstadsticas();
        return $resultado;
    }
    private function logResult($result, $name)
    {
        $logFile = $name;
        file_put_contents($logFile, $result . PHP_EOL, FILE_APPEND);
    }
}
