<?php

session_start();
 
/* Verifique si el usuario ya ha iniciado sesión, si es así, 
rediríjalo a la página de bienvenida (index.php)*/
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Inicio de sesión</title>
	</head>
<body>
    <div id="app">
      <h2>Inicio de sesión</h2>
      <p>Por favor, introduzca usuario y contraseña para iniciar sesión.</p>
      <form>
        <label>Usuario</label>
        <input type="text" name="username" v-model="user.username">
           
        <label>Contraseña</label>
        <input type="password" name="password" v-model="user.password">
    
        <button @click.prevent="login">Ingresar</button>
        <p>¿No tienes una cuenta? <a href="register.php">Regístrate ahora</a>.</p>
      </form>
			{{error}}
    </div>
    
		<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script> 
    <script src="main.js"></script>
</body>
</html>
