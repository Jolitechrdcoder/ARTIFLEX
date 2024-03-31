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
                    <a id="inbox" href="dashboard.php">
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
                    <a href="progreso2.php">
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
    <h1>Home</h1>
    <br>
    <div class="card-deck">
        <div class="card text-white bg-success mb-4">
            <div class="card-header">Pacientes</div>
            <div class="card-body">
                <h5 class="card-title">Total de Pacientes</h5>
                <p class="card-text">
                <ion-icon name="people-outline"></ion-icon>
                    <?php
                    // Consulta para obtener el número total de pacientes
                    $query = "SELECT COUNT(*) AS total_pacientes FROM personas";
                    $result = mysqli_query($conexion, $query);
                    $row = mysqli_fetch_assoc($result);
                    $total_pacientes = $row['total_pacientes'];
                    echo $total_pacientes;
                    ?>
                </p>
            </div>
        </div>
        <div class="card text-white bg-primary mb-4">
            <div class="card-header">Doctores</div>
            <div class="card-body">
                <h5 class="card-title">Total de Doctores</h5>
                
                <p class="card-text">
                <ion-icon name="person-outline"></ion-icon>
                    <?php
                    // Consulta para obtener el número total de doctores
                    $query = "SELECT COUNT(*) AS total_doctores FROM doctores";
                    $result = mysqli_query($conexion, $query);
                    $row = mysqli_fetch_assoc($result);
                    $total_doctores = $row['total_doctores'];
                    echo $total_doctores;
                    ?>
                </p>
            </div>
        </div>
    </div>
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
    <script src="./script-dashboard.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('formBusqueda').addEventListener('submit', function(e) {
            e.preventDefault();
            executeSearch();
        });

        var inputBusqueda = document.getElementById('inputBusqueda');


        inputBusqueda.addEventListener('click', function() {

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
    </script>

</body>

</html>