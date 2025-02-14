<?php
session_start();
header("Content-Type: application/json");

// Configuración de conexión a la base de datos
$host = "localhost"; //Servidor 
$dbname = "tienda";
$username = "root";
$password = "";

// Conexión con MySQLi
$conexion = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    echo json_encode(["status" => "error", "message" => "Error de conexión a la base de datos"]);
    exit;
}

// Recibir datos del formulario
$email = trim($_POST["email"] ?? "");
$password = trim($_POST["password"] ?? "");

// Validar que no estén vacíos
if (empty($email) || empty($password)) {
    echo json_encode(["status" => "error", "message" => "Debe ingresar correo y contraseña"]);
    exit;
}

// Preparar la consulta
$sql = "SELECT id_cliente, nombre_cliente, password_cliente FROM clientes WHERE email_cliente = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if ($usuario && password_verify($password, $usuario["password_cliente"])) {
    // Iniciar sesión con los datos del usuario
    $_SESSION["id_cliente"] = $usuario["id_cliente"];
    $_SESSION["nombre_cliente"] = $usuario["nombre_cliente"];

    echo json_encode(["status" => "success", "message" => "Inicio de sesión exitoso"]);
} else {
    echo json_encode(["status" => "error", "message" => "Email y/o contraseña incorrectos"]);
}

// Cerrar conexión
$stmt->close();
$conexion->close();
?>
