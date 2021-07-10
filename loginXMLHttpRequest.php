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
	// Cuando el formulario con Id "acceso" se envie...
	var formAcceso = document.getElementById('acceso');
	
	formAcceso.addEventListener('submit', function(e){
		e.preventDefault();
		var datos = new FormData(formAcceso);
		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'recursos/acceder.php');
		xhr.onreadystatechange = function(){
			if (xhr.readyState == 4){
				if (xhr.status == 200)
				console.log("exito")
			}
			else{
				console.log("Error al cargar los datos")
			}
		};
		xhr.send(datos)
	});
	

	//Cuando el formulario con ID "registro" se envíe...
	var formRegistro = document.getElementById('registro');

	formRegistro.addEventListener('submit', function(e){
		e.preventDefault();
		var datos = new FormData (formRegistro);
		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'recursos/registro.php');
		xhr.onreadystatechange == function(){
			if (xhr.readyState == 4){
				if (xhr.status == 200)
					console.log("exitos")
			}
			else{
				console.log("Eror")
			}
		};
		xhr.send(datos)
	});
</script>
</body>
</html>