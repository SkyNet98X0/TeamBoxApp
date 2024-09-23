<?php require('../utils/db.php') ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="icon" href="../assets/imgs/index/icono.ico">
    <title>Iniciar sesión</title>
</head>

<body>
    <div class="container_login">
        <div class="box form-box">
            <?php if (isset($_SESSION['message'])): ?>
                <div class="message">
                    <script defer>alert("<?= $_SESSION['message']?>")</script>
                </div>
            <?php
                session_unset();
                endif;
            ?>

            <?php if (isset($_SESSION['err_message'])): ?>
                <div class="message">
                    <script defer>alert("<?= $_SESSION['err_message']?>")</script>
                </div>
            <?php
                session_unset();
                endif;
            ?>
            <header>Iniciar sesión</header>
            <form action="./login_confirm.php" method="post">
                <!-- Campo de Username -->
                <div class="field input">
                    <label for="email">Usuario</label>
                    <input type="email" name="email" id="email" required placeholder="Ingresa tu correo o ID">
                </div>

                <!-- Campo de Password -->
                <div class="field input">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" required placeholder="Ingresa tu contraseña">
                </div>

                <!-- Casilla 'Recordar contraseña' y enlace '¿Olvidaste tu contraseña?' -->
                <div class="field remember-forgot">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Recordar contraseña</label>
                    <a href="https://www.youtube.com/watch?v=ujPR-dmsO5g" class="forgot-link">¿Olvidaste tu contraseña?</a>
                </div>

                <!-- Botón de Login -->
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Iniciar sesión">
                </div>

                <!-- Enlace de registro -->
                <div class="links">
                    ¿Aún no tienes una cuenta? <a href="register.php">Regístrate</a>
                </div>
            </form>
        </div>
    </div>

    <div class="exit-container">
        <a href="../index.html">
            <img src="../assets/imgs/index/exit.png" alt="Exit" class="exit-icon">
        </a>
    </div>

</body>

</html>