<?php
include('db/conexion.php');


$idDoctor = isset($_GET['id']) ? $_GET['id'] : null;


if (!$idDoctor) {
    header("Location: usuarios.php");
    exit();
}


$consulta = "DELETE FROM doctores WHERE id = $idDoctor";

if ($conexion->query($consulta) === TRUE) {
    
    header("Location: usuarios.php");
} else {
    echo "Error al eliminar el doctor: " . $conexion->error;
}

$conexion->close();
?>
