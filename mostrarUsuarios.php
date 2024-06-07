

<?php
include 'db_connection.php';

// Consulta para obtener todas las máquinas
$sql = "SELECT * FROM usuario ORDER BY fecha_inscripcion DESC";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['matricula'] . '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['nombre'] . '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['fecha_inscripcion'] . '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['carrera'] . '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['activaciones'] . '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 70px;">';
        
        if ($fila['estado'] == 0) {
          echo '<a href="actualizarEstado.php?matricula=' . $fila['matricula'] . '" style="background-color: #ED3636; color: white; border-radius: 20px; padding: 5px; margin: 5px; text-decoration: none;">Activar</a>';
        } else {
            echo '<a href="actualizarEstado.php?matricula=' . $fila['matricula'] . '" style="background-color: #00B69B; color: white; border-radius: 20px; padding: 5px; margin: 5px; text-decoration: none;">Desactivar</a>';
        }
          
        echo '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 70px;"><a href="borrarUsuario.php?matricula=' . $fila['matricula'] . '" onclick="return confirm(\'¿Estás seguro de que desea elimar al usuario?\');"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ED3636" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1z"/>
      </svg></a></div></td>';
        echo '</tr>';
    }
}

// Cerrar la conexión
$conexion->close();
?>
