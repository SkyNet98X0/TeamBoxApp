<?php include('../utils/db.php');?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="icon" href="../assets/imgs/index/icono.ico">
    <title>Registrate</title>
</head>

<body>
    <div class="container_login">
        <div class="box form-box">

        <?php if (isset($_SESSION['err_message'])): ?>
            <div class="message">
                <p><?= $_SESSION['err_message'];?></p>
            </div>
        <?php 
            session_unset();    
            endif;
        ?>

        <header>Registrate</header>
            <form action="./register_confirm.php" method="POST">
                <!-- Campo de Username -->
                <div class="field input">
                    <label for="nickname">Nombre</label>
                    <input type="text" name="nickname" id="username" autocomplete="off" required placeholder="Ingrese sus nombres y apellidos">
                </div>

                <div class="field input">
                    <label for="email">Correo</label>
                    <input type="email" name="email" id="email" autocomplete="off" required placeholder="Ingrese su correo">
                </div>

                <div class="field input">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" required placeholder="Ingrese su contraseña">
                </div>

                <div class="field input">
                    <label for="confirm_password">Confirmar contraseña</label>
                    <input type="password" name="confirm_password" id="confirm_password" required placeholder="Confirme su contraseña">
                </div>

                <!-- Botón de Registro -->
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Registrarse">
                </div>

                <!-- Enlace de login -->
                <div class="links">
                    ¿Ya tienes una cuenta? <a href="./login.php">Inicia sesión</a>
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