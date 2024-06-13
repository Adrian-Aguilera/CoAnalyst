<?php
require_once '../DB/Conexion.php';
$obj_db = new Coanalystdb();
$conexion = $obj_db->getConnection(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // Primero, verifica si el usuario ya existe
    $checkUser = "SELECT * FROM usuarios WHERE username = '$username'";
    $result = $conexion->query($checkUser);
 
    if ($result->num_rows > 0) {
        // El usuario existe, así que lo editamos
        $sql = "UPDATE usuarios SET `password` ='$password' WHERE `username` ='$username'";
        if ($conexion->query($sql) == true) {
            header("location: ../index.html");
        } else {
            header("location: ../CoAnalyst.html");
        }
    } else {
        echo "El usuario no existe.";
    }
}
