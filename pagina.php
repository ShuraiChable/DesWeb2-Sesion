<?php
//Reanudamos la sesión
session_start();

if(!isset($_SESSION['usuario']) and $_SESSION['estado'] != 'Autenticado') {
	header('Location: index.php');
} else {
	$estado = $_SESSION['usuario'];
	$salir = '<a href="recursos/salir.php" target="_self">Cerrar sesión</a>';
	require('recursos/sesiones.php');
};
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bienvenido</title>
</head>

<body>
<div><p>Hola, <?php echo $estado; ?><br>
<?php echo $salir; ?></p><div>
</body>
</html>