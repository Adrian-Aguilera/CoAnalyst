<?php
require_once '../vendor/autoload.php';

use Dotenv\Dotenv;

class Rest_Controller {
    private $url;
    private $clientId;
    private $clientSecret;

    public function __construct() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../CoAnalyst/');
        $dotenv->load();
        $this->url = $_ENV['URL'];
        $this->clientId = $_ENV['clientId'];
        $this->clientSecret = $_ENV['clientSecret'];
    }

    public function runCode($script, $language) {
        $data = [
            'clientId' => $this->clientId,
            'clientSecret' => $this->clientSecret,
            'script' => $script,
            'language' => $language,
            'versionIndex' => '0'
        ];

        $data_string = json_encode($data);
        $ch = curl_init($this->url);
        
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ]);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        if ($result === false) {
            return json_encode(['error' => true, 'message' => 'Error al realizar la solicitud al servidor.']);
        }
        
        $response = json_decode($result, true);
        $this->logs($result);
        if ($response === null && json_last_error() !== JSON_ERROR_NONE) {
            return json_encode(['error' => true, 'message' => 'Error en la decodificación de la respuesta.']);
        }
        
        // como estatus code siempre es 200:
        if (strpos($response['output'], 'SyntaxError') !== false || strpos($response['output'], 'Error') !== false) {
            // Si encontramos términos que indican un error en el output, respondemos con error
            return json_encode(['error' => true, 'message' => 'Error en la ejecución del script: ' . $response['output']]);
        } else {
            // si la respuestas no tiene errores es correcta:
            return json_encode(['success' => true, 'data' => $response['output']]);
        }
    }
    public function logs($result){
        //guardar logs
        $logFile = '../logs/logfile.log';
        file_put_contents($logFile, $result . PHP_EOL, FILE_APPEND);

    }
}
/*
$restController = new Rest_Controller();

$script = "
def test():\n print(5+5)\ntest()
"; 
$language = 'python3';

$response = $restController->runCode($script, $language, $local_modo = true);
echo $response;
$responseData = json_decode($response, true);
if (isset($responseData['success']) && $responseData['success']) {
    echo "Script executed successfully:\n";
    echo $responseData['data'];
} else {
    echo "Error executing script:\n";
    echo $responseData['message'];
}
/*
$code = '
def hello_world():
print("Hello, World!")
if True:
print("This is indented.")
';

$fixedCode = $restController->fixIndentation($code);
echo "<pre>$fixedCode</pre>";
*/
