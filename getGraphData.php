<?php
include 'db_connection.php';

// Array to store the counts for each month
$monthlyCounts = array();

// Loop to get counts for each of the past six months
for ($i = 0; $i < 6; $i++) {
    // Calculate the start and end dates for the current month
    $startDate = date('Y-m-01 00:00:00', strtotime("-$i month"));
    $endDate = date('Y-m-t 23:59:59', strtotime("-$i month"));

    // SQL query to get count of logs for the current month
    $sql = "SELECT COUNT(*) as 'usos' FROM logs WHERE hora >= '$startDate' AND hora <= '$endDate';";
    $result = $conexion->query($sql);

    // Fetch the count and store it in the monthlyCounts array
    $row = $result->fetch_assoc();
    $monthlyCounts[] = [strtotime($endDate)*1000 , (int)$row['usos']];
}


// Close the connection
$conexion->close();

// Set the content type to JSON
header('Content-Type: application/json');

// Output the JSON
echo json_encode($monthlyCounts);
?>
