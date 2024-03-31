<?php
include('db/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombrePaciente = $_POST['nombrePaciente'];
    // Realizar la consulta a la base de datos para obtener los datos del paciente
    $sql = "SELECT nombre, apellido, min_rodilla, max_rodilla, min_tobillo, max_tobillo FROM pacientes WHERE nombre = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $nombrePaciente);
    $stmt->execute();
    $result = $stmt->get_result();
    $datos = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($datos);
} else {
    echo "Error: Método no permitido";
}
?>

