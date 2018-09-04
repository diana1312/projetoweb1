<?php 
    unset($_SESSION["user_codigo"]);

    session_destroy();

    // retorna para a login.php
    header('Location: login.php');
?>