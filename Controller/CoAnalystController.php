<?php
require "Rest_Controller.php";
require "Parser_Controller.php";

class get_data{
    public function data_input(){
        $code = isset($_POST['code']) ? htmlspecialchars($_POST['code']) : '';
        $language = isset($_POST['language']) ? htmlspecialchars($_POST['language']) : 'No seleccionado';

        return  array($code, $language);
    }
}

$rest_model = new Rest_Controller();
$parser_model = new Parser_Controller();
$data_input = new get_data();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    list ($codigo, $lenguaje) = $data_input->data_input();
    echo "codigo: $codigo, lenguaje $lenguaje";
}