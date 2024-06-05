<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = isset($_POST['code']) ? htmlspecialchars($_POST['code']) : '';
    $language = isset($_POST['language']) ? htmlspecialchars($_POST['language']) : 'No seleccionado';


    echo "Código ingresado: " . $code . "<br>";
    echo "Lenguaje seleccionado: " . $language;
}
