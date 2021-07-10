<?php
//Iniciamos la sesión
session_start();

//Pedimos el archivo que controla la duración de las sesiones
require('recursos/sesiones.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Acceso o registro</title>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>
<body>

<div id="mensaje" style="border:1px solid #CCC; padding:10px;"></div>

<h2>Accede a tu cuenta</h2>

<div class="formulario-acceso">
<form method="POST" id="acceso" action="" accept-charset="utf-8">
	<input type="text" name="userAcceso" class="acceso" id="userAcceso" placeholder="Usuario" autocomplete="off" maxlength="20">
	<input type="password" name="passAcceso" class="acceso" id="passAcceso" placeholder="Contraseña" autocomplete="off" maxlength="60">
	<input type="submit" name="acceso" class="boton-principal" value="Acceder">
</form>
</div>

<hr>

<h2>Crea una cuenta</h2>

<div class="formulario-registro">
<form method="POST" id="registro" action="" accept-charset="utf-8">
	<input type="text" name="userRegistro" class="registro" id="userRegistro" placeholder="Usuario" autocomplete="off" maxlength="20">
	<input type="password" name="passRegistro" class="registro" id="passRegistro" placeholder="Contraseña" autocomplete="off" maxlength="60">
	<input type="submit" name="registro" class="boton-principal" value="Registrarse">
</form>
</div>

<script>
	var mensaje = $("#mensaje");
mensaje.hide();

//Cuando el formulario con ID "acceso" se envíe...
$("#acceso").on("submit", function(e){
	e.preventDefault();
	//Creamos un FormData con los datos del mismo formulario
	var formData = new FormData(document.getElementById("acceso"));

	//Llamamos a la función AJAX de jQuery
	$.ajax({
		url: "recursos/acceder.php",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false//No permitimos que los datos pasen como un objeto
	}).done(function(echo){
		//comprobamos si la respuesta recibida no es vacía
		if (echo !== "") {
			mensaje.html(echo);
			mensaje.slideDown(500);
		} else {
			window.location.replace("");
		}
	});
});

//Cuando el formulario con ID "registro" se envíe...
$("#registro").on("submit", function(e){
	e.preventDefault();
	var formData = new FormData(document.getElementById("registro"));

	$.ajax({
		url: "recursos/registro.php",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	}).done(function(echo){
		//Cuando recibamos respuesta, la mostramos
		mensaje.html(echo);
		mensaje.slideDown(500);
	});
});
</script>
</body>
</html>