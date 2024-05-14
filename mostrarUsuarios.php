

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
$sql = "SELECT * FROM usuario";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['matricula'] . '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['nombre'] . '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['fecha_inscripcion'] . '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['carrera'] . '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: start; flex-direction: column; height: 70px;">' . $fila['activaciones'] . '</div></td>';
        echo '<td> <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; height: 70px;"><a href="borrar.php?matricula=' . $fila['matricula'] . '" onclick="return confirm(\'¿Estás seguro de que desea elimar al usuario?\');"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ED3636" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1z"/>
      </svg></a></div></td>';
        echo '</tr>';
    }
}

// Cerrar la conexión
$conexion->close();
?>
