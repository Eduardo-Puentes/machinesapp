

<?php
include 'db_connection.php';

// Consulta para obtener todas las máquinas
$sql = "SELECT * FROM logs INNER JOIN maquina ON logs.maquina_id = maquina.id ORDER BY logs.hora DESC LIMIT 10;";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td style="display: flex; justify-content: center;"> <img class="machine-img" style="height: 70px;" src="' . $fila['image'] . '"></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['name'] . '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['usuario_id'] . '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['hora'] . '</div></td>';
        echo '<td>  <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . (($fila['accion'] == "apagado") ? '<p style="background-color: #ED3636; color: white; border-radius: 20px; padding: 5px; margin: 5px;">Apagado</p>' : '<p style="background-color: #00B69B; color: white; border-radius: 20px; padding: 5px; margin: 5px;">Encendido</p>') . '</div></td>';
        echo '</tr>';
    }
}

// Cerrar la conexión
$conexion->close();
?>
