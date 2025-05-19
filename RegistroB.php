<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro - Servicio B</title>
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
      padding: 18px 28px; 
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 90%;
      max-width: 900px;
    }

    h2 {
      text-align: center;
      color: #4B5881;
      margin-bottom: 18px; 
      font-size: 18px; 
    }

    form {
      display: flex;
      flex-wrap: wrap;
      gap: 13px; 
      font-size: 12px; 
    }

    .form-group {
      display: flex;
      flex-direction: column;
      width: 100%;
    }

    .form-group-full {
      width: 100%;
    }

    .image-description-container {
      display: flex;
      gap: 18px; 
      margin-bottom: 14px; 
      width: 100%;
    }

    .image-upload-container {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .left-column {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 14px;
    }

    label {
      margin-bottom: 4px; 
      font-weight: 600;
      color: #505D89;
      font-size: 12px; 
    }

    input[type="text"],
    input[type="datetime-local"],
    textarea,
    input[type="file"] {
      padding: 7px 9px; 
      border: 1px solid #CCC;
      border-radius: 6px;
      font-size: 12px; 
      box-sizing: border-box;
      resize: vertical;
      width: 100%;
    }

    textarea {
      height: 160px; 
    }

    .image-preview {
      width: 110px;
      height: 110px;
      border-radius: 10px;
      border: 2px solid #CCC;
      background-color: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 7px; 
      overflow: hidden;
    }

    .image-preview img {
      max-width: 100%;
      max-height: 100%;
    }

    input[type="file"] {
      width: 100%;
    }

    .two-column-form {
      display: flex;
      gap: 18px; 
      margin-top: 14px; 
      width: 100%;
    }

    .two-column-form .left-column,
    .two-column-form .right-column {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 14px; 
    }

    select {
      padding: 8px 10px;
      border: 1px solid #CCC;
      border-radius: 6px;
      font-size: 13px;
      box-sizing: border-box;
      background-color: #fff;
      color: #505D89;
      transition: border-color 0.3s ease;
    }

    button {
      background: linear-gradient(to right, #505D89, #707EAC);
      color: white;
      padding: 9px;
      font-size: 12px; 
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s ease;
      width: 100%;
    }

    button:hover {
      background: linear-gradient(to right, #4B5881, #505D89);
    }

  </style>
</head>
<body>
  <div class="form-container">
    <h2>Registrar Excursión</h2>
    <form action="#" method="post" enctype="multipart/form-data">
      <div class="image-description-container">
        <div class="image-upload-container">
          <label for="foto">Imagen de la Excursión</label>
          <input type="file" id="foto" name="foto" accept="image/*" onchange="previewImage(event)">
          <div class="image-preview" id="imagePreview"></div>
        </div>

        <div class="left-column">
          <div class="form-group">
            <label for="fecha_creacion">Fecha de Creación</label>
            <input type="datetime-local" id="fecha_creacion" name="fecha_creacion" required>
          </div>

          <div class="form-group">
            <label for="nombre">Nombre de la Excursión</label>
            <input type="text" id="nombre" name="nombre" required>
          </div>

          <div class="form-group">
            <label for="destino">Destino</label>
            <input type="text" id="destino" name="destino" required>
          </div>
        </div>
      </div>

      <div class="two-column-form">
        <div class="left-column">
          <div class="form-group">
            <label for="clasificacion">Clasificación</label>
            <select id="clasificacion" name="clasificacion" required>
                <option value="" disabled selected>Elegir</option>
                <option value="alta">Aventura y Naturaleza</option>
                <option value="media">Historia y Arqueología</option>
                <option value="baja">Cultura y Pueblos Mágicos</option>
                <option value="baja">Playas y Ritmos del Sol</option>
            </select>
          </div>

          <div class="form-group">
            <label for="precio">Precio (aproximado)</label>
            <input type="text" id="precio" name="precio" required>
          </div>

          <div class="form-group">
            <label for="duracion">Duración (horas)</label>
            <input type="text" id="duracion" name="duracion" required>
          </div>
        </div>

        <div class="right-column">
          <div class="form-group form-group-full">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
          </div>
        </div>
      </div>

      <button type="submit">Registrar Excursión</button>
    </form>
  </div>

  <script>
    function previewImage(event) {
      const preview = document.getElementById('imagePreview');
      const file = event.target.files[0];

      if (file) {
        const reader = new FileReader();
        reader.onload = function () {
          const img = document.createElement('img');
          img.src = reader.result;
          preview.innerHTML = '';
          preview.appendChild(img);
        };
        reader.readAsDataURL(file);
      } else {
        preview.innerHTML = '<span>Vista previa</span>';
      }
    }
  </script>
</body>
</html>