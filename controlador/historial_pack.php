<?php
include "../modelo/conexion.php";

// Obtener el valor de la fecha desde el formulario
$fecha = $_POST['fecha'] ?? '';  // Usamos el operador de fusión de null para manejar el caso de fecha vacía

// Sanitizar el valor de la fecha para evitar inyecciones SQL
$fecha = $conexion->real_escape_string($fecha);

// Si la fecha está vacía, no filtramos por fecha
if ($fecha === '') {
    $sqlQuery =
    "
        SELECT 
            reservas_pv.fecha_reserva,
            reservas_pv.estado_reserva,
            reservas_pv.lugar_salida,
            reservas_pv.hora_salida,
            reservas_pv.fecha_salida,
            reservas_pv.precio_paquete,
            paquetes2.nombre AS nombre_paquete
        FROM
            reservas_pv
        INNER JOIN
            paquetes2 ON reservas_pv.id_paquete = paquetes2.id_paquete";
} else {
    // Si hay una fecha, filtramos por ella
    $sqlQuery = "
        SELECT 
            reservas_pv.fecha_reserva,
            reservas_pv.estado_reserva,
            reservas_pv.lugar_salida,
            reservas_pv.hora_salida,
            reservas_pv.fecha_salida,
            reservas_pv.precio_paquete,
            paquetes2.nombre AS nombre_paquete
        FROM
            reservas_pv
        INNER JOIN
            paquetes2 ON reservas_pv.id_paquete = paquetes2.id_paquete
        WHERE DATE(reservas_pv.fecha_reserva) = '$fecha'"; // Usar DATE() para comparar solo la fecha sin tiempo
}

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {
    while ($datos = $sql->fetch_object()) {
        // Asignar el número de autobús según el lugar de salida
        $numero_vuelo = "";
        if ($datos->lugar_salida == "Guadalajara") {
            $numero_vuelo = "CV-101";
        } elseif ($datos->lugar_salida == "Monterrey") {
            $numero_vuelo = "CV-102";
        } elseif ($datos->lugar_salida == "Tijuana") {
            $numero_vuelo = "CV-103";
        } else {
            $numero_vuelo = "N/A"; // En caso de que no sea ninguno de los anterioress
        }
    ?>
        <tr>
            <th scope="row" class="text-center"><?= $datos->fecha_reserva ?></th>
            <td class="text-center"><?= $datos->nombre_paquete ?></td>
            <td class="text-center"><?= $numero_vuelo ?></td>
            <td class="text-center"><?= $datos->lugar_salida ?></td>
            <td class="text-center"><?= $datos->fecha_salida ?></td>
            <td class="text-center"><?= $datos->hora_salida ?></td>
            <td class="text-center"><?= "$" . number_format($datos->precio_excursion, 2) ?></td>
            <td class="text-center"><?= $datos->estado_reserva ?></td>
        </tr>
    <?php }
} else {
    echo "<tr><td colspan='6' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();


?>
