<?php
require_once '../DB/Conexion.php';
// Iniciar sesión
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['usern']) && isset($_POST['pass'])) {
      $email = $_POST['usern'];
      $password = $_POST['pass'];
  
      // Preparar la consulta SQL
  $sql = "SELECT * FROM usuario WHERE username = ? AND pass = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $email, $password);

  // Ejecutar la consulta
  $stmt->execute();

  // Obtener los resultados
  $result = $stmt->get_result();

  // Verificar si el usuario existe
  if ($result->num_rows > 0) {
    // Iniciar sesión y redirigir al menú
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $email;
    header("Location: ../App/CoAnalyst.html");
  } else {
    echo "Usuario o contraseña incorrectos";
  }

  // Cerrar la conexión
  $stmt->close();
  $conn->close();
    } else {
      echo "Por favor, completa ambos campos.";
    }
  }
?>
