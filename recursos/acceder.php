<?php
require('../conexion.php');
$userPOST = $_POST["userAcceso"]; 
$passPOST = $_POST["passAcceso"];

$userPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $userPOST));
$passPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $passPOST));

//lo pasamos todo a minúsculas
$userPOSTMinusculas = strtolower($userPOST);

//lo comparamos con la tabla
$consulta = "SELECT * FROM `tabla_usuarios` WHERE UserNameLowerCase='".$userPOSTMinusculas."'";

//Obtenemos los resultados
$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($resultado);

$userBD = $datos['UserNameLowerCase'];
$passwordBD = $datos['Password'];

//Comprobamos si los datos son correctos
if($userBD == $userPOSTMinusculas and $passPOST== $passwordBD){

	session_start();
	$_SESSION['usuario'] = $datos['UserNameLowerCase'];
	$_SESSION['estado'] = 'Autenticado';
	echo " Los datos son correctos, (refresca la pagina)";
} else if ( $userBD != $userPOSTMinusculas || $userPOST == "" || $passPOST == "" || !password_verify($passPOST, $passwordBD) ) {
	die ('<script>$(".acceso").val("");</script>
Los datos de acceso son incorrectos');
} else {
	die('Error');
};
?>