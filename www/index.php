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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
        <main id="app" class="container">
		    <h1 class="text-center">Usuarios inscritos</h1>
		       
            <div class="d-flex justify-content-between mb-2" style="width: 100%">
                <a class="btn btn-success mb-2" href="register.php">Agregar usuarios</a>
                <button class="btn btn-dark" @click="generatePdf">Exportar a PDF</button>
                <button class="btn btn-primary" @click="generateXls">Exportar a Excel</button>
            </div>
            <table class="table table-dark" id="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Username</th>
                  <th scope="col">Password</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="user in users" :key="user.id" class="table-primary">
                  <th scope="row">{{user.id}}</th>
                  <td>{{user.username}}</td>
                  <td>{{user.password}}</td>
                  <td><button class="btn btn-danger" @click="deleteUser(user.id)">Eliminar</button></td>
                  <td><button class="btn btn-info" @click="showModal">Editar</button></td>
                  <section v-if="show">
                    <form>
                        <input type="text" placeholder="username" v-model="username"/>
                        <button class="btn btn-info" @click="editUser">Aceptar</button>
                    </form>
                  </section>
                </tr>
              </tbody>
            </table>
            <p>
			    <a href="logout.php">Cerrar sesión</a><br>
			    <a href="reset-password.php" >Cambiar contraseña</a>
		    </p>
        </main>
    <script src="https://github.com/m0rtadelo/to-excel/releases/latest/download/to-excel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="./jspdf.plugin.autotable.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script> 
    <script src="crud.js"></script>
	</body>
</html>
