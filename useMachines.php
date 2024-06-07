

<?php
include 'db_connection.php';

// Consulta para obtener todas las máquinas
$sql1 = "SELECT COUNT(*) as 'miniom' FROM maquina;";
$sql2 = "SELECT COUNT(*) as 'miniom2' FROM maquina WHERE availability = 0;";
$total = $conexion->query($sql1);
$active = $conexion->query($sql2);

while ($row = $active->fetch_assoc()) {
    echo $row["miniom2"] . '/';
}

while ($row = $total->fetch_assoc()) {
    echo $row["miniom"]."<br>";
}

// Cerrar la conexión
$conexion->close();
?>
