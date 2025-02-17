<?php
include '../conexion.php'; // Asegúrate de que este archivo define la variable $conexion correctamente

// Configurar cabeceras para indicar que estamos enviando JSON
header('Content-Type: application/json');

// Obtener el cuerpo de la solicitud (en formato JSON)
$data = json_decode(file_get_contents("php://input"), true);

// Verificar que se haya recibido un ID
if (isset($data['id'])) {
    $id = $data['id'];

    // Verificar si la conexión fue exitosa
    if ($conexion->connect_error) {
        echo json_encode(["success" => false, "message" => "Error de conexión: " . $conexion->connect_error]);
        exit;
    }

    // Preparar la consulta para eliminar al usuario por ID
    $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
    
    if (!$stmt) {
        echo json_encode(["success" => false, "message" => "Error en la preparación de la consulta: " . $conexion->error]);
        exit;
    }

    $stmt->bind_param("i", $id);

    // Ejecutar la consulta y verificar si fue exitosa
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Usuario eliminado correctamente"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error al eliminar el usuario: " . $stmt->error]);
    }

    // Cerrar la conexión
    $stmt->close();
    $conexion->close();
} else {
    echo json_encode(["success" => false, "message" => "ID no proporcionado"]);
}
?>
