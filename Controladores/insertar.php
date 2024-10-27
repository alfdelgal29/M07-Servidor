<?php
require_once '../Modelos/ModeloBD.php';
session_start();

// Comprobamos si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

    // Insertamos  nuevo artículo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $user_id = $_SESSION['user_id'];

    // Incluimos el modelo de la base de datos
    $conexion = new ModeloBD();
    $conexion->insertarArticulo($user_id, $titulo, $contenido);
    header('Location: index.php');
}
?>

<form method="post" action="insertar.php">
    <input type="text" name="titulo" required placeholder="Título del artículo">
    <textarea name="contenido" required placeholder="Contenido del artículo"></textarea>
    <button type="submit">Insertar Artículo</button>
</form>
