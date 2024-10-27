<!-- Alfonso Delgado -->

<!-- // Este script cierra la sesión del usuario eliminando, 
destruye la sesión, y redirige al usuario a la página principal.  -->
<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php");
exit();
?>

