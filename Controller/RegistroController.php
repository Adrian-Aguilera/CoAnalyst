<?php
require_once '../DB/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Primero, verifica si el usuario ya existe
    $checkUser = "SELECT * FROM usuario WHERE username = '$username'";
    $result = $conn->query($checkUser);

    if ($result->num_rows > 0) {
        // El usuario ya existe
        echo "El nombre de usuario ya está en uso. Por favor, elige otro.";
    } else {
        // El usuario no existe, así que lo agregamos
        $sql = "INSERT INTO usuario (username, pass) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Nuevo registro creado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
