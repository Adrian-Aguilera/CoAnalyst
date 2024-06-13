<?php
require_once '../Model/CoAnalystModel.php';



class GetData {
    public function data_input() {
        $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
        $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : 'No seleccionado';
        $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'No seleccionado';

        return array($username, $password, $email);
    }
}
$dataInput = new GetData;
$modelo_db = new AlldataModel();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    list($username, $password, $email) = $dataInput->data_input();

    $checkUser = $modelo_db->ValidateUser($username);

    if ($checkUser == "Usuario Existente") {
        echo "El nombre de usuario ya está en uso. Por favor, elige otro.";
    } else {
        $response_db = $modelo_db->CreateUser($username, $password, $email);
        echo $response_db."<br>";
        if ($response_db == "Inserción exitosa") {
            header("Location: ../index.html");
        } elseif($response_db == "error") {
            echo "F";
        }else{
            echo "valio conexion";
        }
    }
}
