<?php
require "Rest_Controller.php";
require "Parser_Controller.php";

class get_data{
    public function data_input(){
        $codigo = isset($_POST['code']) ? htmlspecialchars($_POST['code']) : '';
        $language = isset($_POST['language']) ? htmlspecialchars($_POST['language']) : 'No seleccionado';

        return  array($codigo, $language);
    }
}

$rest_model = new Rest_Controller();
$parser_model = new Parser_Controller();
$data_input = new get_data();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    list ($codigo, $lenguaje) = $data_input->data_input();
    
    /*parseando codigo de entrada para solo admitir funciones*/
    $engine_parsing = $parser_model->is_function($codigo) ? true : false;
    if ($engine_parsing) {
        $send_code = $rest_model->runCode($codigo, $lenguaje);
        $response = json_decode($send_code, true); // Decodificar JSON a array
        if ($response['success']) {
            echo json_encode(['success' => true, 'message' => 'Función funciona correctamente', 'data' => $response['data']]);
        } else {
            echo json_encode(['success' => false, 'message' => 'La función tiene un error: ' . $response['message']]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No es función']);
    }
    
}