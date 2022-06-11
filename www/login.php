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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
<body class="container bg-dark d-flex justify-content-center align-items-center" style="height: 100vh">
    <div id="app" class="text-white bg-secondary p-5" style="width: 400px">
      <h2 class="text-center">Inicio de sesión</h2>
      <p>Por favor, introduzca usuario y contraseña para iniciar sesión.</p>
      <form class="gap-1">
        <label>Usuario</label>
        <input class="m-1 input-group-text" type="text" name="username" v-model="user.username">
           
        <label>Contraseña</label>
        <input class="input-group-text" type="password" name="password" v-model="user.password">
    
        <button @click.prevent="login" class="btn btn-success m-2">Ingresar</button>
        <p>¿No tienes una cuenta? <a class="btn btn-info" href="register.php">Regístrate ahora</a></p>
      </form>
      <div v-if="error !== ''" class="bg-danger p-3">{{error}}</div>
    </div>
    
		<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script> 
    <script src="main.js"></script>
</body>
</html>
