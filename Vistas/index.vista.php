<!-- Alfonso Delgado -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Estilo/estils.css">
    <title>Artículos Públicos</title>
</head>
<body>
<?php
// Verificamos si la sesión no está iniciada antes de iniciarla
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = isset($_SESSION['user_id']);
include '../Vistas/navbar.view.php';
?>

<div class="contenidor">
    <h1>Artículos Públicos</h1>

    <?php if ($isLoggedIn): ?>
        <a href="../Controladores/insertar.php" class="create-article-button">Crear Nuevo Artículo</a>
    <?php endif; ?>

    <section class="article-container">
        <?php if (!empty($articles)): ?>
            <?php foreach ($articles as $article): ?>
                <div class="article-box">
                    <h2><?= htmlspecialchars($article['ID']) ?>. <?= htmlspecialchars($article['Titol']) ?></h2>
                    <p><?= htmlspecialchars($article['Cos']) ?></p>

                    <?php if ($isLoggedIn && $_SESSION['user_id'] == $article['user_id']): ?>
                        <form method="get" action="../Controladores/modificar.php" style="display: inline-block;">
                            <input type="hidden" name="article_id" value="<?= htmlspecialchars($article['ID']) ?>">
                            <button type="submit" class="edit-button">Modificar</button>
                        </form>
                        <form method="post" action="../Controladores/controlador.php" style="display: inline-block;">
                            <input type="hidden" name="article_id" value="<?= htmlspecialchars($article['ID']) ?>">
                            <input type="hidden" name="accion" value="eliminar">
                            <button type="submit" class="delete-button">Eliminar</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay artículos disponibles.</p>
        <?php endif; ?>
    </section>

    <section class="paginacio">
        <ul>
            <?php if ($page > 1): ?>
                <li><a href="?page=<?= $page - 1 ?>">&laquo; Anterior</a></li>
            <?php else: ?>
                <li class="disabled"><a href="#">&laquo; Anterior</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="<?= ($page == $i) ? 'active' : '' ?>"><a href="?page=<?= $i ?>"><?= $i ?></a></li>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <li><a href="?page=<?= $page + 1 ?>">Siguiente &raquo;</a></li>
            <?php else: ?>
                <li class="disabled"><a href="#">Siguiente &raquo;</a></li>
            <?php endif; ?>
        </ul>
    </section>

    <a class="back-button" href="../Controladores/index.php">Volver a Inicio</a>
</div>
</body>
</html>
