<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include '../modelo/conexion.php';

$email = $_POST['email'];
$pass = $_POST['pass'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Consulta segura con prepared statements
    $sql = "SELECT id_agente, usuario FROM agente_viaje2 WHERE correo = ? AND contraseña = ?";

    $stmt = $conexion->prepare($sql);
    
    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . $conexion->error);
    }
    
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['usuario'] = $row['usuario'];
    $_SESSION['id_agente'] = $row['id_agente']; // Guardar id_agente en sesión
    header("Location: ../ServicioA.php");
    exit();
    } else {
        header("Location: ../inicio.php?error=1");
        exit();
    }
} else {
    header("Location: ../inicio.php");
    exit();
}

?>