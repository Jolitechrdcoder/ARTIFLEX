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
        <h1>Progreso Pacientes</h1>
        
    </main>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./script-dashboard.js"></script>
</body>
</html>
