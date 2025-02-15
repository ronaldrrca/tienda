<?php 
session_start();
header("Content-Type: applicarion/json");
require_once '../conexion.php';

if ($conexion->connect_error) {
    echo json_encode(["status" => "error", "message" => "Error de conexión a la base de datos"]);
    exit;
}
?>