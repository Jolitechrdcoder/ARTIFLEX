<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

include('db/conexion.php'); // Asegúrate de que el archivo de conexión esté correctamente ubicado y configurado.

$registroExitoso = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Datos del formulario (se debe agregar la verificación de la existencia de las variables POST)
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $lesion = isset($_POST['lesion']) ? $_POST['lesion'] : '';
    $ocupacion = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : '';
    $edad = isset($_POST['edad']) ? $_POST['edad'] : '';
    $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
    $pregunta = isset($_POST['pregunta']) ? $_POST['pregunta'] : '';
    $tratamiento = isset($_POST['tratamiento']) ? $_POST['tratamiento'] : '';
    $observacion = isset($_POST['observacion']) ? $_POST['observacion'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';

    // Consulta preparada para evitar la inyección SQL
    $sql = "INSERT INTO personas (nombre, apellido, lesion) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sss", $nombre, $apellido, $lesion);

    if ($stmt->execute()) {
        $persona_id = $stmt->insert_id;

        // Corrección en la inserción de datos en la tabla 'registros'
        $sql2 = "INSERT INTO registros (persona_id, ocupacion, edad, genero, pregunta, tratamiento, observacion,telefono) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
        $stmt2 = $conexion->prepare($sql2);
        $stmt2->bind_param("isssssss", $persona_id, $ocupacion, $edad, $genero, $pregunta, $tratamiento, $observacion,$telefono);

        if ($stmt2->execute()) {
            echo "Registro exitoso";
        } else {
            echo "Error en la inserción de registros: " . $stmt2->error;
        }
    } else {
        echo "Error en la inserción de pacientes: " . $stmt->error;
    }

    // Cierre de las conexiones preparadas y de la conexión a la base de datos
    $stmt->close();
    $stmt2->close();
    $conexion->close();

    header("Location: pacientes.php");
}

$nombreUsuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artiflex</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        main {}

        body {
            font-family: "Poppins", sans-serif;
            background-image: url(./img/fondo.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body>
    <main class="container">
        <h1 class="text-center">Añadir Pacientes</h1>
        <h2 class="text-success text-center">
            <?php echo $registroExitoso ? 'Registro completado con éxito' : ''; ?>
        </h2>
        <form action="anadir-paciente.php" method="post">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido">
                    </div>
                    <div class="form-group">
                        <label for="ocupacion">Ocupación</label>
                        <input type="text" class="form-control" name="ocupacion" required>
                    </div>
                    <div class="form-group">
                        <label for="lesion">Lesión</label>
                        <input type="text" class="form-control" name="lesion" required>
                    </div>
                    <div class="form-group">
                        <label for="pregunta">¿Has experimentado lesiones anteriormente?</label>
                        <input type="text" class="form-control" name="pregunta" required>
                    </div>
                    <div class="form-group">
                        <label for="tratamiento">Tratamiento Recibido</label>
                        <input type="text" class="form-control" name="tratamiento" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edad">Edad</label>
                            <input type="text" class="form-control" name="edad" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="genero">Género</label>
                            <input type="text" class="form-control" name="genero" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="observacion">Observaciones</label>
                        <textarea class="form-control" rows="3" name="observacion"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="enfermedad">telefono</label>
                        <input type="text" class="form-control" name="telefono" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block">Guardar Paciente</button>
                </div>
                <div class="col-md-6">
                    <a href="./pacientes.php" class="btn btn-secondary btn-block">Cancelar</a>
                </div>
            </div>
        </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
