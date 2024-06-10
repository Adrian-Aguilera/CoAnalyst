<?php
class ResponseController {
    private $dataModel;

    public function __construct($dataModel) {
        $this->dataModel = $dataModel;
    }

    public function processResponse($result) {
        $response = json_decode($result, true);
       
        $this->logResult($result);

        if ($response === null && json_last_error() !== JSON_ERROR_NONE) {
            return json_encode(['error' => true, 'message' => 'Error en la decodificación de la respuesta.']);
        }

        if (isset($response['output']) && (strpos($response['output'], 'SyntaxError') !== false || strpos($response['output'], 'Error') !== false)) {
            // Log error specifics or handle them accordingly
            return json_encode(['error' => true, 'message' => 'Error en la ejecución del script: ' . $response['output']]);
        } else {
            // Assume the execution was successful if no errors
            $this->dataModel->insertData($response); // Assuming your data model has an insertData method
            return json_encode(['success' => true, 'data' => $response['output']]);
        }
    }

    private function logResult($result) {
        $logFile = 'logfile.log';
        file_put_contents($logFile, $result . PHP_EOL, FILE_APPEND);
    }
}
