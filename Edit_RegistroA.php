<?php
include 'logueado.php';
include './modelo/conexion.php';

if (isset($_GET['id_paquete'])) {
    $id_paquete = $_GET['id_paquete'];
    
    $stmt = $conexion->prepare("SELECT * FROM paquetes WHERE id_paquete = ?");
    $stmt->bind_param("i", $id_paquete);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        $paquete = $resultado->fetch_assoc();
        $fecha_creacion = date('Y-m-d\TH:i', strtotime($paquete['fecha_creacion']));
        
        // Obtener la imagen del paquete
        $ruta_imagen = $paquete['Foto'];
        $mostrar_imagen = (!empty($ruta_imagen) && file_exists($ruta_imagen)) ? $ruta_imagen : false;
    } else {
        header("Location: gestion_paquetes.php");
        exit();
    }
} else {
    header("Location: gestion_paquetes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Paquete Turístico</title>
  <link rel="icon" href="./vista/img/icono.ico">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #F2F5F9;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .form-container {
      background: #FFF;
      padding: 20px 30px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 900px;
    }

    h2 {
      text-align: center;
      color: #4B5881;
      margin-bottom: 20px;
      font-size: 20px;
    }

    form {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 15px 20px;
      font-size: 13px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    .form-group-full {
      grid-column: span 2;
    }

    .image-description-container {
      display: flex;
      gap: 20px;
      grid-column: span 2;
      align-items: flex-start;
    }

    .left-column {
      display: flex;
      flex-direction: column;
      gap: 15px;
      width: 100%; 
    }

    label {
      margin-bottom: 5px;
      font-weight: 600;
      color: #505D89;
      font-size: 13px;
    }

    input[type="text"],
    input[type="datetime-local"],
    textarea,
    input[type="file"] {
      padding: 8px 10px;
      border: 1px solid #CCC;
      border-radius: 6px;
      font-size: 13px;
      box-sizing: border-box;
      resize: vertical;
    }

    textarea {
      height: 80px;
    }

    .image-upload-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%; 
    }

    .image-preview {
      width: 120px;
      height: 120px;
      border-radius: 10px;
      border: 2px solid #CCC;
      background-color: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 8px;
      overflow: hidden;
    }

    .image-preview img {
      max-width: 100%;
      max-height: 100%;
    }

    input[type="file"] {
      width: 100%; 
    }

    button {
      grid-column: span 2;
      background: linear-gradient(to right, #505D89, #707EAC);
      color: white;
      padding: 10px;
      font-size: 13px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background: linear-gradient(to right, #4B5881, #505D89);
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Editar Paquete Turístico</h2>
    
    <h2>Bienvenido: <?php echo $_SESSION['usuario']; ?></h2>

    <form action="./controlador/actualizar_paquete.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id_paquete" value="<?php echo $paquete['id_paquete']; ?>">
      <input type="hidden" name="id_agente" value="<?php echo $_SESSION['id_agente']; ?>"> 
      <input type="hidden" name="imagen_actual" value="<?php echo $paquete['Foto']; ?>">
      
      <div class="image-description-container">
        <div class="image-upload-container">
          <label for="foto">Imagen del Paquete</label>
          <input type="file" id="foto" name="foto" accept="image/*" onchange="previewImage(event)">
          <div class="image-preview" id="imagePreview">
            <?php if($mostrar_imagen): ?>
              <img src="<?php echo $mostrar_imagen; ?>" alt="Imagen del paquete">
            <?php else: ?>
              <span>No hay imagen disponible</span>
            <?php endif; ?>
          </div>
        </div>

        <div class="left-column">
          <div class="form-group">
            <label for="fecha_creacion">Fecha de Creación</label>
            <input type="datetime-local" id="fecha_creacion" name="fecha_creacion" 
                   value="<?php echo $fecha_creacion; ?>" required>
          </div>

          <div class="form-group">
            <label for="nombre">Nombre del Paquete</label>
            <input type="text" id="nombre" name="nombre" 
                   value="<?php echo htmlspecialchars($paquete['nombre']); ?>" required>
          </div>

          <div class="form-group">
            <label for="destino">Destino</label>
            <input type="text" id="destino" name="destino" 
                   value="<?php echo htmlspecialchars($paquete['destino']); ?>" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="precio">Precio (aproximado)</label>
        <input type="text" id="precio" name="precio" value="<?php echo $paquete['Precio']; ?>" required>
      </div>
      
      <div class="form-group">
        <label for="duracion">Duración</label>
        <input type="text" id="duracion" name="duracion" 
               value="<?php echo htmlspecialchars($paquete['Duracion']); ?>" required>
      </div>

      <div class="form-group form-group-full">
        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" maxlength="100" required><?php 
            echo htmlspecialchars($paquete['descripcion']); 
        ?></textarea>
      </div>

      <button type="submit">Actualizar Paquete</button>
    </form>
  </div>

  <script>
    function previewImage(event) {
      const preview = document.getElementById('imagePreview');
      const file = event.target.files[0];

      if (file) {
        const reader = new FileReader();
        reader.onload = function() {
          preview.innerHTML = '<img src="' + reader.result + '" alt="Vista previa">';
        };
        reader.readAsDataURL(file);
      } else {
        <?php if($mostrar_imagen): ?>
          preview.innerHTML = '<img src="<?php echo $mostrar_imagen; ?>" alt="Imagen actual">';
        <?php else: ?>
          preview.innerHTML = '<span>No hay imagen disponible</span>';
        <?php endif; ?>
      }
    }
  </script>
</body>
</html>