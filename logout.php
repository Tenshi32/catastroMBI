<?php
    
    require "php/Model/ModeloUsuario.php";
    require_once 'php/Controller/ControlerSesion.php';
    $session = new ControlerSession();
  
    $session->CerrarSesion();

    header("Location: login.php");
    exit();
?>