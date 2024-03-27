<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    
    header("Location: index.php");
    exit();  
}
include('db/conexion.php');

$nombreUsuario = $_SESSION['usuario'];


$idPaciente = isset($_GET['id']) ? $_GET['id'] : null;


if (!$idPaciente) {
    header("Location: dashboard.php");
    exit();
}


$consulta = "SELECT *, genero FROM pacientes WHERE id = $idPaciente";

$datos = $conexion->query($consulta);


if ($datos->num_rows > 0) {
    $paciente = $datos->fetch_assoc();
} else {
    echo "No se encontró ningún paciente con el ID proporcionado.";
    exit();
}



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

<body id="body">
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
                    <a id="inbox" href="#">
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

                <li>
                    <a href="mqtt_config.php">
                        <ion-icon name="cog-outline"></ion-icon>
                        <span>Configuracion</span>
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
                        <span class="nombre">
                            <?php echo htmlspecialchars($nombreUsuario); ?>
                        </span>
                        <span class="email">artiflex@gmail.com</span>
                    </div>
                    <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                </div>
            </div>
            <br>
            <br>
            <a class="boton" href="cerrar_sesion.php"><ion-icon name="exit-outline"></ion-icon></a>

        </div>



    </div>


    <main class="container">
    <h1 class="mb-4">Detalles del Paciente</h1>
    <div class="card">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong class="text-primary">Nombre:</strong> <?php echo $paciente['nombre']; ?></li>
                <li class="list-group-item"><strong class="text-primary">Apellido:</strong> <?php echo $paciente['apellido']; ?></li>
                <li class="list-group-item"><strong class="text-primary">Lesión:</strong> <?php echo $paciente['lesion']; ?></li>
                <li class="list-group-item"><strong class="text-primary">Ocupación:</strong> <?php echo $paciente['ocupacion']; ?></li>
                <li class="list-group-item"><strong class="text-primary">Antecedentes:</strong> <?php echo $paciente['antecedentes']; ?></li>
                <li class="list-group-item"><strong class="text-primary">Entorno:</strong> <?php echo $paciente['entorno']; ?></li>
                <li class="list-group-item"><strong class="text-primary">Tratamiento:</strong> <?php echo $paciente['tratamiento']; ?></li>
                <li class="list-group-item"><strong class="text-primary">¿Has experimentado lesiones anteriormente?</strong> <?php echo $paciente['pregunta']; ?></li>
                <li class="list-group-item"><strong class="text-primary">Edad:</strong> <?php echo $paciente['edad']; ?></li>
                <li class="list-group-item"><strong class="text-primary">Género:</strong> <?php echo $paciente['genero']; ?></li>
                <li class="list-group-item"><strong class="text-primary">Observación:</strong> <?php echo $paciente['observacion']; ?></li>
                <li class="list-group-item"><strong class="text-primary">Fecha de Registro:</strong> <?php echo $paciente['fecha']; ?></li>
            </ul>

            <h2 class="mt-4 mb-3">Detalles Cita</h2>
            <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong class="text-primary">No.Cita:</strong> <?php echo $paciente['cita']; ?></li>
                <li class="list-group-item"><strong class="text-primary">Fecha y hora:</strong> <?php echo $paciente['fecha_cita']; ?></li>
                <li class="list-group-item">
                    <h4>Rangos Movimiento Rodilla</h4>
                    <ul class="list-group">
                        <li class="list-group-item"><strong class="text-primary">Rango mínimo:</strong> <?php echo $paciente['min_rodilla']; ?></li>
                        <li class="list-group-item"><strong class="text-primary">Rango máximo:</strong> <?php echo $paciente['max_rodilla']; ?></li>
                        <li class="list-group-item"><strong class="text-primary">Repeticiones:</strong> <?php echo $paciente['repeticion_rodilla']; ?></li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <h4>Rangos Movimiento Tobillo</h4>
                    <ul class="list-group">
                        <li class="list-group-item"><strong class="text-primary">Rango mínimo:</strong> <?php echo $paciente['min_tobillo']; ?></li>
                        <li class="list-group-item"><strong class="text-primary">Rango máximo:</strong> <?php echo $paciente['max_tobillo']; ?></li>
                        <li class="list-group-item"><strong class="text-primary">Repeticiones:</strong> <?php echo $paciente['repeticion_tobillo']; ?></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="">
        <h4 class="font-weight-semibold text-center">Progreso Paciente</h4>

        
        <div id="grafica" style="height: 60vh; max-height: 400px; width: 100%;"></div>
        </div>
        </div>
        <div class="card-footer d-flex justify-content-between">
    <button class="btn btn-danger" onclick="confirmarEliminar(<?php echo $paciente['id']; ?>)">Eliminar Paciente</button>
    <a href="dashboard.php" class="btn btn-secondary">Cancelar</a>
