<?php
session_start();

session_unset();

// Destruye la sesión
session_destroy();

// Redirige al usuario al index.php
header('Location: /index.html');
exit();
?>