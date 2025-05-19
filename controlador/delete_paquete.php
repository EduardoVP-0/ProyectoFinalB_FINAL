<?php
header('Content-Type: application/json');
include '../modelo/conexion.php'; // Ajusta la ruta a tu archivo de conexión

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Método no permitido']);
    exit;
}

if (!isset($_POST['id_paquete']) || empty($_POST['id_paquete'])) {
    echo json_encode(['success' => false, 'error' => 'ID no proporcionado']);
    exit;
}

$id_paquete = mysqli_real_escape_string($conexion, $_POST['id_paquete']);

$query = "DELETE FROM paquetes WHERE id_paquete = '$id_paquete'";
$result = mysqli_query($conexion, $query);

if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Error al eliminar: ' . mysqli_error($conexion)]);
}

mysqli_close($conexion);
