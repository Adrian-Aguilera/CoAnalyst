<?php
require "Rest_Controller.php";
require "Parser_Controller.php";
require "ResponseController.php";
class GetData {
    public function data_input() {
        $codigo = isset($_POST['code']) ? htmlspecialchars($_POST['code']) : '';
        $language = isset($_POST['language']) ? htmlspecialchars($_POST['language']) : 'No seleccionado';

        return array($codigo, $language);
    }
}

$restModel = new Rest_Controller();
$parserModel = new Parser_Controller();
$dataInput = new GetData();
$responseController = new ResponseController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    list($codigo, $lenguaje) = $dataInput->data_input();
    $engineParsing = $parserModel->is_function($codigo);

    if (strtolower($engineParsing) === strtolower($lenguaje)) {
        $sendCode = $restModel->runCode($codigo, $lenguaje);
        $result = $responseController->processResponse($sendCode);
        $response = json_decode($result, true);

        if (isset($response['success']) && $response['success']) {
            echo json_encode(['success' => true, 'message' => $response['message']]);
        } else {
            $message = isset($response['message']) ? $response['message'] : 'Error desconocido.';
            echo json_encode(['error' => true, 'message' => 'Error: ' . $message]);
        }
    } else {
        echo json_encode(['error' => true, 'message' => 'El código proporcionado no corresponde al lenguaje seleccionado']);
    }
}

