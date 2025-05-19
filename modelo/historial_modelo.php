<?php
require_once 'conexion.php';
class HistorialModelo {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerHistorial() {
        $sql = "SELECT id_historial, tipo_servicio, usuario, estado FROM historial";
        $resultado = $this->conexion->query($sql);
        return $resultado;
    }

    public function actualizarEstado($id, $nuevoEstado) {
        $sql = "UPDATE historial SET estado = ? WHERE id_historial = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("si", $nuevoEstado, $id);
        return $stmt->execute();
    }
}
?>
