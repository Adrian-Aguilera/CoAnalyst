<?php
require_once '../DB/Conexion.php';
$obj_db = new Coanalystdb();
$conexion = $obj_db->getConnection(); 

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_id = $_SESSION['user_id'];
    // Primero, verifica si el usuario ya existe
    $checkUser = "SELECT * FROM usuarios WHERE username = '$username'";
    $resultado = $conexion->query($checkUser);
    echo $user_id;
    if ($resultado->num_rows > 0) { 
        $sql = "DELETE FROM `usuarios` WHERE `user_id` = ".intval($user_id);
        echo $sql;
        $resultado = $conexion->query($sql);

        if ($resultado == true) {
            header("location: ../index.html");
        } else {
            header("location: ../CoAnalyst.html");
        }
    } else {
        echo "El usuario no existe.";
    }
    $conexion->close();
}