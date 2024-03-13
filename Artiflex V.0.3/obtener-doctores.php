<?php 
include('db/conexion.php');


if($conexion){
    $consulta = 'SELECT *FROM doctores ';
    $datos = $conexion->query($consulta);
    if($datos->num_rows > 0){
        $contador =0;
        while($fila = $datos->fetch_assoc()){
            $id = $contador+=1;
            $Nombre = $fila['Nombre'];
            $apellido = $fila['apellido'];
            $especialidad = $fila['especialidad'];
            $fecha = $fila['fecha'];
?>
       <tr>
        <td><?= $id?></td>
        <td><?= $Nombre?></td>
        <td><?= $apellido?></td>
        <td><?= $especialidad?></td>
        <td><?= $fecha?></td>
        <td>
        <a href=""><ion-icon class="text-success" name="create-outline"></ion-icon></a>
        <a href=""><ion-icon class="text-danger" name="trash-outline"></ion-icon></a>
        
        </td>
       </tr>







<?php
        }
    }
}


?>