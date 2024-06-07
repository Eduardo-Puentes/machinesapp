<?php
include 'db_connection.php';

$monthlyCounts = array();

for ($i = 0; $i < 6; $i++) {
    $startDate = date('Y-m-01 00:00:00', strtotime("-$i month"));
    $endDate = date('Y-m-t 23:59:59', strtotime("-$i month"));

    $sql = "SELECT COUNT(*) as 'usos' FROM logs WHERE hora >= '$startDate' AND hora <= '$endDate';";
    $result = $conexion->query($sql);

    $row = $result->fetch_assoc();
    $monthlyCounts[] = [strtotime($endDate)*1000 , (int)$row['usos']];
}


$conexion->close();

header('Content-Type: application/json');

echo json_encode($monthlyCounts);
?>
