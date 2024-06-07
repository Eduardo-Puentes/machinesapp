<?php
include 'db_connection.php';

$limit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM logs INNER JOIN maquina ON logs.maquina_id = maquina.id ORDER BY logs.hora DESC LIMIT $limit OFFSET $offset;";
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

$sql_total = "SELECT COUNT(*) as total FROM logs";
$result_total = $conexion->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_pages = ceil($row_total['total'] / $limit);

echo '<div class="pagination">';
for ($i = 1; $i <= $total_pages; $i++) {
    if ($page == $i) {
        echo '<a style="margin-right: 20px; color: #0d6efd; text-decoration:none" href="?page=' . $i . '"> ' . $i . ' </a>';    
    }
    else {
        echo '<a style="margin-right: 20px; color: black; text-decoration:none" href="?page=' . $i . '"> ' . $i . ' </a>';
    }
    
}
echo '</div>';

$conexion->close();
?>
