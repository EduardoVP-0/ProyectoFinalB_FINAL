<?php
require_once 'conexion.php';

class RegistroModelo {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }
    public function correoExistente($correo) {
    $sql = "SELECT id_agente FROM agente_viaje2 WHERE correo = ?";
    $stmt = $this->conexion->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    return $stmt->num_rows > 0; // true si ya existe
}
    public function registrarAgente($usuario, $correo, $foto, $password) {
        $stmt = $this->conexion->prepare("INSERT INTO agente_viaje2 (usuario, correo, foto, contraseña) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $usuario, $correo, $foto, $password);
        return $stmt->execute();
    }
}
?>
