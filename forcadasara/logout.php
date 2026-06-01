<?php
session_start();

// Destroi a sessão (desloga o usuário)
session_destroy();

// Redireciona para o login
header("Location: login.php");
exit;
?>