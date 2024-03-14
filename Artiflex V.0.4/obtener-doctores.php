<?php 
include('db/conexion.php');

if($conexion){
    $consulta = 'SELECT * FROM doctores';
    $datos = $conexion->query($consulta);
    if($datos->num_rows > 0){
        $contador = 1; 
        while($fila = $datos->fetch_assoc()){
            $id = $fila['id'];
            $Nombre = $fila['Nombre'];
            $apellido = $fila['apellido'];
            $especialidad = $fila['especialidad'];
            $fecha = $fila['fecha'];
?>
       <tr>
        <td><?= $contador ?></td> 
        <td><?= $Nombre ?></td>
        <td><?= $apellido ?></td>
        <td><?= $especialidad ?></td>
        <td><?= $fecha ?></td>
        <td>
            <a href="eliminar_doctor.php?id=<?= $id ?>" class="text-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este doctor?')">
                <ion-icon name="trash-outline"></ion-icon>
            </a>
        </td>
       </tr>
<?php
            $contador++; 
        }
    }
}
?>
