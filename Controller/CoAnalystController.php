<?php
require "Rest_Controller.php";
require "Parser_Controller.php";

$rest_model = new Rest_Controller();
$parser_model = new Parser_Controller();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = isset($_POST['code']) ? htmlspecialchars($_POST['code']) : '';
    $language = isset($_POST['language']) ? htmlspecialchars($_POST['language']) : 'No seleccionado';
    /*
    $engine_execute = $rest_model->run_code($code, $language);
    echo "data: ".  $engine_execute . "<br>";
    */
    $engine_parsing = $parser_model->is_function($code) ? true : false;
    if ($engine_parsing){
        $engine_execute = $rest_model->run_code($code, $language);
        echo "data: ".  $engine_execute . "<br>";
    }else{
        echo "no es funcion". "<br>";
    }
    //Funcion para ejecutar el codigo

    echo "Código ingresado: " . $code . "<br>"; 
    echo "Lenguaje seleccionado: " . $language . "<br>";

}
