

<?php
include 'db_connection.php';

// Consulta para obtener todas las máquinas
$sql = "SELECT * FROM maquina";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td style="display: flex; justify-content: center;"> <img class="machine-img" style="height: 70px;" src="' . $fila['image'] . '"></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['name'] . '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['on_time'] . '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['off_time'] . '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['ubication'] . '</div></td>';
        echo '<td>  <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . (($fila['availability'] == 0) ? '<p style="background-color: #ED3636; color: white; border-radius: 20px; padding: 5px; margin: 5px;">Ocupada</p>' : '<p style="background-color: #00B69B; color: white; border-radius: 20px; padding: 5px; margin: 5px;">Disponible</p>') . '</div></td>';
        echo '</tr>';
    }
}

// Cerrar la conexión
$conexion->close();
?>
