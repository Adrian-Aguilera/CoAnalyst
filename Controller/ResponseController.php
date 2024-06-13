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

    public function processResponse($result,$long_code)
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
            $complejidad = $this->cal_complejidad($result, $long_code);
            $response_insert = $this->Data_insert($complejidad, $result);
            $log_insert = '../logs/log_insert.log';
            $this->logResult($response_insert, $log_insert);

            return json_encode(['success' => true, 'message' => $response['output']]);
        }
    }

    private function cal_complejidad($dataInput, $long_code){
        $individual = json_decode($dataInput, true);
        $cpuTime = $individual['cpuTime'];
    

        $umbrales = [
            'Horrible (O(n^2))' => $long_code * $long_code * 0.01, // Ajusta el coeficiente según sea necesario
            'Mala (O(n log n))' => $long_code * log($long_code, 2) * 0.05, // Ajusta el coeficiente según sea necesario
            'Justa (O(n))' => $long_code * 0.1, // Ajusta el coeficiente según sea necesario
            'Buena (O(log n))' => log($long_code, 2) * 10, // Ajusta el coeficiente según sea necesario
            'Excelente (O(1) or better)' => 0 // Este umbral cubre todo menor a O(log n)
        ];
    
        foreach ($umbrales as $etiqueta => $umbral) {
            if ($cpuTime > $umbral) {
                return $etiqueta;
            }
        }
        return "Indefinido";
    }
    
    private function Data_insert($complejidad, $datos_input){
        session_start();
        $LocalDBFunciones = $this->obj_db;
        $datos_individuales = json_decode($datos_input, true);
        $user_id = $_SESSION['user_id'];
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
    private function select_by_id($user_id){
        $LocalFuncionesDB = $this->obj_db;
        $response_db = $LocalFuncionesDB->Data_BY_ID($user_id);
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
    public function getDataByID($user_id){
        $resultado = $this->select_by_id($user_id);
        return $resultado;
    }
    private function logResult($result, $name)
    {
        $logFile = $name;
        file_put_contents($logFile, $result . PHP_EOL, FILE_APPEND);
    }
}
