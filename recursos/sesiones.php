<?php
error_reporting(E_ALL ^ E_NOTICE);

//Obtenemos el tiempo del servidor de cuanto se hizo la petición
$hora = $_SERVER["REQUEST_TIME"];
$duracion = 10;

if (isset($_SESSION['ultima_actividad']) && ($hora - $_SESSION['ultima_actividad']) > $duracion) {
  session_unset();
  session_destroy();
  session_start();
};

$_SESSION['ultima_actividad'] = $hora;
?>