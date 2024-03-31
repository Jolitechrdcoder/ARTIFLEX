<?php
include('db/conexion.php');

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idPaciente = $_GET['id'];

    // Eliminar registros relacionados en la tabla 'registros'
    $consultaEliminarRegistros = "DELETE FROM registros WHERE persona_id = ?";
    $stmtEliminarRegistros = $conexion->prepare($consultaEliminarRegistros);
    $stmtEliminarRegistros->bind_param("i", $idPaciente);

    if($stmtEliminarRegistros->execute()) {
        // Ahora podemos eliminar el paciente sin violar la restricción de clave externa
        $consultaEliminar = "DELETE FROM personas WHERE id = ?";
        $stmtEliminar = $conexion->prepare($consultaEliminar);
        $stmtEliminar->bind_param("i", $idPaciente);

        if($stmtEliminar->execute()) {
            header("Location: pacientes.php"); 
            exit();
        } else {
            echo "Error al eliminar el paciente";
        }

        $stmtEliminar->close();
    } else {
        echo "Error al eliminar los registros relacionados";
    }

    $stmtEliminarRegistros->close();
    $conexion->close();
} else {
    echo "ID de paciente no válido";
}

?>
