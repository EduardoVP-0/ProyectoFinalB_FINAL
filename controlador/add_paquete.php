<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include '../modelo/conexion.php';

// Verifica si el usuario está logueado
if (!isset($_SESSION['id_agente'])) {
    echo "<h2>Error:</h2><p>Debe iniciar sesión primero.</p>";
    echo "<a href='../inicio.php'>Ir a inicio</a>";
    exit();
}

$rutaImg = null;
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $imagen = $_FILES['foto'];
    $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
    $nombreUnico = uniqid() . '.' . $extension;
    $rutaImg = 'vista/paquetes/' . $nombreUnico;

    if (!move_uploaded_file($imagen['tmp_name'], '../' . $rutaImg)) {
        echo "<h2>Error al subir la imagen</h2>";
        echo "<a href='../RegistroA.php'>Volver</a>";
        exit();
    }
}

// Recoger y limpiar datos del formulario
$Nombre = $conexion->real_escape_string($_POST['nombre']);
$Destino = $conexion->real_escape_string($_POST['destino']);
$Precio = (int)$_POST['precio'];
$Duracion = $conexion->real_escape_string($_POST['duracion']);
$Descripcion = $conexion->real_escape_string($_POST['descripcion']);
$id_agente = $_SESSION['id_agente'];

// Procesar fecha_creacion
$FechaRaw = $_POST['fecha_creacion'] ?? null;
$Fecha = null;
if (!empty($FechaRaw)) {
    $timestamp = strtotime($FechaRaw);
    if ($timestamp !== false) {
        $Fecha = date('Y-m-d H:i:s', $timestamp);
    } else {
        echo "<h2>❌ Error: Fecha de creación inválida</h2>";
        echo "<a href='../RegistroA.php'>Volver</a>";
        exit();
    }
} else {
    // Si no se envía fecha, asignar la fecha actual
    $Fecha = date('Y-m-d H:i:s');
}

// Preparar consulta según si hay imagen o no
if ($rutaImg !== null) {
    $sql = "INSERT INTO paquetes (id_agente, Foto, nombre, destino, Precio, Duracion, fecha_creacion, descripcion) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    if ($stmt === false) {
        die("Error en prepare: " . $conexion->error);
    }
    $stmt->bind_param("isssisss", $id_agente, $rutaImg, $Nombre, $Destino, $Precio, $Duracion, $Fecha, $Descripcion);
} else {
    $sql = "INSERT INTO paquetes (id_agente, nombre, destino, Precio, Duracion, fecha_creacion, descripcion) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    if ($stmt === false) {
        die("Error en prepare: " . $conexion->error);
    }
    $stmt->bind_param("isssiss", $id_agente, $Nombre, $Destino, $Precio, $Duracion, $Fecha, $Descripcion);
}

// Ejecutar y verificar resultado
if ($stmt->execute()) {
    echo "<h2>✅ Paquete registrado correctamente</h2>";
    echo "<a href='../RegistroA.php'>Volver</a>";
} else {
    echo "<h2>❌ Error al registrar paquete:</h2>";
    echo "<pre>" . $stmt->error . "</pre>";
    echo "<a href='../RegistroA.php'>Volver</a>";
}

$stmt->close();
$conexion->close();
?>
