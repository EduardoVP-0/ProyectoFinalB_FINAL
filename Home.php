<?php
include 'logueado.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Home | Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: 'Poppins', sans-serif;
    }

    .background {
      background-image: url('./vista/img/fondoC.png'); 
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      position: relative;
      color: white;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px;
      background-color: rgba(0, 0, 0, 0);
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 10;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      height: 40px;
      margin-right: 10px;
    }

    .logo span {
      font-size: 1.5rem;
      font-weight: bold;
      color: white;
    }

    .menu {
      display: flex;
      gap: 30px;
      align-items: center;
    }

    .menu a {
  color: white;
  text-decoration: none;
  font-size: 14px;
  font-weight: 600;
  text-transform: uppercase;        
  letter-spacing: 2px;               
  text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
  transition: color 0.3s;
}

.menu a:hover {
  color:rgb(87, 83, 140);
}


    .logout-btn {
  background-color: transparent;
  border: 2px solid white;
  color: white;
  padding: 8px 16px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 600;
  text-transform: uppercase;         
  letter-spacing: 1.5px;            
  text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7); 
  transition: background 0.3s ease;
}


    .logout-btn:hover {
      background-color: white;
      color: #2c5364;
    }

    .content {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 0 20px;
      position: relative;
      z-index: 5;
    }

    .content h1 {
      font-size: 4rem;
      text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
    }

    .content p {
      font-size: 1.2rem;
      margin-top: 10px;
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
    }
  </style>
</head>
<body>

  <div class="background">
    <nav class="navbar">
      <div class="logo">
        <img src="./vista/img/logo.png" alt="Logo" />
      </div>
      <div class="menu">
        <a href="Servicios.php">Registro</a>
        <a href="historial.php">Reservaciones</a>
        <a href="Calificaciones.php">Calificaciones</a>
        <a href="grafica_operadoras.php">Estadísticas</a>
        <a href="Inicio.php" class="logout-btn">Salir</a>
      </div>
    </nav>

    <!-- CONTENIDO CENTRAL -->
    <div class="content">
      <h1>BIENVENIDO</h1>
      <p>Explora todo lo que esta aplicación tiene para ofrecerte.</p>
    </div>
  </div>

</body>
</html>
