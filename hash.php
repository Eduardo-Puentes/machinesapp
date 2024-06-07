<?php
include 'db_connection.php';

$sql = "SELECT id, username, password FROM users";
$result = $conexion->query($sql);

// Loop through each user
while ($row = $result->fetch_assoc()) {
    $hashed_password = password_hash($row['password'], PASSWORD_DEFAULT);
    
    // Update the user's password with the hashed version
    $update_sql = "UPDATE users SET password = '$hashed_password' WHERE id = " . $row['id'];
    $conexion->query($update_sql);
}
?>