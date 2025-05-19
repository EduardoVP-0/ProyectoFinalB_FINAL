<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario']) || !isset($_SESSION['id_agente'])) {
    header("Location: inicio.php");
    exit();
}
$id_agente = $_SESSION['id_agente'];
?>
