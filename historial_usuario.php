<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chiapas Viajero | Magia y Tradición</title>
    <link rel="icon" type="image/ico" href="vista/IMG_usuario/Icono.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <link rel="stylesheet" href="vista/CSS/history.css?version=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <!-- Encabezado -->
    <header class="header">
        <nav class="navbar">
            <div class="navbar-links">
                <a href="servicios.php">SERVICIOS</a>
                <a href="historial.php">HISTORIAL</a>
                <img src="./vista/IMG_usuario/LogoA.png" alt="Logo" class="logo">
                <a href="notificaciones.php">MENSAJERÍA</a>
                <a href="nosotros.php">NOSOTROS</a>
            </div>
            <a class="op-home" href="home.php">
                <img src="vista/IMG_usuario/home.png" alt="Home" class="home-icon" />
            </a>
        </nav>

        <img src="vista/IMG_usuario/extra/BannerA.png" alt="Banner" class="banner">

        <p class="tema">HISTORIAL</p>
        <p class="subtema">ESTADO DE LAS RESERVACIONES</p>
    </header>

    <main><br><br>
        <section class="menu-tags">
            <div class="tags">
                <p data-target="#paquetes" class="tag-item active">PAQUETES TURÍSTICOS</p>
                
            </div>

            <!-- TABLA DE RESERVACIONES DE PAQUETES -->
            <div data-content id="paquetes">

                <div class="boton d-flex justify-content-between mb-1">
                    <div class="d-flex">

                    </div>
                    <div class="fixed-buttons">
                        <form id="searchFormpack" class="mb-3" method="POST" action="controlador/historial_pack.php">
                            <div class="input-group">
                                <input type="date" class="form-control" name="fecha">
                                <button type="submit" class="botone">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <!-- Celdas de una sola fila -->
                                <th rowspan="2" class="text-center encabezado">Fecha de Reserva</th>
                                <th rowspan="2" class="text-center encabezado">Paquete Reservado</th>
                                <th rowspan="2" class="text-center encabezado">Número de Vuelo</th>
                                <!-- "Salida" ocupa tres columnas -->
                                <th colspan="3" class="text-center encabezado">Salida</th>
                                <!-- "Costo" y "Estado" también están en la misma fila -->
                                <th rowspan="2" class="text-center encabezado"> Costo</th>
                                <th rowspan="2" class="text-center encabezado">Estado</th>
                            </tr>
                            <tr>
                                <!-- Subcolumnas bajo "Salida" -->
                                <th class="text-center encabezado">Lugar</th>
                                <th class="text-center encabezado">Fecha</th>
                                <th class="text-center encabezado">Hora</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php
                            include "modelo/conexion.php";

                            $sql = $conexion->query("
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
                            ");

                            while ($datos = $sql->fetch_object()) {
                                // Asignar el número de autobús según la ubicación de la excursión
                                $numero_vuelo = "";
                                if ($datos->lugar_salida == "Guadalajara") {
                                    $numero_vuelo = "CV-101";
                                } elseif ($datos->lugar_salida == "Monterrey") {
                                    $numero_vuelo = "CV-102";
                                } elseif ($datos->lugar_salida == "Tijuana") {
                                    $numero_vuelo = "CV-103";
                                } else {
                                    $numero_vuelo = "N/A"; // En caso de que no sea ninguno de los anteriores
                                }
                            ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $datos->fecha_reserva ?></th>
                                    <td class="text-center"><?= $datos->nombre_paquete ?></td>
                                    <td class="text-center"><?= $numero_vuelo ?></td>
                                    <td class="text-center"><?= $datos->lugar_salida ?></td>
                                    <td class="text-center"><?= $datos->fecha_salida ?></td>
                                    <td class="text-center"><?= $datos->hora_salida ?></td>
                                    <td class="text-center"><?= "$" . number_format($datos->precio_paquete, 2) ?></td>
                                    <td class="text-center"><?= $datos->estado_reserva ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

            

            

            

        </section>
    </main>

    <!-- Pie de Página -->
    <footer>
        <div class="footer-container">
            <div class="logo">
                <img src="./vista/IMG_usuario/LogoA.png" alt="Logo - Chiapas Viajero">
            </div>
            <div class="social-media">
                <ul>
                    <li><a href="https://www.facebook.com/profile.php?id=61568118653813"><img
                                src="./vista/IMG_usuario/footer/Facebook.png"
                                alt="Facebook"></a></li>
                    <li><a href="https://pin.it/1l7vS9F3l"><img src="./vista/IMG_usuario/footer/Pinterest.png"
                                alt="Pinterest"></a></li>
                    <li><a href="https://www.instagram.com/mxchiapasviajero/"><img
                                src="./vista/IMG_usuario/footer/Instagram.png" alt="Instagram"></a></li>
                    <li><a href="https://www.tiktok.com/@chiapasviajero"><img
                                src="./vista/IMG_usuario/footer/TikTok.png" alt="TikTok"></a></li>
                </ul>
            </div>
        </div><br>
        <div class="footer-menu">
            <ul>
                <li><a href="./terminos.php"><span>Términos y Condiciones</span></a></li>
                <li><a href="./politicas.php"><span>Política de Privacidad</span></a></li>
                <li><a href="#"><span>Manual de Usuario</span></a></li>
                <li><a href="#"><span>Testimonios de Clientes</span></a></li>
            </ul>
        </div>
    </footer>

    <script src="vista/JS/bar.js"></script>
    <script src="vista/JS/reservas_tags.js"></script>
    <!-- PARA EL BUSCAODOR -->
    <script src="vista/JS/historial_Rcarro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>