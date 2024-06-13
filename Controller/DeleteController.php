<?php
require_once '../DB/Conexion.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // Primero, verifica si el usuario ya existe
    $checkUser = "SELECT * FROM usuarios WHERE username = '$username'";
    $result = $conn->query($checkUser);
 
    if ($result->num_rows > 0) {
        // El usuario existe, así que lo editamos
        $sql = "DELETE FROM `usuarios` WHERE username ='$username' and pass ='$password'";
        if ($conn->query($sql) == true) {
            echo "Usuario elminado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "El usuario no existe.";
    }
}
?>