<!-- Alfonso Delgado -->

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../Estilo/estils.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="nav-links">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="../Controladores/logout.php">Logout</a>
                <?php else: ?>
                    <a href="../Controladores/login.php">Login</a>
                    <a href="../Controladores/signup.php">Registrarse</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</body>
</html>
