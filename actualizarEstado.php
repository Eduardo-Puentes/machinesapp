<?php
include 'db_connection.php';

// Check if matricula is set in the URL query parameters
if (isset($_GET['matricula']) && !empty($_GET['matricula'])) {
    // Sanitize the input to prevent SQL injection
    $matricula = mysqli_real_escape_string($conexion, $_GET['matricula']);
    
    // Retrieve the estado of the user
    $sql_estado = "SELECT estado FROM usuario WHERE matricula = '$matricula'";
    $resultado_estado = $conexion->query($sql_estado);
    
    if ($resultado_estado->num_rows > 0) {
        $fila_estado = $resultado_estado->fetch_assoc();
        // Toggle the estado value
        $new_estado = $fila_estado['estado'] == 0 ? 1 : 0;
        
        // Update the estado field for the user
        $sql = "UPDATE usuario SET estado = $new_estado WHERE matricula = '$matricula'";
        
        if ($conexion->query($sql) === TRUE) {
            header('Location: users.php');
            exit;
        } else {
            echo "Error al actualizar el estado: " . $conexion->error;
        }
    } else {
        echo "No se encontró el usuario con la matrícula proporcionada.";
    }
} else {
    echo "Matrícula no válida.";
}

// Cerrar la conexión
$conexion->close();
?>
