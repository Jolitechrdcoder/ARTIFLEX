<?php

session_start();
if (!isset($_SESSION['usuario'])) {
  // Si no ha iniciado sesión, redirige al usuario al index.php
  header("Location: index.php");
  exit(); // Asegúrate de terminar la ejecución del script después de la redirección
}




include('db/conexion.php');
$registroExitoso = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $ocupacion = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : '';
    $lesion = isset($_POST['lesion']) ? $_POST['lesion'] : '';
    $enfermeda = isset($_POST['enfermeda']) ? $_POST['enfermeda'] : '';
    $entorno = isset($_POST['entorno']) ? $_POST['entorno'] : '';
    $tratamiento = isset($_POST['tratamiento']) ? $_POST['tratamiento'] : '';
    $pregunta = isset($_POST['pregunta']) ? $_POST['pregunta'] : '';
    $edad = isset($_POST['edad']) ? $_POST['edad'] : '';
    $observacion = isset($_POST['observacion']) ? $_POST['observacion'] : '';
    
    
    $fecha = date("Y-m-d H:i:s");

    
    $stm = $conexion->prepare("INSERT INTO pacientes (nombre, apellido, ocupacion, lesion, antecedentes, entorno, tratamiento, pregunta, edad, observacion, fecha)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
    
    $stm->bind_param("sssssssssss", $nombre, $apellido, $ocupacion, $lesion, $enfermeda, $entorno, $tratamiento, $pregunta, $edad, $observacion, $fecha);
    $stm->execute();

    $registroExitoso = true;
    $stm->close();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <img id="cloud" src="./img/logo.png" alt="">
                <span>Artiflex</span>
            </div>

        </div>

        <nav class="navegacion">
            <ul>
                <li>
                    <a id="inbox" href="dashboard.php">
                        <ion-icon name="people-outline"></ion-icon>
                        <span>Pacientes</span>
                    </a>
                </li>
                <li>
                    <a href="usuarios.php">
                        <ion-icon name="person-add-outline"></ion-icon>
                        <span>Doctores</span>
                    </a>
                </li>
                <li>
                    <a href="progreso.php">
                        <ion-icon name="analytics-outline"></ion-icon>
                        <span>Progreso</span>
                    </a>
                </li>

            </ul>
        </nav>

        <div>
            <div class="linea"></div>

            <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span>Oscuro</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <ion-icon name="moon-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <div class="usuario">
                <img src="./img/usuario.png" alt="">
                <div class="info-usuario">
                    <div class="nombre-email">
                    <span class="nombre"><?php echo htmlspecialchars($nombreUsuario); ?></span>
                        <span class="email">artiflex@gmail.com</span>
                    </div>
                    <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                </div>
            </div>
            <br>
            <br>
            <a class="boton" href="cerrar_sesion.php"><ion-icon  name="exit-outline"></ion-icon></a>
        </div>



    </div>


    <main class="container">
        <h1 class="text-center">Añadir Pacientes</h1>
        <h2 class="text-success"><?php echo $registroExitoso ? 'Registro completado con éxito' : ''; ?></h2>
        <form action="anadir-paciente.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nombre</label>
                    <input type="text" class="form-control" name="nombre" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Apellido</label>
                    <input type="text" class="form-control" name="apellido" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Ocupación</label>
                    <input type="text" class="form-control" name="ocupacion" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Lesión</label>
                    <input type="text" class="form-control" name="lesion" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Antecedentes enfermedad familiar</label>
                <input type="text" class="form-control" name="enfermeda" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Entorno familiar y geográfico</label>
                <input type="text" class="form-control" name="entorno" autocomplete="off">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Tratamiento Recibido</label>
                    <input type="text" class="form-control" name="tratamiento" autocomplete="off">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">¿Has experimentado lesiones anteriormente?</label>
                    <input type="text" class="form-control" name="pregunta" autocomplete="off">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Edad</label>
                    <input type="text" class="form-control" name="edad" autocomplete="off">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Observaciones</label>
                <textarea class="form-control" rows="3" name="observacion"></textarea>
            </div>
            <div class="text-center d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="./dashboard.php" class="btn btn-danger">Cancelar</a>
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./script-dashboard.js"></script>
</body>

</html>