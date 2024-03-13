<?php

// Inicia la sesión si aún no se ha iniciado
session_start();

// Destruye todas las variables de sesión
$_SESSION = array();

// Cierra la sesión
session_destroy();

// Redirige al usuario a la página de inicio de sesión
header("Location: index.php");
exit();
?>
