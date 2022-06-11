<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<!link href="CSS/estilo_form.css" rel="stylesheet" type="text/css">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="container bg-dark d-flex justify-content-center align-items-center" style="height: 100vh">
    <div id="app" class="text-white bg-secondary p-5" style="width: 400px">
        <h2>Registro</h2>
        <p>Por favor complete este formulario para crear una cuenta.</p>
        {{error}}
        <form>
                <label>Usuario</label>
                <input class="m-1 input-group-text" type="text" name="username" v-model="user.username">
            
                <label>Contraseña</label>
                <input class="m-1 input-group-text" type="password" name="password" v-model="user.password">
            
                <label>Confirmar contraseña</label>
                <input class="m-1 input-group-text" type="password" name="confirm_password" v-model="user.confirm_password">
            
                <input class="btn btn-success" type="submit" @click.prevent="register"  value="Ingresar">
                <input class="btn btn-danger" type="reset"  value="Borrar"><br>
            
            <p>¿Ya tienes una cuenta? <a href="login.php" class="btn btn-info m-2">Ingresa aquí</a></p>
        </form>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script> 
    <script src="main.js"></script>
</body>
</html>
