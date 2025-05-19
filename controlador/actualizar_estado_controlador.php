<?php
include '../modelo/conexion.php';
include '../modelo/historial_modelo.php';

$modelo = new HistorialModelo($conexion);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['estado'])) {
    foreach ($_POST['estado'] as $id => $nuevoEstado) {
        $modelo->actualizarEstado($id, $nuevoEstado);
    }
    header("Location: ../historial.php?guardado=1");
    exit;
}
?>
