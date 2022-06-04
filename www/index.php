<?php
// Se inicializa la sesión
session_start();
 
/* Se comprueba si el usuario ha iniciado sesión, si no, se redirecciona
 a la página de inicio de sesión (login.php)*/
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Bienvenido</title>  
	</head>
	<body>
		<h1>Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Has ingresado al sitio.</h1>
		   
		<p>
			<a href="logout.php">Cerrar sesión</a><br>
			<a href="reset-password.php" >Cambiar contraseña</a>
		</p>
		
		<p>
		Nuestro sistema cuenta con ....
		</p>
	</body>
</html>