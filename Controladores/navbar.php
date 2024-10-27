<!-- Alfonso Delgado -->

<?php
// Revisamos si la sesión ya está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = isset($_SESSION['user_id']); // Definimos si el usuario está logueado
?>

<!-- Código HTML del navbar -->
<nav>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <?php if (!$isLoggedIn): ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Registrarse</a></li>
        <?php else: ?>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        <?php endif; ?>
    </ul>
</nav>
