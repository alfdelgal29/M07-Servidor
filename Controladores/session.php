<!-- Alfonso Delgado -->

<?php
//Mantenemos la sesión activa por 40 minutos
session_set_cookie_params(2400);
ini_set('session.gc_maxlifetime', 2400);
session_start();

?>
