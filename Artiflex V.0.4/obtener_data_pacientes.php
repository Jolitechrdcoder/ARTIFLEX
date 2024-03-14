<?php
include('db/conexion.php');

if ($conexion) {
    $consulta = 'SELECT * FROM pacientes';
    $datos = $conexion->query($consulta);
    if ($datos->num_rows > 0) {
        $contador = 1; 
        while ($fila = $datos->fetch_assoc()) {
            $id = $fila['id']; 
            $nombre = $fila['nombre'];
            $apellido = $fila['apellido'];
            $lesion = $fila['lesion'];
            $fecha = $fila['fecha'];
            ?>
            <tr>
                <td><?= $contador ?></td> 
                <td><?= $nombre ?></td>
                <td><?= $apellido ?></td>
                <td><?= $lesion ?></td>
                <td><?= $fecha ?></td>
                <td>
                    <a href="detalle_paciente.php?id=<?= $id ?>">
                        <ion-icon class="text-primary" name="eye"></ion-icon>
                    </a>
                    <a href="eliminar_paciente.php?id=<?= $id ?>" class="text-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este paciente?')">
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
