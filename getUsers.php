

<?php
include 'db_connection.php';

// Consulta para obtener todas las máquinas
$sql1 = "SELECT COUNT(*) as 'users' FROM usuario;";
$usersCount = $conexion->query($sql1);

while ($row = $usersCount->fetch_assoc()) {
    echo $row["users"];
}

// Cerrar la conexión
$conexion->close();
?>
