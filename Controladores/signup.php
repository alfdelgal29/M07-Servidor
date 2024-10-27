<?php
require_once '../Modelos/ModeloBD.php';
require_once '../Modelos/ModeloUsuarios.php';

$bd = new ModeloBD();
$usuarioModelo = new ModeloUsuarios($bd);

// Iniciamos variables para guardar los datos del formulario y los errores
$datos_formulario = [
    'usuario' => '',
    'correo' => ''
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = trim($_POST['usuario']);
    $correo = trim($_POST['correo']);
    $contrasena = $_POST['contrasena'];

    // Retenemos valores del formulario en caso de error
    $datos_formulario['usuario'] = $usuario;
    $datos_formulario['correo'] = $correo;

    // Validamos la fortaleza de la contraseña
    if (strlen($contrasena) < 8 || !preg_match("/[0-9]/", $contrasena) || !preg_match("/[\\W]/", $contrasena)) {
        $error = "La contraseña debe tener al menos 8 caracteres, un número y un carácter especial.";
        include '../Vistas/signup.view.php';
        exit();
    }

    // Intentamos registrar al usuario
    $resultado = $usuarioModelo->registerUser($usuario, $correo, $contrasena);

    if ($resultado) {
        header('Location: login.php'); // Redirigimos al login después de un registro exitoso
        exit();
    } else {
        $error = "Error al registrar el usuario. Inténtelo de nuevo.";
    }
}

// Incluimos la vista del formulario de registro
include '../Vistas/signup.view.php';
?>
