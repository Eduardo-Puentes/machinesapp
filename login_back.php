<?php
session_start();
include 'db_connection.php';

// Obtener datos del formulario
$user = $_POST['user'];
$password_input = $_POST['password'];

// Prepare and bind the statement
$stmt = $conexion->prepare("SELECT id, username, password FROM users WHERE username = ?");
$stmt->bind_param("s", $user);

// Set parameters and execute
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // Obtener la fila del resultado
    $row = $result->fetch_assoc();
    // Verificar la contraseña
    if (password_verify($password_input, $row['password'])) {
        // Contraseña correcta, iniciar sesión
        $_SESSION["username"] = $user;
        
        // Regenerate session ID
        session_regenerate_id(true);
        
        // Redirigir al usuario a la página de usuarios
        header('Location: index.php');
        exit;
    } else {
        // Contraseña incorrecta
        echo htmlspecialchars("Invalid username or password.", ENT_QUOTES, 'UTF-8');
    }
} else {
    // Usuario no encontrado
    echo htmlspecialchars("Invalid username or password.", ENT_QUOTES, 'UTF-8');
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>
