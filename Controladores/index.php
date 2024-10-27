<?php
// Incluimos el modelo de la base de datos
require_once '../Modelos/ModeloBD.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

try {
    $conexion = new ModeloBD();

    // Determinar la página actual y ajustar los parámetros de paginación
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
    $page = max(1, $page);

    $articles_per_page = 6;
    $offset = ($page - 1) * $articles_per_page;

    // Verificar si el usuario está logueado
    $isLoggedIn = isset($_SESSION['user_id']);

    if ($isLoggedIn) {
        // Si está logueado, obtenemos solo los artículos del usuario
        $user_id = $_SESSION['user_id'];
        $articles = $conexion->consultarArticulosUsuario($user_id, $articles_per_page, $offset);
        $total_articles = $conexion->contarArticulosUsuario($user_id);
    } else {
        // Si no está logueado, obtenemos todos los artículos
        $articles = $conexion->consultarArticulos($articles_per_page, $offset);
        $total_articles = $conexion->contarArticulos();
    }

    // Calcular el total de páginas para la paginación
    $total_pages = max(1, ceil($total_articles / $articles_per_page));

} catch (Exception $e) {
    // Manejo de errores en caso de falla de conexión o consulta
    error_log("Error: " . $e->getMessage());
    echo "<p>Ocurrió un error al intentar cargar los artículos. Por favor, inténtalo más tarde.</p>";
    $articles = [];
    $total_pages = 1;
}

// Incluimos la vista
require '../Vistas/index.vista.php';
?>
