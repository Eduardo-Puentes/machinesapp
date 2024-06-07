

<?php
include 'db_connection.php';

// Consulta para obtener todas las máquinas
$sql1 = "SELECT COUNT(*) as 'encendidos' FROM logs WHERE accion = 'encendido' AND hora >= DATE_SUB(NOW(), INTERVAL 1 WEEK);";
$usersCount = $conexion->query($sql1);

while ($row = $usersCount->fetch_assoc()) {
    echo $row["encendidos"];
}

// Cerrar la conexión
$conexion->close();
?>