</div>

    </div>
</main>




<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.0/echarts.min.js"></script>
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
    <script>
        function confirmarEliminar(idPaciente) {
        if (confirm("¿Estás seguro de que deseas eliminar este paciente?")) {
            window.location.href = "eliminar_paciente.php?id=" + idPaciente;
        }
    }
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('formBusqueda').addEventListener('submit', function (e) {
                e.preventDefault(); 
                executeSearch();
            });

            var inputBusqueda = document.getElementById('inputBusqueda');

            
            inputBusqueda.addEventListener('click', function () {
                
                closeSidebar();
            });
        });

        function executeSearch() {
            var inputBusqueda = document.getElementById('inputBusqueda').value.toLowerCase();
            var tablaPacientes = document.getElementById('tablaPacientes');
            var filas = tablaPacientes.getElementsByTagName('tr');

            for (var i = 0; i < filas.length; i++) {
                var celdas = filas[i].getElementsByTagName('td');
                var mostrarFila = false;

                for (var j = 0; j < celdas.length; j++) {
                    var textoCelda = celdas[j].innerText.toLowerCase();

                    if (textoCelda.includes(inputBusqueda)) {
                        mostrarFila = true;
                        break;
                    }
                }

                filas[i].style.display = mostrarFila ? '' : 'none';
            }
        }

        function closeSidebar() {
            
        }

        document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('formBusqueda').addEventListener('submit', function (e) {
            e.preventDefault(); 
            var inputBusqueda = document.getElementById('inputBusqueda').value.toLowerCase();
            var tablaPacientes = document.getElementById('tablaPacientes');
            var filas = tablaPacientes.getElementsByTagName('tr');

            for (var i = 0; i < filas.length; i++) {
                var celdas = filas[i].getElementsByTagName('td');
                var mostrarFila = false;

                for (var j = 0; j < celdas.length; j++) {
                    var textoCelda = celdas[j].innerText.toLowerCase();
                    
                    if (textoCelda.includes(inputBusqueda)) {
                        mostrarFila = true;
                        break;
                    }
                }

                filas[i].style.display = mostrarFila ? '' : 'none';
            }
        });
    });
        
    document.addEventListener('DOMContentLoaded', function () {
        var minRodilla = <?php echo $paciente['min_rodilla']; ?>;
        var maxRodilla = <?php echo $paciente['max_rodilla']; ?>;
        var minTobillo = <?php echo $paciente['min_tobillo']; ?>;
        var maxTobillo = <?php echo $paciente['max_tobillo']; ?>;
        
        var myChart = echarts.init(document.getElementById('grafica'));

        var option = {
            xAxis: {
                type: 'category',
                data: ['Rango mínimo', 'Rango máximo']
            },
            yAxis: {
                type: 'value',
                min: 0,
                max: Math.max(maxRodilla, maxTobillo) + 10 // Ajusta el rango del eje Y según los valores
            },
            series: [{
                type: 'bar',
                data: [minRodilla, maxRodilla] // Datos de la rodilla
            }, {
                type: 'bar',
                data: [minTobillo, maxTobillo] // Datos del tobillo
            }]
        };

        myChart.setOption(option);
    });
    </script>

</body>

</html>