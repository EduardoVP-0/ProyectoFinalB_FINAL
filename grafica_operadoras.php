<?php
include 'modelo/conexion.php';

// --- A) Obtener los porcentajes por operadora ---
$sql = "
    SELECT o.nombre_operadora, COUNT(*) as total
    FROM reservaciones2 r
    INNER JOIN operadora2 o ON r.IdOperadora = o.id
    GROUP BY r.IdOperadora, o.nombre_operadora
";
$result = $conexion->query($sql);

$datos = [];
$total_general = 0;

while ($row = $result->fetch_assoc()) {
    $datos[$row['nombre_operadora']] = $row['total'];
    $total_general += $row['total'];
}

$porcentajes = [];
foreach ($datos as $operadora => $cantidad) {
    $porcentajes[$operadora] = round(($cantidad / $total_general) * 100, 2);
}

// --- B) Total de reservaciones ---
$sql_total_reservas = "SELECT COUNT(*) AS total FROM reservaciones2";
$result_total_reservas = $conexion->query($sql_total_reservas);
$total_reservas = $result_total_reservas->fetch_assoc()['total'];

// --- C) Promedio de calificaciones ---
$sql_promedio = "SELECT AVG(calificacion) AS promedio FROM calificaciones";
$result_promedio = $conexion->query($sql_promedio);
$promedio_calificaciones = round($result_promedio->fetch_assoc()['promedio'], 2);

// --- D) Ingresos Generados (Suma total)
$sql_ingresos = "SELECT SUM(precio_paquete) AS total_ingresos FROM reservas_pv";
$result_ingresos = $conexion->query($sql_ingresos);
$total_ingresos = number_format($result_ingresos->fetch_assoc()['total_ingresos'], 2);

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gráfica de Ventas por Operadora</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      padding: 20px;
    }
    .contenedor {
      width: 80%;
      margin: auto;
    }
    h2, h3 {
      text-align: center;
    }
    .info-adicional {
      text-align: center;
      margin-top: 30px;
      font-size: 18px;
    }
  </style>
</head>
<body>

<div class="contenedor">
  <h2>Gráfica de Operadoras con más Ventas</h2>
  <canvas id="graficaOperadoras"  height="100"></canvas>

  <div class="info-adicional">
    <h3>Total de Reservaciones: <?php echo $total_reservas; ?></h3>
    <h3>Promedio General de Calificaciones: <?php echo $promedio_calificaciones; ?> / 5</h3>
    <h3>Ingresos Generados: $ <?php echo $total_ingresos; ?></h3>
  </div>
</div>

<script>
  const ctx = document.getElementById('graficaOperadoras').getContext('2d');

  const data = {
    labels: <?php echo json_encode(array_keys($porcentajes)); ?>,
    datasets: [{
      label: 'Porcentaje de Ventas (%)',
      data: <?php echo json_encode(array_values($porcentajes)); ?>,
      backgroundColor: [
        '#4CAF50', '#FFC107', '#F44336', '#2196F3', '#9C27B0', '#FF5722'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        tooltip: {
          callbacks: {
            label: function(context) {
              return context.parsed.y + '%';
            }
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          max: 100,
          ticks: {
            callback: function(value) {
              return value + '%';
            }
          }
        }
      }
    }
  };

  new Chart(ctx, config);
</script>

</body>
</html>
