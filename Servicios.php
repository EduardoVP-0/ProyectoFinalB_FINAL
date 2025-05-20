<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menú</title>
    <link rel="icon" href="./vista/img/icono.ico">
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        background:
            linear-gradient(rgba(10, 20, 40, 0.5), rgba(10, 20, 40, 0.6)),
            url('./vista/img/fondoA.png') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        flex-direction: column; 
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
        color: #fff;
    }


    .titulo-principal {
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
        letter-spacing: 8px;
        font-size: 20px;
        text-align: center;
        margin-bottom: 40px;
        color: #ffffff;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
    }

    .menu-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        width: 100%;
        max-width: 1400px;
    }

    .menu-item {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        transition: transform 0.3s ease;
        flex: 1 1 calc(20% - 20px);
        height: 370px;
        cursor: pointer;
        box-shadow: none;
    }

    .menu-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
        display: block;
    }

    .menu-item:hover img {
        transform: scale(1.1);
    }

    .menu-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 10px;
        text-align: center;
        font-size: 16px;
        transition: background 0.3s ease;
    }

    .menu-item:hover .menu-overlay {
        background: rgba(0, 0, 0, 0.7);
    }
</style>

</head>
<body>
    <h1 class="titulo-principal">REGISTRO DE OFERTAS</h1>

    <div class="menu-container">
        <div class="menu-item">
            <a href="ServicioA.php">
                <img src="./vista/img/paquetes-turisticos.png" alt="Paquetes turísticos">
            </a>
        </div>
        <div class="menu-item">
            <a href="#">
                <img src="./vista/img/excursiones.png" alt="Excursiones">
            </a>
        </div>
        <div class="menu-item">
            <a href="#">
                <img src="./vista/img/hospedaje.png" alt="Hospedaje">
            </a>
        </div>
        <div class="menu-item">
            <a href="#">
                <img src="./vista/img/reserva-vuelos.png" alt="Reserva de vuelos">
            </a>
        </div>
        <div class="menu-item">
            <a href="#">
                <img src="./vista/img/renta-carros.png" alt="Renta de carros">
            </a>
        </div>
    </div>
</body>
</html>
