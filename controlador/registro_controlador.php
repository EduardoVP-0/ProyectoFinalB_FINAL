<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include '../modelo/conexion.php';
include '../modelo/registro_modelo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Procesar imagen
    $fotoNombre = $_FILES['foto']['name'];
    $fotoTmp = $_FILES['foto']['tmp_name'];
    $rutaDestino = "../vista/img/fotos_perfil/" . basename($fotoNombre);

    // Validar que se suba la imagen correctamente
    if (move_uploaded_file($fotoTmp, $rutaDestino)) {
        $modelo = new RegistroModelo($conexion);
        if ($modelo->correoExistente($correo)) {
            header("Location: ../Registro.php?error=correo");
            exit;
        } else {
            $registroExitoso = $modelo->registrarAgente($usuario, $correo, $fotoNombre, $password);

            if ($registroExitoso) {
                $_SESSION['usuario'] = $usuario;
                header("Location: ../Inicio.php");
            } else {
                echo "Error al registrar usuario en la base de datos.";
            }
        }
    } else {
        echo "❌ Error al subir la imagen.";
    }
} else {
    echo "❌ Acceso no permitido.";
}
