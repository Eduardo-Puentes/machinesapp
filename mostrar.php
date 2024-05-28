

<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Usuario por defecto de MySQL en XAMPP
$password = ""; // Sin contraseña por defecto en XAMPP
$dbname = "maquina"; // Nombre de la base de datos que creaste

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

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
        echo '<td> <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 70px;"><a href="borrarUsuario.php?id=' . $fila['id'] . '" onclick="return confirm(\'¿Estás seguro de que desea elimar esta máquina?\');"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ED3636" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1z"/>
          </svg></a></div></td>';
        echo '</tr>';
    }
}

// Cerrar la conexión
$conexion->close();
?>
