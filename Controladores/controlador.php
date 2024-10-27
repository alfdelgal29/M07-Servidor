<?php
// Incluimos el modelo de la base de datos
require_once '../Modelos/ModeloBD.php';
session_start();

$conexion = new ModeloBD();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['accion'])) {
        switch ($_POST['accion']) {
            // Insertamos  nuevo artículo
            case 'insertar':
                if (isset($_POST['titulo']) && isset($_POST['contenido']) && isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    $titulo = trim($_POST['titulo']);
                    $contenido = trim($_POST['contenido']);

                    if (!empty($titulo) && !empty($contenido)) {
                        $conexion->insertarArticulo($user_id, $titulo, $contenido);
                    }
                    header('Location: ../Controladores/index.php');
                }
                break;
            // Modificamos  artículo
            case 'modificar':
                if (isset($_POST['article_id']) && isset($_POST['titulo']) && isset($_POST['contenido']) && isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    $article_id = intval($_POST['article_id']);
                    $titulo = trim($_POST['titulo']);
                    $contenido = trim($_POST['contenido']);

                    if (!empty($titulo) && !empty($contenido)) {
                        $conexion->modificarArticulo($article_id, $user_id, $titulo, $contenido);
                    }
                    header('Location: ../Controladores/index.php');
                }
                break;
            // Eliminamos  artículo
            case 'eliminar':
                if (isset($_POST['article_id']) && isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    $article_id = intval($_POST['article_id']);
                    $conexion->eliminarArticulo($article_id, $user_id);
                    header('Location: ../Controladores/index.php');
                }
                break;
        }
    }
}
?>
