<?php

session_start();
if (!isset ($_SESSION['usuario'])) {

    header("Location: index.php");
    exit();
}




include ('db/conexion.php');
$registroExitoso = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cita = isset ($_POST['cita']) ? $_POST['cita'] : '';
    $nombre = isset ($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset ($_POST['apellido']) ? $_POST['apellido'] : '';
    $ocupacion = isset ($_POST['ocupacion']) ? $_POST['ocupacion'] : '';
    $lesion = isset ($_POST['lesion']) ? $_POST['lesion'] : '';
    $enfermeda = isset ($_POST['enfermeda']) ? $_POST['enfermeda'] : '';
    $entorno = isset ($_POST['entorno']) ? $_POST['entorno'] : '';
    $tratamiento = isset ($_POST['tratamiento']) ? $_POST['tratamiento'] : '';
    $pregunta = isset ($_POST['pregunta']) ? $_POST['pregunta'] : '';
    $edad = isset ($_POST['edad']) ? $_POST['edad'] : '';
    $genero = isset ($_POST['genero']) ? $_POST['genero'] : '';
    $observacion = isset ($_POST['observacion']) ? $_POST['observacion'] : '';
    $min_rodilla = isset ($_POST['min_rodilla']) ? $_POST['min_rodilla'] : '';
    $max_rodilla = isset ($_POST['max_rodilla']) ? $_POST['max_rodilla'] : '';
    $repeticiones_rodilla = isset ($_POST['repeticiones_rodilla']) ? $_POST['repeticiones_rodilla'] : '';
    $min_tobillo = isset ($_POST['min_tobillo']) ? $_POST['min_tobillo'] : '';
    $max_tobillo = isset ($_POST['max_tobillo']) ? $_POST['max_tobillo'] : '';
    $repeticiones_tobillo = isset ($_POST['repeticiones_tobillo']) ? $_POST['repeticiones_tobillo'] : '';
    $fecha_cita = date("Y-m-d H:i:s");


    $fecha = date("Y-m-d H:i:s");


    $stm = $conexion->prepare("INSERT INTO pacientes (cita,nombre, apellido, ocupacion, lesion, antecedentes, entorno, tratamiento, pregunta, edad,genero, observacion,min_rodilla,max_rodilla,repeticion_rodilla,min_tobillo,max_tobillo,repeticion_tobillo,fecha_cita, fecha)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?) ");

    $stm->bind_param("ssssssssssssssssssss", $cita, $nombre, $apellido, $ocupacion, $lesion, $enfermeda, $entorno, $tratamiento, $pregunta, $edad, $genero, $observacion, $min_rodilla, $max_rodilla, $repeticiones_rodilla, $min_tobillo, $max_tobillo, $repeticiones_tobillo, $fecha_cita, $fecha);
    $stm->execute();

    $registroExitoso = true;
    $stm->close();
    $conexion->close();
    header("Location: dashboard.php");
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
                        <label for="nombre">N.cita</label>
                        <input type="text" class="form-control" name="cita">
                    </div>
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
                        <label for="enfermedad">Antecedentes enfermedad familiar</label>
                        <input type="text" class="form-control" name="enfermedad" required>
                    </div>
                    <div class="form-group">
                        <label for="entorno">Entorno familiar y geográfico</label>
                        <input type="text" class="form-control" name="entorno" required>
                    </div>
                    <div class="form-group">
                        <label for="tratamiento">Tratamiento Recibido</label>
                        <input type="text" class="form-control" name="tratamiento" required>
                    </div>
                    <div class="form-group">
                        <label for="pregunta">¿Has experimentado lesiones anteriormente?</label>
                        <input type="text" class="form-control" name="pregunta" required>
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
                </div>
            </div>
            <div class="row justify-content-center">
                <h1>Config</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <h1>Rodilla</h1>
                        <label for="min_rodilla">min</label>
                        <input type="text" class="form-control" name="min_rodilla" required>
                    </div>
                    <div class="form-group">
                        <label for="max_rodilla">max</label>
                        <input type="text" class="form-control" name="max_rodilla" required>
                    </div>

                    <div class="form-group">
                        <label for="mensajeRodilla">Pocicion actual</label>
                        <input type="text" class="form-control" id="mensajeRodilla" readonly>
                    </div>
                    <div class="text-center">
                        <!-- Botones para ajustar valores de rodilla -->
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button id="decrease1-rodilla" type="button" class="btn btn-primary">- 1°</button>
                            <button id="decrease10-rodilla" type="button" class="btn btn-primary">- 10°</button>
                            <button id="increase1-rodilla" type="button" class="btn btn-primary">+ 1°</button>
                            <button id="increase10-rodilla" type="button" class="btn btn-primary">+ 10°</button>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="repeticiones_rodilla">Repeticiones</label>
                        <input type="text" class="form-control" name="repeticiones_rodilla" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <h1>tobillo</h1>
                        <label for="min_tobillo">min</label>
                        <input type="text" class="form-control" name="min_tobillo" required>
                    </div>
                    <div class="form-group">
                        <label for="max_tobillo">max</label>
                        <input type="text" class="form-control" name="max_tobillo" required>
                    </div>
                    <div class="form-group">
                        <label for="mensajeRodilla">Pocicion actual</label>
                        <input type="text" class="form-control" id="mensajetobillo" readonly>
                    </div>
                    

                    <div class="text-center">
                        <!-- Botones para ajustar valores de tobillo -->
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button id="decrease1-tobillo" type="button" class="btn btn-primary">- 1°</button>
                            <button id="decrease10-tobillo" type="button" class="btn btn-primary">- 10°</button>
                            <button id="increase1-tobillo" type="button" class="btn btn-primary">+ 1°</button>
                            <button id="increase10-tobillo" type="button" class="btn btn-primary">+ 10°</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="repeticiones_tobillo">Repeticiones</label>
                        <input type="text" class="form-control" name="repeticiones_tobillo" required>
                    </div>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block" id="guardarYEnviar" >Guardar y enviar</button>
                </div>
                <div class="col-md-6">
                    <a href="./dashboard.php" class="btn btn-secondary btn-block">Cancelar</a>
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./script-dashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js"></script>


    <script>

        const hostname = "mqtt-dashboard.com";
        const port = 8884;
        const clientId = `clientId-${new Date().getUTCMilliseconds()}`;
        const username = "webclient";
        const password = "Super$icher123";
        const mqttClient = new Paho.MQTT.Client(hostname, port, clientId);


        mqttClient.connect({
            onSuccess: function () {
                console.log("Conectado al servidor MQTT");
            },
            onFailure: function (res) {
                console.log("Error al conectar al servidor MQTT: " + res.errorMessage);
            },
            useSSL: true,
            userName: username,
            password: password
        });


        
        const subscriberClient = new Paho.MQTT.Client(hostname, port, `subscriber-${new Date().getUTCMilliseconds()}`);

        
        const subscriberOptions = {
            onSuccess: function () {
                console.log("ya nos suscribimos a los topicos");
                
                subscriberClient.subscribe('ESPenviarrodilla');
                subscriberClient.subscribe('ESPenviartobillo');
            },
            onFailure: function (res) {
                console.log("Error al conectar el cliente suscriptor: " + res.errorMessage);
            },
            useSSL: true,
            userName: username,
            password: password
        };

        
        subscriberClient.onMessageArrived = function (message) {
    console.log("Mensaje recibido del topic '" + message.destinationName + "': " + message.payloadString);
    if (message.destinationName === 'ESPenviarrodilla') {
        document.getElementById('mensajeRodilla').value = message.payloadString;
    } else if (message.destinationName === 'ESPenviartobillo') {
        document.getElementById('mensajetobillo').value = message.payloadString;
    }
};


        
        subscriberClient.connect(subscriberOptions);

        
        function sendToRodilla(value) {
            var message = new Paho.MQTT.Message(value.toString());
            message.destinationName = 'ESPpruebadelrodilla';
            if (!mqttClient.isConnected()) {
                mqttClient.connect({
                    onSuccess: function () {
                        console.log("Conectado al servidor MQTT");
                        mqttClient.send(message);
                    },
                    onFailure: function (res) {
                        console.log("Error al conectar al servidor MQTT: " + res.errorMessage);
                    }
                });
            } else {
                mqttClient.send(message);
            }
        }

        
        function sendToTobillo(value) {
            var message = new Paho.MQTT.Message(value.toString());
            message.destinationName = 'ESPpruebadeltobillo';
            if (!mqttClient.isConnected()) {
                mqttClient.connect({
                    onSuccess: function () {
                        console.log("Conectado al servidor MQTT");
                        mqttClient.send(message);
                    },
                    onFailure: function (res) {
                        console.log("Error al conectar al servidor MQTT: " + res.errorMessage);
                    }
                });
            } else {
                mqttClient.send(message);
            }
        }
          
          
    function enviarDatosMQTT() {
    var minRodilla = document.getElementsByName('min_rodilla')[0].value;
    var maxRodilla = document.getElementsByName('max_rodilla')[0].value;
    var minTobillo = document.getElementsByName('min_tobillo')[0].value; 
    var maxTobillo = document.getElementsByName('max_tobillo')[0].value; 
    var repetrodilla = document.getElementsByName('repeticiones_rodilla')[0].value; 
    var repettobillo = document.getElementsByName('repeticiones_tobillo')[0].value; 
    
    var inicioTerapiaMessage = new Paho.MQTT.Message("1");
    inicioTerapiaMessage.destinationName = 'ESPiniciodeterapia1';
    mqttClient.send(inicioTerapiaMessage);

    var minRodillaMessage = new Paho.MQTT.Message(minRodilla);
    minRodillaMessage.destinationName = 'ESPlimiterodillamin';
    mqttClient.send(minRodillaMessage);

   
    var maxRodillaMessage = new Paho.MQTT.Message(maxRodilla);
    maxRodillaMessage.destinationName = 'ESPlimiterodillamax';
    mqttClient.send(maxRodillaMessage);

    
    var minTobilloMessage = new Paho.MQTT.Message(minTobillo);
    minTobilloMessage.destinationName = 'ESPlimitetobillomin';
    mqttClient.send(minTobilloMessage);

  
    var maxTobilloMessage = new Paho.MQTT.Message(maxTobillo);
    maxTobilloMessage.destinationName = 'ESPlimitetobillomax';
    mqttClient.send(maxTobilloMessage);

    var Reprodilla = new Paho.MQTT.Message(repetrodilla);
    Reprodilla.destinationName = 'ESPnumrepeticiones1';
    mqttClient.send(Reprodilla);

    var Reptobillo = new Paho.MQTT.Message(repettobillo);
    Reptobillo.destinationName = 'ESPnumrepeticiones2';
    mqttClient.send(Reptobillo);

    
   
    
    }


   
    document.getElementById('guardarYEnviar').addEventListener('click', function() {
        enviarDatosMQTT();
    });

        var decrease1ButtonRodilla = document.getElementById('decrease1-rodilla');
        var decrease10ButtonRodilla = document.getElementById('decrease10-rodilla');
        var increase1ButtonRodilla = document.getElementById('increase1-rodilla');
        var increase10ButtonRodilla = document.getElementById('increase10-rodilla');


        var decrease1ButtonTobillo = document.getElementById('decrease1-tobillo');
        var decrease10ButtonTobillo = document.getElementById('decrease10-tobillo');
        var increase1ButtonTobillo = document.getElementById('increase1-tobillo');
        var increase10ButtonTobillo = document.getElementById('increase10-tobillo');


        decrease1ButtonRodilla.addEventListener('click', function () {
            sendToRodilla(-1);
        });

        decrease10ButtonRodilla.addEventListener('click', function () {
            sendToRodilla(-10);
        });

        increase1ButtonRodilla.addEventListener('click', function () {
            sendToRodilla(1);
        });

        increase10ButtonRodilla.addEventListener('click', function () {
            sendToRodilla(10);
        });


        decrease1ButtonTobillo.addEventListener('click', function () {
            sendToTobillo(-1);
        });

        decrease10ButtonTobillo.addEventListener('click', function () {
            sendToTobillo(-10);
        });

        increase1ButtonTobillo.addEventListener('click', function () {
            sendToTobillo(1);
        });

        increase10ButtonTobillo.addEventListener('click', function () {
            sendToTobillo(10);
        });

    

    </script>


</body>

</html>
