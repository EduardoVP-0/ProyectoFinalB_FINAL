<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="icon" href="./vista/img/icono.ico">
</head>
<body>
    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        }

        body, html {
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
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        }

        .login-box h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
        }

        .login-box input[type="email"],
        .login-box input[type="password"] {
        width: 100%;
        padding: 12px 15px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        }

        .login-box button {
        width: 100%;
        padding: 12px;
        margin-top: 20px;
        background: linear-gradient(to right, #505D89, #707EAC);
        border: none;
        border-radius: 8px;
        color: white;
        font-size: 16px;
        cursor: pointer;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: background 0.3s;
        }

        .login-box button:hover {
        background: linear-gradient(to right, #4B5881, #505D89);
        }

        .login-box .register {
        margin-top: 20px;
        text-align: center;
        font-size: 14px;
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
            color: #d9534f;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-side"></div>
        <div class="right-side">
            <div class="login-box">
                <h2>Iniciar Sesión</h2>

                <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                    <div class="error-message">
                        Usuario o contraseña incorrectos
                    </div>
                <?php endif; ?>


                <form action="./controlador/ValidarUsuario.php" method="post">
                    <input name="email" id="email" type="email" placeholder="Correo electrónico" required>
                    <input name="pass" id="pass" type="password" placeholder="Contraseña" required>
                    <button type="submit">Iniciar Sesión</button>
                </form>
            <div class="register">¿Aún no tienes cuenta? <a href="Registro.php">Regístrate</a></div>
            </div>  
        </div>
    </div>
</body>
</html>