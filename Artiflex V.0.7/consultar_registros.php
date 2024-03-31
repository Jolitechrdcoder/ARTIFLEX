<?php
include('db/conexion.php');

if (isset($_GET['persona_id'])) {
    $persona_id = $_GET['persona_id'];

    // Obtener información de la persona
    $sql_persona = "SELECT * FROM personas WHERE id = $persona_id";
    $resultado_persona = $conexion->query($sql_persona);

    if ($resultado_persona->num_rows > 0) {
        $persona = $resultado_persona->fetch_assoc();
        echo "<div class='container'>";
        echo "<h2>Información de la persona seleccionada:</h2>";
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<p><strong>Nombre:</strong> " . $persona['nombre'] . "</p>";
        echo "<p><strong>Apellido:</strong> " . $persona['apellido'] . "</p>";
        echo "<p><strong>Lesion:</strong> " . $persona['lesion'] . "</p>";
        echo "<p><strong>Fecha de Registro:</strong> " . $persona['fecha_registro'] . "</p>";
        echo "</div>"; // Cierre de card-body
        echo "</div>"; // Cierre de card

        // Obtener registros asociados a la persona
        $sql_registros = "SELECT * FROM registros WHERE persona_id = $persona_id ORDER BY fecha DESC";
        $resultado_registros = $conexion->query($sql_registros);

        if ($resultado_registros->num_rows > 0) {
            echo "<h2 class='mt-4'>Registros Citas:</h2>";
            echo "<div class='list-group'>";
            while ($registro = $resultado_registros->fetch_assoc()) {
                echo "<div class='list-group-item'>";
                echo "<p><strong>Fecha:</strong> " . $registro['fecha'] . "</p>";
                echo "<p><strong>Observaciones:</strong> " . $registro['observacion'] . "</p>";
                echo "<p><strong>Rango Mínimo de Rodilla:</strong> " . $registro['min_rodilla'] . "</p>";
                echo "<p><strong>Rango Máximo de Rodilla:</strong> " . $registro['max_rodilla'] . "</p>";
                echo "<p><strong>Repeticiones de Rodilla:</strong> " . $registro['repeticiones_rodilla'] . "</p>";
                echo "<p><strong>Rango Mínimo de Tobillo:</strong> " . $registro['min_tobillo'] . "</p>";
                echo "<p><strong>Rango Máximo de Tobillo:</strong> " . $registro['max_tobillo'] . "</p>";
                echo "<p><strong>Repeticiones de Tobillo:</strong> " . $registro['repeticion_tobillo'] . "</p>";
                echo "</div>"; // Cierre de list-group-item
            }
            echo "</div>"; // Cierre de list-group
        } else {
            echo "<p>No hay registros asociados a esta persona.</p>";
        }
        echo "</div>"; // Cierre de container
    } else {
        echo "<p>No se encontró ninguna persona con el ID especificado.</p>";
    }
}

$conexion->close();
?>

