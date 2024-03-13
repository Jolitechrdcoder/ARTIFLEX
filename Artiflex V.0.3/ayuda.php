<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
  // Si no ha iniciado sesión, redirige al usuario al index.php
  header("Location: index.php");
  exit(); // Asegúrate de terminar la ejecución del script después de la redirección
}
include('db/conexion.php');
$nombreUsuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HELP</title>
</head>
<body>
    <h1>Olvide mi contraseña</h1>
</body>
</html>