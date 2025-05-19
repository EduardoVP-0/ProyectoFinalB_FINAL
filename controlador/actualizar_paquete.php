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

// Verificar que se recibió el id_paquete
if (!isset($_POST['id_paquete'])) {
    echo "<h2>Error:</h2><p>No se especificó el paquete a editar.</p>";
    echo "<a href='../gestion_paquetes.php'>Volver</a>";
    exit();
}

$id_paquete = (int)$_POST['id_paquete'];
$id_agente = $_SESSION['id_agente'];
$imagen_actual = $_POST['imagen_actual'] ?? null;

// Procesar la nueva imagen si se subió
$rutaImg = $imagen_actual; // Por defecto mantener la imagen actual

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $imagen = $_FILES['foto'];
    $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
    $nombreUnico = uniqid() . '.' . $extension;
    $rutaImg = 'vista/paquetes/' . $nombreUnico;

    // Mover la nueva imagen
    if (!move_uploaded_file($imagen['tmp_name'], '../' . $rutaImg)) {
        echo "<h2>Error al subir la imagen</h2>";
        echo "<a href='../editar_paquete.php?id_paquete=$id_paquete'>Volver</a>";
        exit();
    }
    
    // Eliminar la imagen anterior si existe
    if (!empty($imagen_actual)) {
        $ruta_anterior = '../' . $imagen_actual;
        if (file_exists($ruta_anterior)) {
            unlink($ruta_anterior);
        }
    }
}

// Recoger y limpiar datos del formulario
$Nombre = $conexion->real_escape_string($_POST['nombre']);
$Destino = $conexion->real_escape_string($_POST['destino']);
$Precio = (int)$_POST['precio'];
$Duracion = $conexion->real_escape_string($_POST['duracion']);
$Descripcion = $conexion->real_escape_string($_POST['descripcion']);

// Procesar fecha_creacion
$FechaRaw = $_POST['fecha_creacion'] ?? null;
$Fecha = null;
if (!empty($FechaRaw)) {
    $timestamp = strtotime($FechaRaw);
    if ($timestamp !== false) {
        $Fecha = date('Y-m-d H:i:s', $timestamp);
    } else {
        echo "<h2>❌ Error: Fecha de creación inválida</h2>";
        echo "<a href='../editar_paquete.php?id_paquete=$id_paquete'>Volver</a>";
        exit();
    }
} else {
    // Si no se envía fecha, mantener la fecha actual del registro
    $sql_fecha = "SELECT fecha_creacion FROM paquetes WHERE id_paquete = ?";
    $stmt_fecha = $conexion->prepare($sql_fecha);
    $stmt_fecha->bind_param("i", $id_paquete);
    $stmt_fecha->execute();
    $resultado = $stmt_fecha->get_result();
    $fila = $resultado->fetch_assoc();
    $Fecha = $fila['fecha_creacion'];
    $stmt_fecha->close();
}

// Preparar consulta UPDATE
$sql = "UPDATE paquetes SET 
        Foto = ?, 
        nombre = ?, 
        destino = ?, 
        Precio = ?, 
        Duracion = ?, 
        fecha_creacion = ?, 
        descripcion = ? 
        WHERE id_paquete = ? AND id_agente = ?";

$stmt = $conexion->prepare($sql);
if ($stmt === false) {
    die("Error en prepare: " . $conexion->error);
}

$stmt->bind_param("sssisssii", $rutaImg, $Nombre, $Destino, $Precio, $Duracion, $Fecha, $Descripcion, $id_paquete, $id_agente);

// Ejecutar y verificar resultado
if ($stmt->execute()) {
    header("Location: ../ServicioA.php");
} else {
    header("Location: ../ServicioA.php");
}

$stmt->close();
$conexion->close();
?>