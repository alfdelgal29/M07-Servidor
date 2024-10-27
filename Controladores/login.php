<?php
require_once '../Modelos/ModeloBD.php';
require_once '../Modelos/ModeloUsuarios.php';

$bd = new ModeloBD();
$usuarioModelo = new ModeloUsuarios($bd);

session_start();
// Comprobamos si el usuario está logueado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $user = $usuarioModelo->verifyUser($usuario, $contrasena);
    // Si el usuario existe, se inicia la sesión y se redirige al index
    if ($user) {
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['usuario'] = $user['usuari'];
        header('Location: index.php');
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos. Por favor, inténtelo de nuevo.";
    }
}

include '../Vistas/login.view.php';
?>
