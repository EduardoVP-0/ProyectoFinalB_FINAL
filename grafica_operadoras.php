<?php
include 'modelo/conexion.php';

// --- Obtener porcentajes por operadora ---
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

// --- Total de reservaciones ---
$sql_total_reservas = "SELECT COUNT(*) AS total FROM reservaciones2";
$result_total_reservas = $conexion->query($sql_total_reservas);
$total_reservas = $result_total_reservas->fetch_assoc()['total'];

// --- Promedio de calificaciones ---
$sql_promedio = "SELECT AVG(calificacion) AS promedio FROM calificaciones";
$result_promedio = $conexion->query($sql_promedio);
$promedio_calificaciones = round($result_promedio->fetch_assoc()['promedio'], 2);

// --- Ingresos generados ---
$sql_ingresos = "SELECT SUM(precio_paquete) AS total_ingresos FROM reservas_pv";
$result_ingresos = $conexion->query($sql_ingresos);
$total_ingresos = number_format($result_ingresos->fetch_assoc()['total_ingresos'], 2);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>Dashboard Profesional - Ventas por Operadora</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #F5F7FA 0%, #C3CBD9 100%);
      color: #2E3A59;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 50px 20px;
    }

    .dashboard {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 15px 30px rgba(46, 58, 89, 0.1);
      width: 100%;
      max-width: 1100px;
      display: grid;
      grid-template-columns: 2.5fr 1fr;
      gap: 50px;
      padding: 40px 50px;
      transition: box-shadow 0.3s ease;
    }

    .dashboard:hover {
      box-shadow: 0 25px 45px rgba(46, 58, 89, 0.15);
    }

    @media (max-width: 900px) {
      .dashboard {
        grid-template-columns: 1fr;
        padding: 30px 30px;
        gap: 40px;
      }
    }

    h2 {
      font-weight: 700;
      font-size: 2.4rem;
      color: #1F2937;
      margin-bottom: 35px;
      letter-spacing: 0.03em;
      border-bottom: 3px solid #4F46E5; /* Accent color */
      padding-bottom: 10px;
      max-width: max-content;
      user-select: none;
    }

    canvas {
      max-width: 100%;
      height: 320px !important;
    }

    .info-list {
      display: flex;
      flex-direction: column;
      gap: 28px;
      justify-content: center;
      padding-left: 15px;
    }

    .info-item {
      background: #F9FAFB;
      border-left: 5px solid #4F46E5;
      padding: 18px 25px;
      font-weight: 600;
      font-size: 1.2rem;
      color: #374151;
      border-radius: 10px;
      box-shadow: 0 6px 10px rgba(79, 70, 229, 0.1);
      transition: background 0.25s ease, box-shadow 0.25s ease;
      cursor: default;
      user-select: none;
    }

    .info-item:hover {
      background: #EEF2FF;
      box-shadow: 0 12px 20px rgba(79, 70, 229, 0.2);
      color: #4338CA;
    }

    .info-item span {
      float: right;
      font-weight: 700;
      color: #4F46E5;
      user-select: text;
    }
  </style>
</head>

<body>

  <main class="dashboard" role="main" aria-label="Dashboard de ventas por operadora">
    <section>
      <h2>Ventas por Operadora</h2>
      <canvas id="graficaOperadoras" role="img" aria-label="Gráfica de barras de porcentaje de ventas por operadora"></canvas>
    </section>

    <aside class="info-list" aria-live="polite" aria-atomic="true">
      <div class="info-item" tabindex="0">Total de Reservaciones: <span><?php echo $total_reservas; ?></span></div>
      <div class="info-item" tabindex="0">Promedio General de Calificaciones: <span><?php echo $promedio_calificaciones; ?> / 5</span></div>
      <div class="info-item" tabindex="0">Ingresos Generados: <span>$ <?php echo $total_ingresos; ?></span></div>
    </aside>
  </main>

  <script>
    const ctx = document.getElementById('graficaOperadoras').getContext('2d');
    const data = {
      labels: <?php echo json_encode(array_keys($porcentajes)); ?>,
      datasets: [{
        label: 'Porcentaje de Ventas (%)',
        data: <?php echo json_encode(array_values($porcentajes)); ?>,
        backgroundColor: [
          '#4F46E5', '#6366F1', '#A5B4FC', '#818CF8', '#4338CA', '#6B21A8'
        ],
        borderRadius: 6,
        borderSkipped: false,
        barPercentage: 0.7,
        categoryPercentage: 0.6,
      }]
    };

    const config = {
      type: 'bar',
      data: data,
      options: {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
          duration: 1200,
          easing: 'easeOutQuart',
        },
        plugins: {
          legend: { display: false },
          tooltip: {
            backgroundColor: '#4F46E5',
            titleColor: '#EDE9FE',
            bodyColor: '#E0E7FF',
            padding: 12,
            cornerRadius: 6,
            callbacks: {
              label: ctx => `${ctx.parsed.y}%`
            }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            max: 100,
            ticks: {
              color: '#4B5563',
              font: { weight: '600', size: 13 },
              callback: val => `${val}%`
            },
            grid: {
              color: '#E0E7FF',
              borderDash: [4, 6],
            }
          },
          x: {
            ticks: {
              color: '#374151',
              font: { weight: '600', size: 14 },
            },
            grid: { display: false }
          }
        }
      }
    };

    new Chart(ctx, config);
  </script>

</body>

</html>
