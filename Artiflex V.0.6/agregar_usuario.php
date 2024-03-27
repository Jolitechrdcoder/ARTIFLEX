<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  
  header("Location: index.php");
  exit(); 
}

include('db/conexion.php');
$registroExitoso = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : '';
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    
    
    $stmDoctores = $conexion->prepare("INSERT INTO doctores (nombre, apellido, especialidad, fecha) VALUES (?, ?, ?, ?)");
    $stmDoctores->bind_param("ssss", $nombre, $apellido, $especialidad, $fecha);
    $stmDoctores->execute();
    $stmDoctores->close();
    header("Location: usuarios.php");
    $registroExitoso = true;
    $conexion->close();
}

$nombreUsuario = $_SESSION['usuario'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artiflex</title>
    <link rel="stylesheet" href="./estilos_dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
   

    <main class="container">
    <h1 class="text-center">Añadir Usuario</h1>
    <form action="agregar_usuario.php" method="post" >
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nombre</label>
                <input type="text" class="form-control"  name="nombre" autocomplete="off"  required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Apellido</label>
                <input type="text" class="form-control" name="apellido" autocomplete="off"  required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Especialidad</label>
                <input type="text" class="form-control" name="especialidad" autocomplete="off" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Fecha</label>
                <input type="text" class="form-control" name="fecha" autocomplete="off" required>
            </div>
        </div>
        
        <div class="text-center d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="./usuarios.php" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./script-dashboard.js"></script>
</body>
</html>