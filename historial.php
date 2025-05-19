<?php
include 'modelo/conexion.php';
include 'modelo/historial_modelo.php';

$modelo = new HistorialModelo($conexion);
$datos = $modelo->obtenerHistorial();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Historial de Reservas</title>
  <link rel="icon" href="./vista/img/icono.ico">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <style>
    * {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .body {
      overflow-y: hidden;
    }

    h1 {
      text-align: center;
      margin-top: 30px;
      font-size: 32px;
      color: #111821;
    }

    .table-responsive {
      max-height: 300px;
      overflow-y: auto;
      border: 1px solid #ccc;
      margin: 30px auto;
      width: 80%;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead th {
      position: sticky;
      top: 0;
      background-color: #f5f5f5;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
    }

    select {
      padding: 5px;
    }

    .btn-guardar {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      background-color: #505D89;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
    }

    .mensaje {
      text-align: center;
      color: green;
      font-weight: bold;
      margin-top: 20px;
    }

    /* Otras clases reutilizables */
    .container {
      display: flex;
      align-items: flex-start;
      margin-top: 0;
      gap: 80px;
    }

    .right-side {
      width: 100%;
    }
  </style>
</head>
<body>

  <h1>Historial de Reservas</h1>

  <?php if (isset($_GET['guardado'])): ?>
    <div class="mensaje">✔ Estados actualizados correctamente.</div>
  <?php endif; ?>

  <form method="POST" action="controlador/actualizar_estado_controlador.php">
    <div class="table-responsive">
      <table>
        <thead>
          <tr>
            <th>Tipo de Servicio</th>
            <th>Usuario</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($fila = $datos->fetch_assoc()): ?>
            <tr>
              <td><?php echo htmlspecialchars($fila['tipo_servicio']); ?></td>
              <td><?php echo htmlspecialchars($fila['usuario']); ?></td>
              <td>
                <select name="estado[<?php echo $fila['id_historial']; ?>]">
                  <option value="Pendiente" <?php if ($fila['estado'] == 'Pendiente') echo 'selected'; ?>>Pendiente</option>
                  <option value="Confirmado" <?php if ($fila['estado'] == 'Confirmado') echo 'selected'; ?>>Confirmado</option>
                  <option value="Cancelado" <?php if ($fila['estado'] == 'Cancelado') echo 'selected'; ?>>Cancelado</option>
                </select>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>

    <button type="submit" class="btn-guardar">Guardar Cambios</button>
  </form>
  <script>
  // Espera 3 segundos (3000 milisegundos) y luego oculta el mensaje
  setTimeout(() => {
    const mensaje = document.querySelector('.mensaje');
    if (mensaje) {
      mensaje.style.display = 'none';
    }
  }, 3000); // 3000 ms = 3 segundos
</script>

</body>
</html>
