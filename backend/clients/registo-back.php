<?php
session_start();
require_once "..//conexion.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $telefono = trim($_POST["telefono"]);
    $direccion = trim($_POST["direccion"]);
    $password = trim($_POST["password"]);

    // Validar que los campos no estén vacíos
    if (empty($nombre) || empty($email) || empty($telefono) || empty($direccion) || empty($password)) {
        $_SESSION["error"] = "Todos los campos son obligatorios.";
        header("Location: formulario_cliente.php");
        exit();
    }

    // Verificar si el email ya está registrado
    $stmt = $conexion->prepare("SELECT id_cliente FROM clientes WHERE email_cliente = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $_SESSION["error"] = "El correo ya está registrado.";
        header("Location: formulario_cliente.php");
        exit();
    }
    $stmt->close();

    // Hashear la contraseña antes de guardarla
    $passwordHasheada = password_hash($password, PASSWORD_DEFAULT);

    // Insertar el cliente en la base de datos
    $stmt = $conexion->prepare("CALL registrarCliente(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $email, $telefono, $direccion, $passwordHasheada);

    if ($stmt->execute()) {
        $_SESSION["mensaje"] = "Cliente registrado con éxito.";
        header("Location: ../../login-cliente.js.php");
    } else {
        $_SESSION["error"] = "Hubo un error al registrar el cliente.";
        header("Location: formulario_cliente.php");
    }

    $stmt->close();
    $conexion->close();
}
?>