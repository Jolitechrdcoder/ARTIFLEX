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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                    <a href="dashboard.php">
                    <ion-icon name="people-outline"></ion-icon>
                        <span>Pacientes</span>
                    </a>
                </li>
                <li>
                    <a  href="usuarios.php">
                    <ion-icon name="person-add-outline"></ion-icon>
                        <span> <span>Doctores</span></span>
                    </a>
                </li>
                <li>
                    <a  id="inbox"  href="progreso.php">
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


    <main>
        <h1 class="font-weight-semibold">Progreso Pacientes</h1>
        <form class="form-inline" id="formBusqueda">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="inputBusqueda">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
       </form>
        <div id="grafica" style="height: 60vh; max-height: 400px; width: 100%;"></div>
        </div>
    </main>
     <!-- Apache ECharts  libreriaq-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.0/echarts.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./script-dashboard.js"></script>
    <script>
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
        
        var myChart = echarts.init(document.getElementById('grafica'));

        
        function generateRandomData() {
            var data = [];
            for (var i = 0; i < 10; i++) {
                data.push(Math.random() * 100);
            }
            return data;
        }


        var option = {
            xAxis: {
                type: 'category',
                data: ['0°', '30°', '35°', '40°', '55°', '60°', '65°', '70°', '80°', '90°'] // Categorías en el eje X
            },
            yAxis: {
                type: 'value',
                
                min: 0,
                max: 100
            },
            series: [{
                type: 'line', 
                data: generateRandomData() 
            }]
        };

       
        myChart.setOption(option);

        
        setInterval(function () {
            option.series[0].data = generateRandomData();
            myChart.setOption(option);
        }, 2000);

        
        if (window.innerWidth <= 768) {
            myChart.setOption({
                series: [{
                    type: 'bar', 
                    barMaxWidth: '30%', 
                    data: generateRandomData() 
                }]
            });
        }


        window.addEventListener('resize', function () {
            if (window.innerWidth <= 768) {
                myChart.setOption({
                    series: [{
                        type: 'bar',
                        barMaxWidth: '30%', 
                        data: generateRandomData() 
                    }]
                    
                });
            } else {
                myChart.setOption({
                    series: [{
                        type: 'line', 
                        data: generateRandomData() 
                    }]
                });
            }
        });
    </script>


</body>
</html>