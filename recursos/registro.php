<?php
require('../conexion.php');
$userPOST = $_POST["userRegistro"]; 
$passPOST = $_POST["passRegistro"];

$userPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $userPOST));
$passPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $passPOST));

$userPOSTMinusculas = strtolower($userPOST);
$consultaUsuarios = "SELECT UserNameLowerCase FROM `tabla_usuarios`";

//Obtenemos los resultados
$resultadoConsultaUsuarios = mysqli_query($conexion, $consultaUsuarios) or die(mysqli_error($conexion));
$datosConsultaUsuarios = mysqli_fetch_array($resultadoConsultaUsuarios);
$userBD = $datosConsultaUsuarios['UserNameLowerCase'];

if(empty($userPOST) || empty($passPOST)) {
	die('Debes introducir datos válidos');
} else if ($userPOSTMinusculas == $userBD) {
	die('Ya existe un usuario con el nombre '.$userPOST.'');
}
else {
	//Armamos la consulta para introducir los datos
	$consulta = "INSERT INTO `tabla_usuarios` (UserName, UserNameLowerCase, Password) 
	VALUES ('$userPOST', '$userPOSTMinusculas' , '$passPOST')";
	
	//Si los datos se introducen correctamente, mostramos los datos
	//Sino, mostramos un mensaje de error
	if(mysqli_query($conexion, $consulta)) {
		die('<script>$(".registro").val("");</script>
Registrado con éxito <br>
Ya puedes acceder a tu cuenta <br>
<br>
Datos:<br>
Usuario: '.$userPOST.'<br>
Contraseña: '.$passPOST);
	} else {
		die('Error');
	};
};//Fin comprobación if(empty($userPOST) || empty($passPOST))
?>