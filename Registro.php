<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro</title>
  <link rel="icon" href="./vista/img/icono.ico">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body,
    html {
      height: 100%;
    }

    .container {
      display: flex;
      height: 100vh;
      width: 100%;
    }

    .left-side {
      flex: 1;
      background: url('./vista/img/login.png') no-repeat center center;
      background-size: cover;
    }

    .right-side {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #F9F9F9;
    }

    .login-box {
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 480px;
    }


    .login-box h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
      font-size: 19px;
    }

    .image-preview {
      width: 120px;
      height: 120px;
      border-radius: 12px;
      background-color: #E0E0E0;
      margin: 0 auto 15px auto;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }

    .image-preview img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .login-box input[type="file"],
    .login-box input[type="text"],
    .login-box input[type="email"],
    .login-box input[type="password"] {
      width: 100%;
      padding: 10px 12px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    .login-box button {
      width: 100%;
      padding: 10px;
      margin-top: 15px;
      background: linear-gradient(to right, #505D89, #707EAC);
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 15px;
      cursor: pointer;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: background 0.3s;
    }

    .login-box button:hover {
      background: linear-gradient(to right, #4B5881, #505D89);
    }

    .login-box .register {
      margin-top: 18px;
      text-align: center;
      font-size: 13px;
      color: #555;
    }

    .login-box .register a {
      color: #505D89;
      text-decoration: none;
      font-weight: bold;
    }

    .login-box .register a:hover {
      text-decoration: underline;
    }
    .error-message {
  background-color: #ffe0e0;
  color: #b00020;
  padding: 10px;
  margin-bottom: 12px;
  border-radius: 8px;
  font-size: 14px;
  text-align: center;
  border: 1px solid #ff9d9d;
}

  </style>
</head>

<body>
  <div class="container">
    <div class="left-side"></div>
    <div class="right-side">
      <div class="login-box">
        <h2>Registrarse</h2>
        <div class="image-preview" id="preview">
        </div>
        <form action="controlador/registro_controlador.php" method="POST" enctype="multipart/form-data">
          <input type="file" name="foto" accept="image/*" onchange="previewImage(event)" required>
          <input type="text" name="usuario" placeholder="Nombre de usuario" required>
          <input type="email" name="correo" placeholder="Correo electrónico" required>
          <input type="password" name="password" placeholder="Contraseña" required>
          <?php if (isset($_GET['error']) && $_GET['error'] == 'correo'): ?>
  <div class="error-message">El correo ya está registrado. Usa otro.</div>
<?php endif; ?>
          <button type="submit">Crear cuenta</button>
        </form>
        <div class="register">¿Ya tienes cuenta? <a href="Inicio.php">Inicia sesión</a></div>
      </div>
    </div>
  </div>

  <script>
    function previewImage(event) {
      const reader = new FileReader();
      reader.onload = function() {
        const output = document.getElementById('preview');
        output.innerHTML = '<img src="' + reader.result + '" alt="Foto de perfil">';
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
</body>

</html>