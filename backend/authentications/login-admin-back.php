<?php
session_start();
require_once "../conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $password = trim($_POST["password"]);

    // Buscar en la tabla usuarios
    $stmt = $conexion->prepare("SELECT id_usuario, nombre_usuario, password_usuario, rol_usuario FROM usuarios WHERE usuario_usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $usuario = $resultado->fetch_assoc();
        
        // Verificar la contraseña
        if (password_verify($password, $usuario["password_usuario"])) {
            $_SESSION["id_usuario"] = $usuario["id_usuario"];
            $_SESSION["nombre_usuario"] = $usuario["nombre_usuario"];
            $_SESSION["rol_usuario"] = $usuario["rol_usuario"];
            header("Location: ../../admin-panel.php");
            exit();
        }
    }

    // Si falla el login
    header("Location: ../../admin-login.php");
    exit();
}
?>