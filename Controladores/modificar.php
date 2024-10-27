<!-- Alfonso Delgado -->

<?php
require_once '../Modelos/ModeloBD.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$bd = new ModeloBD();

    // Si el método de solicitud es POST, se recogen los datos del formulario y se modifica el artículo.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $article_id = $_POST['article_id'];
    $titulo = $_POST['titol'];
    $contenido = $_POST['cos'];

    $article = $bd->consultarArticuloPorId($article_id);
    if ($article && $_SESSION['user_id'] == $article['user_id']) {
        $bd->modificarArticulo($article_id, $_SESSION['user_id'], $titulo, $contenido);
        header('Location: index.php');
        exit();
    } else {
        $error = "No tienes permisos para modificar este artículo.";
    }
} else {
    $article_id = $_GET['article_id'];
    $article = $bd->consultarArticuloPorId($article_id);
    if (!$article || $_SESSION['user_id'] != $article['user_id']) {
        header('Location: index.php');
        exit();
    }
}

include '../Vistas/navbar.view.php';
?>

<div class="contenidor">
    <h1>Modificar Artículo</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post" action="modificar.php">
        <input type="hidden" name="article_id" value="<?= htmlspecialchars($article['ID']) ?>">
        <label for="titol">Título:</label>
        <input type="text" id="titol" name="titol" value="<?= htmlspecialchars($article['Titol']) ?>" required>
        <label for="cos">Contenido:</label>
        <textarea id="cos" name="cos" required><?= htmlspecialchars($article['Cos']) ?></textarea>
        <button type="submit">Guardar Cambios</button>
    </form>
    <a class="back-button" href="index.php">Volver a inicio</a>
</div>
