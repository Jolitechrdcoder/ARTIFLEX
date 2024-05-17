<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  
  header("Location: index.php");
  exit(); 
}
include('db/conexion.php');

$nombreUsuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artiflex</title>
     <link rel="icon" type="image/png" href="./img/logo.png">
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
                    <a  href="dashboard.php">
                        <ion-icon name="home-outline"></ion-icon>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="pacientes.php">
                        <ion-icon name="people-outline"></ion-icon>
                        <span>Pacientes</span>
                    </a>
                </li>
                <li>
                    <a href="citas.php">
                        <ion-icon name="calendar-outline"></ion-icon>
                        <span>Citas</span>
                    </a>
                </li>
                <li>
                    <a href="usuarios.php">
                        <ion-icon name="person-outline"></ion-icon>
                        <span>Doctores</span>
                    </a>
                </li>
                <li>
                    <a id="inbox" href="progreso2.php">
                        <ion-icon name="stats-chart-outline"></ion-icon>
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
            <a class="boton" href="cerrar_sesion.php">
                <ion-icon name="exit-outline"></ion-icon>
            </a>

        </div>



    </div>


    <main>
                    <h1 class="mt-3">Progreso Pacientes</h1>
                    <br>
                    <form id="formConsultar">
                        <div class="form-group">
                        <canvas id="myChart" width="400" height="200"></canvas>
                            <select id="persona_id" name="persona_id" class="form-control">
                                <option value="">Seleccionar persona</option>
                                <?php
                                include('db/conexion.php');
                                $sql_personas = "SELECT * FROM personas";
                                $resultado_personas = $conexion->query($sql_personas);
                                if ($resultado_personas->num_rows > 0) {
                                    while ($persona = $resultado_personas->fetch_assoc()) {
                                        echo "<option value='".$persona["id"]."'>".$persona["nombre"]."</option>";
                                    }
                                } else {
                                    echo "<option value=''>No hay personas registradas</option>";
                                }
                                $conexion->close();
                                ?>
                                
                            </select>
                            
                        </div>
                        <button type="button" class="btn btn-primary" onclick="consultarRegistros()">Consultar</button>
                    </form>
                    <div id="resultado" class="mt-4"></div>
                </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="./script-dashboard.js"></script>
   <script>
    function consultarRegistros() {
        var personaId = document.getElementById("persona_id").value;
        if (personaId === "") {
            alert("Por favor selecciona una persona");
            return;
        }

        // Generar nuevos valores aleatorios para los datos del gráfico
        var randomValue1 = Math.floor(Math.random() * 100);
        var randomValue2 = Math.floor(Math.random() * 100);
        var randomValue3 = Math.floor(Math.random() * 100);
        var randomValue4 = Math.floor(Math.random() * 100);

        // Actualizar los datos del gráfico con los nuevos valores aleatorios
        myChart.data.datasets[0].data = [randomValue1, randomValue2, randomValue3, randomValue4];
        myChart.update();

        // Realizar la consulta AJAX u otras acciones necesarias
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("resultado").innerHTML = xhr.responseText;
            }
        };
        xhr.open("GET", "consultar_registros.php?persona_id=" + personaId, true);
        xhr.send();
    }

    // Obtener el contexto del canvas
    var ctx = document.getElementById('myChart').getContext('2d');

    // Configurar los datos del gráfico
    var data = {
        labels: ['Min_tobillo', 'Max_tobillo', 'Min_rodilla', 'Max_rodilla'],
        datasets: [{
            label: 'Dataset',
            data: [0, 0, 0, 0],
            borderColor: 'rgba(75, 192, 192, 1)', // Color de la línea
            backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color del área bajo la línea
            borderWidth: 2,
            fill: true // Rellenar el área bajo la línea
        }]
    };

    // Configurar las opciones del gráfico
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };

    // Crear el gráfico de líneas
    var myChart = new Chart(ctx, {
        type: 'line', // Tipo de gráfico de líneas
        data: data, // Datos del gráfico
        options: options // Opciones del gráfico
    });
</script>


</body>

</html>
