<?php
require_once '../Model/CoAnalystModel.php';



class GetData {
  public function data_input() {
    $username = isset($_POST['usern']) ? htmlspecialchars($_POST['usern']) : '';
    $password = isset($_POST['pass']) ? htmlspecialchars($_POST['pass']) : 'No seleccionado';

    return array($username, $password);
  }
}

$dataInput = new GetData;
$modelo_db = new AlldataModel();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  list($username, $password) = $dataInput->data_input();

  $response_db = $modelo_db->Login($username, $password);
  if ($response_db == "Conexion Exitosa") {
    header("Location: ../App/CoAnalyst.html");
    echo "bien";
  }else {
    echo "mal";
  }
}