<?php
// inicializa la sesión
session_start();
 
/* Compruebe si el usuario ha iniciado sesión; 
	de lo contrario, redirija a la página de inicio de sesión (login.php)*/
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// incluir el archivo de configuración
require_once "config.php";
 
// Definir variables e inicializar con valores vacíos
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Procesamiento de datos del formulario cuando se envía el formulario
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validar la nueva contraseña
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Por favor, introduzca la nueva contraseña.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "La contraseña debe tener al menos 6 caracteres.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validar la confirmación de contraseña
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor confirme la contraseña.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Las contraseñas no coinciden.";
        }
    }
        
    // Verifique los errores de entrada antes de actualizar la base de datos
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare la declaración de actualización
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Vincular variables a la declaración preparada como parámetros
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Asignar parámetros
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Intente ejecutar la declaración preparada
            if(mysqli_stmt_execute($stmt)){
                /* Contraseña actualizada exitosamente. 
				Destruye la sesión y redirige a la página de inicio de sesión (login.php)*/
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Algo salió mal, por favor vuelva a intentarlo.";
            }
        }
        
        // Declaración de cierre
        mysqli_stmt_close($stmt);
    }
    
    // Cerrar conexión
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<!link href="CSS/estilo_form.css" rel="stylesheet" type="text/css">
    <title>Cambio de contraseña</title>
</head>
<body>
        <h2>Cambio contraseña</h2>
        <p>Complete este formulario para restablecer su contraseña.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
        
                <label>Nueva contraseña</label>
                <input type="password" name="new_password" value="<?php echo $new_password; ?>">
                <span><?php echo $new_password_err; ?></span><br>
            
                <label>Confirmar contraseña</label>
                <input type="password" name="confirm_password" >
                <span><?php echo $confirm_password_err; ?></span><br>
            
                <input type="submit" value="Enviar"><br>
                <a class="btn btn-link" href="index.php">Cancelar</a>
           
        </form>
  
</body>
</html>