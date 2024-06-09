<?php
/*
    $engine_execute = $rest_model->run_code($code, $language);
    echo "data: ".  $engine_execute . "<br>";
    */
$engine_parsing = $parser_model->is_function($code) ? true : false;
if ($engine_parsing) {
    $engine_execute = $rest_model->run_code($code, $language);
    echo "data: " . $engine_execute . "<br>";
} else {
    echo "no es funcion" . "<br>";
}
//Funcion para ejecutar el codigo

echo "Código ingresado: " . $code . "<br>";
echo "Lenguaje seleccionado: " . $language . "<br>";
