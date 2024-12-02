<?php
session_start();

// Destruir la sesión
session_destroy();

// Eliminar la cookie de sesión);

// Redirigir con timestamp para forzar una recarga completa
header("Location: login.php");
exit();
?>