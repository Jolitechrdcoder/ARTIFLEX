<?php
include('db/conexion.php');

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idPaciente = $_GET['id'];

    // Realiza la consulta para eliminar al paciente
    $consultaEliminar = "DELETE FROM pacientes WHERE id = ?";
    $stmtEliminar = $conexion->prepare($consultaEliminar);
    $stmtEliminar->bind_param("i", $idPaciente);

    if($stmtEliminar->execute()) {
        
        header("Location: dashboard.php"); 
        exit();
    } else {
        
        echo "Error al eliminar el paciente";
    }

    $stmtEliminar->close();
    $conexion->close();
} else {
   
    echo "ID de paciente no válido";
}
?>
