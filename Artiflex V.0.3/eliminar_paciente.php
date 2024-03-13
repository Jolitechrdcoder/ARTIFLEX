<?php
include('db/conexion.php');

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idPaciente = $_GET['id'];

    // Realiza la consulta para eliminar al paciente
    $consultaEliminar = "DELETE FROM pacientes WHERE id = ?";
    $stmtEliminar = $conexion->prepare($consultaEliminar);
    $stmtEliminar->bind_param("i", $idPaciente);

    if($stmtEliminar->execute()) {
        // La eliminación fue exitosa
        header("Location: dashboard.php"); // Redirige de nuevo al dashboard u otra página
        exit();
    } else {
        // Error en la eliminación
        echo "Error al eliminar el paciente";
    }

    $stmtEliminar->close();
    $conexion->close();
} else {
    // ID no proporcionado o no válido
    echo "ID de paciente no válido";
}
?>
