<?php
class ResponseController
{
    private $Modelo_CRUD;

    public function __construct($Model_db)
    {
        $this->Modelo_CRUD = $Model_db;
    }

    public function processResponse($result)
    {
        if ($result === false) {
            return json_encode(['error' => true, 'message' => 'Error al realizar la solicitud al servidor.']);
        }

        $response = json_decode($result, true);
        $this->logResult($result);

        if ($response === null && json_last_error() !== JSON_ERROR_NONE) {
            return json_encode(['error' => true, 'message' => 'Error en la decodificación de la respuesta.']);
        }
        if (isset($response['output']) && (strpos($response['output'], 'SyntaxError') !== false || strpos($response['output'], 'Error') !== false)) {
            return json_encode(['error' => true, 'message' => 'Error en la ejecución del script: ' . $response['output']]);
        } else {
            // $this->Modelo_CRUD->Insert_Datos($response['data']);
            return json_encode(['success' => true, 'message' => $response['output']]);
        }
    }


    private function logResult($result)
    {
        $logFile = '../logs/logfile.log';
        file_put_contents($logFile, $result . PHP_EOL, FILE_APPEND);
    }
}
