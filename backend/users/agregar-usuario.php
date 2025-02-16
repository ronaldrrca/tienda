<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require '../conexion.php';

    $nombre_usuario = trim($_POST['nombre']);
    $usuario_usuario = trim($_POST['usuario']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    
    // Validar que las contraseñas coincidan
    if ($password !== $confirm_password) {
        die("Error: Las contraseñas no coinciden.");
    }

    // Encriptar la contraseña antes de guardarla
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios (nombre_usuario, usuario_usuario, password_usuario) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("sss", $nombre_usuario, $usuario_usuario, $password_hash);

    if ($stmt->execute()) {
        echo "Usuario registrado correctamente.";
    } else {
        echo "Error al registrar usuario.";
    }

    $stmt->close();
    $conexion->close();
}

?>
