<?php

//Iniciamos la sesión
session_start();

//Evitamos que nos salgan los NOTICES de PHP
error_reporting(E_ALL ^ E_NOTICE);

//Comprobamos si la sesión está iniciada
if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'Autenticado') {
	include('pagina.php');
	die();
} else {
	include('loginJQuery.php');
	die();
};
?>