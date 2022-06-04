<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<!link href="CSS/estilo_form.css" rel="stylesheet" type="text/css">
    <title>Registro</title>
</head>
<body>
    <div id="app">
        <h2>Registro</h2>
        <p>Por favor complete este formulario para crear una cuenta.</p>
        {{error}}
        <form>
                <label>Usuario</label>
                <input type="text" name="username" v-model="user.username">
            
                <label>Contraseña</label>
                <input type="password" name="password" v-model="user.password">
            
                <label>Confirmar contraseña</label>
                <input type="password" name="confirm_password" v-model="user.confirm_password">
            
                <input type="submit" @click.prevent="register"  value="Ingresar">
                <input type="reset"  value="Borrar"><br>
            
            <p>¿Ya tienes una cuenta? <a href="login.php">Ingresa aquí</a>.</p>
        </form>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script> 
    <script src="main.js"></script>
</body>
</html>
