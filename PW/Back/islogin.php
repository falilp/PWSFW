<?php 
    session_start();

    $usuarioLogeado = $_SESSION['dev'];
    $bool = false;

    if(isset($usuarioLogeado)){$bool = true;}
?>