<?php 
include('db/conexion.php');


if($conexion){
    $consulta = 'SELECT *FROM pacientes ';
    $datos = $conexion->query($consulta);
    if($datos->num_rows > 0){
        $contador =0;
        while($fila = $datos->fetch_assoc()){
            $id = $contador+=1;
            $nombre = $fila['nombre'];
            $apellido = $fila['apellido'];
            $lesion = $fila['lesion'];
            $fecha = $fila['fecha'];
?>
       <tr>
        <td><?= $id?></td>
        <td><?= $nombre?></td>
        <td><?= $apellido?></td>
        <td><?= $lesion?></td>
        <td><?= $fecha?></td>
        <td>
        <a href=""><ion-icon class="text-success" name="create-outline"></ion-icon></a>
        <a href=""><ion-icon class="text-primary" name="eye"></ion-icon></a>
        
       
        </td>
       </tr>







<?php
        }
    }
}


?>