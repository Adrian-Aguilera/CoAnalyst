<?php
require "Rest_Controller.php";
$rest_model = new Rest_Controller();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = isset($_POST['code']) ? htmlspecialchars($_POST['code']) : '';
    $language = isset($_POST['language']) ? htmlspecialchars($_POST['language']) : 'No seleccionado';

    //Funcion para ejecutar el codigo
    $engine_execute = $rest_model->run_code($code, $language);

    echo "Código ingresado: " . $code . "<br>";
    echo "Lenguaje seleccionado: " . $language . "<br>";
    echo "data: ".  $engine_execute;
}
