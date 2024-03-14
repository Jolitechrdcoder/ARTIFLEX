<?php
session_start();

include('db/conexion.php'); 

if(isset($_POST['usuario']) && isset($_POST['password'])) { 
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['password'];

    
    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $contrasena = mysqli_real_escape_string($conexion, $contrasena);

    $consulta = "SELECT * FROM doctores WHERE Nombre = '$usuario' AND apellido = '$contrasena'";
    $resultado = mysqli_query($conexion, $consulta);

    if($resultado) { 
        if(mysqli_num_rows($resultado) > 0) { 
            $_SESSION['usuario'] = $usuario;
            header("location:dashboard.php"); 
            exit(); 
        } else {
            echo "Usuario o contraseña incorrectos"; 
        }

        mysqli_free_result($resultado); 
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion); 
    }
} else {
    // echo "Por favor, complete todos los campos"; 
}

mysqli_close($conexion); 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Artiflex</title>
   
    <link rel="stylesheet" href="style.css"/>
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">

          <!-- formulario para iniciar session -->
            <form action="index.php" autocomplete="off" class="sign-in-form" method="post">
              <div class="logo">
                <img src="./img/logo.png" alt="easyclass" />
                <h4>Artiflex</h4>
              </div>

              <div class="heading">
                <h2>¡Bienvenido!</h2>
               
                
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    name="usuario"
                    required
                  />
                  <label>Usuario</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    name="password"
                    required
                  />
                  <label>Contrasena</label>
                </div>

                <input type="submit" value="Iniciar sesion" class="sign-btn" />

                <p class="text">
                    ¿Olvidó su nombre de usuario o contraseña?
                  <a href="ayuda.php">Obtener ayuda</a>
                </p>
              </div>
            </form>

          </div>
          <!-- slider de imagenes -->
          <div class="carousel">
            <div class="images-wrapper">
              <img src="#" class="image img-1 show" alt="" />
              <img src="#" class="image img-2" alt="" />
              <img src="#" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>¡Revolución en Rehabilitación!</h2>
                  <h2>
                    ¡Transforma tu Bienestar!</h2>
                  <h2>¡No te pierdas esta oportunidad!</h2>
                </div>
              </div>
              <!-- mini balas animadas -->
              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- script para animaciones y slider -->

    <script src="main.js"></script>
  </body>
</html>
