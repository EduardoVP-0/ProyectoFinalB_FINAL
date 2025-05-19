<?php
include 'Logueado.php'
?>
<!DOCTYPE html>
<html>
<head>
    <title>Menú Principal</title>
</head>
<body>
    <h2>Bienvenido: <?php echo $_SESSION['usuario']; ?></h2>
    
    <!-- Resto de tu contenido HTML -->
    
    <a href="controlador/cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>