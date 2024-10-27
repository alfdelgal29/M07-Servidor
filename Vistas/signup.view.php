<!-- Alfonso Delgado -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="../Estilo/estils.css">
</head>
<body>
    <div class="signup-form">
        <h2>Registro de Usuario</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form action="../Controladores/signup.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" value="<?= isset($usuario) ? htmlspecialchars($usuario) : '' ?>" required>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" value="<?= isset($correo) ? htmlspecialchars($correo) : '' ?>" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>

            <p class="password-info">La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula, un número y un símbolo especial.</p>

            <button type="submit">Registrarse</button>
        </form>
        <a href="../Controladores/login.php">¿Ya tienes una cuenta? Inicia sesión aquí</a>
    </div>
</body>
</html>
